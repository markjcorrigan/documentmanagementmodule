<?php

namespace App\Livewire;

use App\Models\VisitorLog;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class VisitorAnalytics extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $viewType = 'users'; // users, anonymous, bots, all
    public $hoursBack = 24;
    public $expandedVisitor = null;
    public $searchTerm = '';

    public function mount()
    {
        // Clean up stale sessions on load
        $this->closeStaleSession();
    }

    public function render()
    {
        $query = VisitorLog::query();

        // Apply time filter
        if ($this->hoursBack) {
            $query->where('connected_at', '>=', now()->subHours($this->hoursBack));
        }

        // Apply visitor type filter
        switch ($this->viewType) {
            case 'users':
                $query->where('visitor_type', 'user');
                break;
            case 'anonymous':
                $query->where('visitor_type', 'anonymous');
                break;
            case 'bots':
                $query->where('visitor_type', 'bot');
                break;
        }

        // Apply search
        if ($this->searchTerm) {
            $query->where(function($q) {
                $q->where('username', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('page_url', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('ip_address', 'like', '%' . $this->searchTerm . '%');
            });
        }

        // Get summary grouped by username - now shows SESSIONS not page hits
        $visitorSummary = (clone $query)
            ->select(
                'username',
                'visitor_type',
                DB::raw('COUNT(*) as visit_count'), // This is session count
                DB::raw('MIN(connected_at) as first_visit'),
                DB::raw('MAX(connected_at) as last_visit'),
                DB::raw('COUNT(DISTINCT DATE(connected_at)) as unique_days'),
                // Add average session duration
                DB::raw('AVG(CASE 
                    WHEN disconnected_at IS NOT NULL 
                    THEN TIMESTAMPDIFF(SECOND, connected_at, disconnected_at) 
                    ELSE NULL 
                END) as avg_duration_seconds')
            )
            ->groupBy('username', 'visitor_type')
            ->orderByDesc('visit_count')
            ->get()
            ->map(function ($visitor) {
                // Convert string dates to Carbon instances
                $visitor->first_visit = \Carbon\Carbon::parse($visitor->first_visit);
                $visitor->last_visit = \Carbon\Carbon::parse($visitor->last_visit);

                // Format average duration
                $visitor->avg_duration_formatted = $visitor->avg_duration_seconds
                    ? gmdate('H:i:s', $visitor->avg_duration_seconds)
                    : 'N/A';

                return $visitor;
            });

        // Paginate manually
        $currentPage = request()->get('page', 1);
        $perPage = 20;
        $currentItems = $visitorSummary->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $visitorSummaryPaginated = new \Illuminate\Pagination\LengthAwarePaginator(
            $currentItems,
            $visitorSummary->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        // Get detailed visits (sessions) for expanded visitor
        $detailedVisits = null;
        if ($this->expandedVisitor) {
            $detailedVisits = VisitorLog::where('username', $this->expandedVisitor)
                ->orderByDesc('connected_at')
                ->get()
                ->map(function ($visit) {
                    // Calculate session duration
                    if ($visit->disconnected_at) {
                        $visit->duration_seconds = $visit->connected_at->diffInSeconds($visit->disconnected_at);
                        $visit->duration_formatted = gmdate('H:i:s', $visit->duration_seconds);
                        $visit->is_active = false;
                    } else {
                        // Check if this session is truly active (within last 5 minutes)
                        $visit->is_active = $visit->connected_at->diffInMinutes(now()) <= 5;
                        
                        if ($visit->is_active) {
                            $visit->duration_seconds = $visit->connected_at->diffInSeconds(now());
                            $visit->duration_formatted = gmdate('H:i:s', $visit->duration_seconds) . ' (ongoing)';
                        } else {
                            // Session is stale - likely closed but not recorded
                            $visit->duration_seconds = null;
                            $visit->duration_formatted = 'Session ended (not recorded)';
                        }
                    }
                    return $visit;
                });
        }

        // Get statistics
        $stats = $this->getStatistics();

        return view('livewire.visitor-analytics', [
            'visitorSummary' => $visitorSummaryPaginated,
            'detailedVisits' => $detailedVisits,
            'stats' => $stats,
        ])->layout('components.layouts.app.visitor-analytics');
    }

    public function toggleExpanded($username)
    {
        $this->expandedVisitor = $this->expandedVisitor === $username ? null : $username;
    }

    public function setViewType($type)
    {
        $this->viewType = $type;
        $this->expandedVisitor = null;
        $this->resetPage();
    }

    public function setTimeRange($hours)
    {
        $this->hoursBack = $hours;
        $this->expandedVisitor = null;
        $this->resetPage();
    }

    private function getStatistics()
    {
        $since = $this->hoursBack ? now()->subHours($this->hoursBack) : null;

        $baseQuery = VisitorLog::query();
        if ($since) {
            $baseQuery->where('connected_at', '>=', $since);
        }

        if ($this->viewType === 'all') {
            // When viewing all, show counts for each category
            $total = $baseQuery->count();
            $users = (clone $baseQuery)->where('visitor_type', 'user')->count();
            $anonymous = (clone $baseQuery)->where('visitor_type', 'anonymous')->count();
            $bots = (clone $baseQuery)->where('visitor_type', 'bot')->count();

            $uniqueUsers = (clone $baseQuery)->where('visitor_type', 'user')
                ->distinct('username')
                ->count('username');

            // FIXED: Calculate TRULY active sessions (active in last 5 minutes)
            $activeSessions = VisitorLog::query()
                ->whereNull('disconnected_at')
                ->where('connected_at', '>=', now()->subMinutes(5))
                ->count();
        } else {
            // When viewing a specific type, filter by it
            $query = (clone $baseQuery);

            switch ($this->viewType) {
                case 'users':
                    $query->where('visitor_type', 'user');
                    break;
                case 'anonymous':
                    $query->where('visitor_type', 'anonymous');
                    break;
                case 'bots':
                    $query->where('visitor_type', 'bot');
                    break;
            }

            $total = $query->count();

            // When filtered, only show relevant stats
            $users = $this->viewType === 'users' ? $total : 0;
            $anonymous = $this->viewType === 'anonymous' ? $total : 0;
            $bots = $this->viewType === 'bots' ? $total : 0;

            $uniqueUsers = $this->viewType === 'users'
                ? (clone $baseQuery)->where('visitor_type', 'user')
                    ->distinct('username')
                    ->count('username')
                : 0;

            // FIXED: Active sessions for current filter (active in last 5 minutes)
            $activeSessions = VisitorLog::query()
                ->whereNull('disconnected_at')
                ->where('connected_at', '>=', now()->subMinutes(5));
                
            // Apply type filter for active sessions
            switch ($this->viewType) {
                case 'users':
                    $activeSessions->where('visitor_type', 'user');
                    break;
                case 'anonymous':
                    $activeSessions->where('visitor_type', 'anonymous');
                    break;
                case 'bots':
                    $activeSessions->where('visitor_type', 'bot');
                    break;
            }
            
            $activeSessions = $activeSessions->count();
        }

        return [
            'total' => $total,
            'users' => $users,
            'anonymous' => $anonymous,
            'bots' => $bots,
            'unique_users' => $uniqueUsers,
            'active_sessions' => $activeSessions ?? 0,
        ];
    }

    /**
     * Close stale sessions that are older than 30 minutes without a disconnect time
     */
    public function closeStaleSessions()
    {
        // Authorization check
        if (!auth()->user()->hasRole('Super Admin')) {
            session()->flash('error', 'Unauthorized action.');
            return;
        }

        try {
            // Find sessions that are:
            // 1. Still marked as active (disconnected_at is NULL)
            // 2. But haven't had activity in 30+ minutes
            $staleCutoff = now()->subMinutes(30);
            
            $updated = VisitorLog::whereNull('disconnected_at')
                ->where('connected_at', '<', $staleCutoff)
                ->update([
                    'disconnected_at' => DB::raw('DATE_ADD(connected_at, INTERVAL 30 MINUTE)')
                ]);

            session()->flash('message', "Closed {$updated} stale sessions.");
            
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to close stale sessions: ' . $e->getMessage());
        }
    }

    /**
     * Automatically close stale sessions (runs on page load)
     */
    private function closeStaleSession()
    {
        try {
            // Silently close sessions older than 30 minutes
            $staleCutoff = now()->subMinutes(30);
            
            VisitorLog::whereNull('disconnected_at')
                ->where('connected_at', '<', $staleCutoff)
                ->update([
                    'disconnected_at' => DB::raw('DATE_ADD(connected_at, INTERVAL 30 MINUTE)')
                ]);
        } catch (\Exception $e) {
            // Silently fail - don't break the page
            \Log::error('Failed to auto-close stale sessions: ' . $e->getMessage());
        }
    }

    public function clearAllVisitorLogs()
    {
        // Authorization check
        if (!auth()->user()->hasRole('Super Admin')) {
            session()->flash('error', 'Unauthorized action.');
            return;
        }

        try {
            // Get count before clearing
            $count = VisitorLog::count();

            // Clear all visitor logs
            VisitorLog::truncate();

            session()->flash('message', "Successfully cleared {$count} visitor log records.");

            // Reset the view completely
            $this->reset(['expandedVisitor', 'searchTerm']);
            $this->viewType = 'users';
            $this->hoursBack = 24;
            $this->resetPage();

        } catch (\Exception $e) {
            session()->flash('error', 'Failed to clear visitor logs: ' . $e->getMessage());
        }
    }

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }
}
