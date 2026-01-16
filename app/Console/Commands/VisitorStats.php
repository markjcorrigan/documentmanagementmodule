<?php

namespace App\Console\Commands;

use App\Models\VisitorLog;
use Illuminate\Console\Command;

class VisitorStats extends Command
{
    protected $signature = 'visitor:stats {--hours=24 : Hours to look back} {--detail : Show detailed breakdown}';
    protected $description = 'Show enhanced visitor statistics';

    public function handle()
    {
        $hours = $this->option('hours');
        $detail = $this->option('detail');
        $since = now()->subHours($hours);

        $this->info("📊 ENHANCED Visitor Statistics (Last {$hours} hours)");
        $this->info(str_repeat('=', 60));

        // Total visits
        $total = VisitorLog::where('connected_at', '>=', $since)->count();
        $this->info("📈 Total visits: <comment>{$total}</comment>");
        $this->newLine();

        // ============================================
        // 1. VISITOR TYPE BREAKDOWN
        // ============================================
        $this->info("👥 <fg=cyan>VISITOR TYPE BREAKDOWN</>");
        $this->info(str_repeat('-', 40));

        $types = VisitorLog::where('connected_at', '>=', $since)
            ->selectRaw('visitor_type, COUNT(*) as count')
            ->groupBy('visitor_type')
            ->orderByDesc('count')
            ->get();

        foreach ($types as $type) {
            $percentage = $total > 0 ? round(($type->count / $total) * 100, 1) : 0;
            $bar = str_repeat('█', round($percentage / 5));
            $this->line("  {$type->visitor_type}: <comment>{$type->count}</comment> ({$percentage}%) {$bar}");
        }

        $this->newLine();

        // ============================================
        // 2. BOT ANALYSIS (if any)
        // ============================================
        $botCount = VisitorLog::where('visitor_type', 'bot')
            ->where('connected_at', '>=', $since)
            ->count();

        if ($botCount > 0) {
            $this->info("🤖 <fg=cyan>BOT ANALYSIS</> ({$botCount} total)");
            $this->info(str_repeat('-', 40));

            $bots = VisitorLog::where('visitor_type', 'bot')
                ->where('connected_at', '>=', $since)
                ->selectRaw('bot_type, COUNT(*) as count')
                ->groupBy('bot_type')
                ->orderByDesc('count')
                ->get();

            foreach ($bots as $bot) {
                $botPercentage = $botCount > 0 ? round(($bot->count / $botCount) * 100, 1) : 0;
                $this->line("  {$bot->bot_type}: <comment>{$bot->count}</comment> ({$botPercentage}%)");
            }
            $this->newLine();
        }

        // ============================================
        // 3. BROWSER & PLATFORM STATS
        // ============================================
        $this->info("🌐 <fg=cyan>BROWSER & PLATFORM</>");
        $this->info(str_repeat('-', 40));

        // Top browsers (non-bots)
        $browsers = VisitorLog::where('visitor_type', '!=', 'bot')
            ->where('connected_at', '>=', $since)
            ->whereNotNull('browser')
            ->selectRaw('browser, COUNT(*) as count')
            ->groupBy('browser')
            ->orderByDesc('count')
            ->limit(5)
            ->get();

        $this->line("  <options=bold>Top Browsers:</>");
        foreach ($browsers as $browser) {
            $percentage = $total > 0 ? round(($browser->count / $total) * 100, 1) : 0;
            $this->line("    {$browser->browser}: <comment>{$browser->count}</comment> ({$percentage}%)");
        }

        // Platforms
        $platforms = VisitorLog::where('visitor_type', '!=', 'bot')
            ->where('connected_at', '>=', $since)
            ->whereNotNull('platform')
            ->selectRaw('platform, COUNT(*) as count')
            ->groupBy('platform')
            ->orderByDesc('count')
            ->limit(5)
            ->get();

        $this->line("  <options=bold>Top Platforms:</>");
        foreach ($platforms as $platform) {
            $percentage = $total > 0 ? round(($platform->count / $total) * 100, 1) : 0;
            $this->line("    {$platform->platform}: <comment>{$platform->count}</comment> ({$percentage}%)");
        }

        $this->newLine();

        // ============================================
        // 4. MOBILE VS DESKTOP
        // ============================================
        $mobile = VisitorLog::where('visitor_type', '!=', 'bot')
            ->where('connected_at', '>=', $since)
            ->where('is_mobile', true)
            ->count();

        $desktop = VisitorLog::where('visitor_type', '!=', 'bot')
            ->where('connected_at', '>=', $since)
            ->where('is_mobile', false)
            ->count();

        $totalHuman = $mobile + $desktop;

        if ($totalHuman > 0) {
            $mobilePercent = round(($mobile / $totalHuman) * 100, 1);
            $desktopPercent = round(($desktop / $totalHuman) * 100, 1);

            $this->info("📱 <fg=cyan>MOBILE VS DESKTOP</>");
            $this->info(str_repeat('-', 40));
            $this->line("  Mobile: <comment>{$mobile}</comment> ({$mobilePercent}%)");
            $this->line("  Desktop: <comment>{$desktop}</comment> ({$desktopPercent}%)");
            $this->newLine();
        }

        // ============================================
        // 5. RECENT VISITS
        // ============================================
        $this->info("🕒 <fg=cyan>RECENT VISITS</>");
        $this->info(str_repeat('-', 40));

        $recent = VisitorLog::latest()
            ->limit(5)
            ->get(['username', 'visitor_type', 'page_url', 'connected_at', 'browser', 'platform']);

        foreach ($recent as $visit) {
            $time = $visit->connected_at->diffForHumans();
            $icon = match($visit->visitor_type) {
                'user' => '👤',
                'anonymous' => '👥',
                'bot' => '🤖',
                default => '❓'
            };

            $this->line("  {$icon} <comment>{$visit->username}</comment>");
            $this->line("    Page: {$visit->page_url}");
            $this->line("    Time: {$time}");
            $this->line("    Device: {$visit->browser} on {$visit->platform}");
            $this->line("");
        }

        // ============================================
        // 6. DETAILED VIEW (if --detail flag)
        // ============================================
        if ($detail) {
            $this->info("📋 <fg=cyan>DETAILED DATA SAMPLE</>");
            $this->info(str_repeat('-', 40));

            $sample = VisitorLog::latest()
                ->limit(3)
                ->get();

            foreach ($sample as $record) {
                $this->table(
                    ['Field', 'Value'],
                    [
                        ['ID', $record->id],
                        ['User ID', $record->user_id],
                        ['Username', $record->username],
                        ['Visitor Type', $record->visitor_type],
                        ['Bot Type', $record->bot_type ?? 'N/A'],
                        ['Browser', $record->browser],
                        ['Platform', $record->platform],
                        ['Page URL', substr($record->page_url, 0, 50) . '...'],
                        ['IP Address', $record->ip_address],
                        ['Mobile', $record->is_mobile ? 'Yes' : 'No'],
                        ['AJAX', $record->is_ajax ? 'Yes' : 'No'],
                        ['Connected', $record->connected_at->format('Y-m-d H:i:s')],
                    ]
                );
                $this->newLine();
            }
        }

        $this->info("✅ Statistics generated successfully!");
    }
}