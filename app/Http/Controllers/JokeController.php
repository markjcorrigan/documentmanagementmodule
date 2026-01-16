<?php

namespace App\Http\Controllers;

use App\Models\Joke;
use App\Models\Jokecat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class JokeController extends Controller
{
    /**
     * Apply authentication middleware to ALL joke actions
     */
    public function __construct()
    {
        // Must be logged in to access ANY joke functionality
        $this->middleware('auth');

        // Only Super Admin can edit, delete, or bulk operations
        $this->middleware(function ($request, $next) {
            if (! auth()->user()->hasRole('Super Admin')) {
                abort(403, 'Only Super Admin can perform this action.');
            }

            return $next($request);
        })->only(['edit', 'update', 'destroy', 'destroyMultiple', 'exportCsv']);
    }

    /**
     * Display a listing of all jokes
     */
    public function index(Request $request)
    {
        $query = Joke::with('jokecat');

        // Filter favorites for current user
        if ($request->has('favorites') && $request->favorites == '1') {
            if (auth()->check()) {
                $query->whereHas('favoritedByUsers', function ($q) {
                    $q->where('user_id', auth()->id());
                });
            } else {
                // If not logged in, show no results
                $query->whereRaw('1 = 0');
            }
        }

        // Search functionality
        if ($request->has('s') && $request->s) {
            $query->search($request->s);
        }

        // Sorting
        if ($request->has('field') && $request->has('order')) {
            $query->orderBy($request->field, $request->order);
        } else {
            $query->latest();
        }

        $jokes = $query->paginate(10);
        $jokecats = Jokecat::all();

        return view('jokes.index', compact('jokes', 'jokecats'));
    }

    /**
     * Display jokes by category
     */
    public function byCategory($id)
    {
        $jokecat = Jokecat::findOrFail($id);
        $jokes = Joke::byCategory($id)
            ->with('jokecat')
            ->latest()
            ->paginate(10);

        $jokecats = Jokecat::all();

        return view('jokes.category', compact('jokes', 'jokecat', 'jokecats'));
    }

    /**
     * Show the form for creating a new joke
     */
    public function create()
    {
        $jokecats = Jokecat::all();

        return view('jokes.create', compact('jokecats'));
    }

    /**
     * Store a newly created joke
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'jokecat_id' => 'required|exists:jokecats,id',
            'is_ok' => 'boolean',
        ]);

        Joke::create($validated);

        return redirect()->route('jokes.index')
            ->with('success', 'Joke created successfully!');
    }

    /**
     * Display the specified joke
     */
    public function show(Joke $joke)
    {
        $joke->load('jokecat');

        return view('jokes.show', compact('joke'));
    }

    /**
     * Show the form for editing the specified joke
     */
    public function edit(Joke $joke)
    {
        $jokecats = Jokecat::all();

        return view('jokes.edit', compact('joke', 'jokecats'));
    }

    /**
     * Update the specified joke
     */
    public function update(Request $request, Joke $joke)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'jokecat_id' => 'required|exists:jokecats,id',
            'is_ok' => 'boolean',
        ]);

        $joke->update($validated);

        return redirect()->route('jokes.index')
            ->with('success', 'Joke updated successfully!');
    }

    /**
     * Remove the specified joke
     */
    public function destroy(Joke $joke)
    {
        $joke->delete();

        if (request()->ajax()) {
            return response()->json(['message' => 'Joke deleted successfully']);
        }

        return redirect()->route('jokes.index')
            ->with('success', 'Joke deleted successfully!');
    }

    /**
     * Delete multiple jokes
     */
    public function destroyMultiple(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:jokes,id',
        ]);

        Joke::whereIn('id', $request->ids)->delete();

        return response()->json(['message' => 'Jokes deleted successfully']);
    }

    /**
     * Export jokes to CSV
     */
    public function exportCsv()
    {
        $jokes = Joke::with('jokecat')->get();

        $filename = 'jokes_'.date('Y-m-d_H-i-s').'.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($jokes) {
            $file = fopen('php://output', 'w');

            // Add headers
            fputcsv($file, ['ID', 'Title', 'Description', 'Category', 'Approved', 'Favorite', 'Created At']);

            // Add data
            foreach ($jokes as $joke) {
                fputcsv($file, [
                    $joke->id,
                    $joke->title,
                    $joke->description,
                    $joke->jokecat->name ?? 'N/A',
                    $joke->is_ok ? 'Yes' : 'No',
                    $joke->is_favorite ? 'Yes' : 'No',
                    $joke->created_at,
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    /**
     * Toggle favorite status for a joke (user-specific)
     */
    public function toggleFavorite(Joke $joke)
    {
        if (! auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login to favorite jokes',
            ], 401);
        }

        $isFavorited = auth()->user()->toggleFavorite($joke->id);

        return response()->json([
            'success' => true,
            'is_favorite' => $isFavorited,
            'message' => $isFavorited ? 'Added to favorites!' : 'Removed from favorites!',
        ]);
    }

    /**
     * Get a random joke
     */
    public function random()
    {
        $joke = Joke::with('jokecat')->inRandomOrder()->first();

        if (! $joke) {
            return response()->json([
                'success' => false,
                'message' => 'No jokes available!',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'joke' => [
                'id' => $joke->id,
                'title' => $joke->title,
                'description' => $joke->description,
                'category' => $joke->jokecat->name ?? 'Uncategorized',
                'is_favorite' => $joke->is_favorite,
                'url' => route('jokes.show', $joke),
            ],
        ]);
    }

    /**
     * Backup jokes and jokecats tables to storage
     * Only accessible by users with 'joketable backup' permission
     *
     * REPLACE the backupTable() method in your JokeController with this one
     */
    public function backupTable()
    {
        // Check permission
        if (!auth()->user()->can('joketable backup')) {
            abort(403, 'Unauthorized action.');
        }

        try {
            // Get all jokes with relationships - CORRECTED relationship names
            $jokes = \App\Models\Joke::with(['jokecat', 'favoritedByUsers'])->get();

            // Get all joke categories
            $jokecats = \App\Models\Jokecat::withCount('jokes')->get();

            // Create backup directory if it doesn't exist
            $backupPath = storage_path('app/backups/jokesbackup');
            if (!file_exists($backupPath)) {
                mkdir($backupPath, 0755, true);
            }

            // Create filename with timestamp
            $timestamp = now()->format('Y-m-d_His');
            $filename = "jokes_complete_backup_{$timestamp}.json";
            $filepath = $backupPath . '/' . $filename;

            // Prepare backup data (BOTH tables)
            $backupData = [
                'backup_date' => now()->toDateTimeString(),
                'backed_up_by' => auth()->user()->email,
                'backup_version' => '2.0',
                'statistics' => [
                    'total_jokes' => $jokes->count(),
                    'total_categories' => $jokecats->count(),
                    'approved_jokes' => $jokes->where('is_ok', true)->count(),
                    'pending_jokes' => $jokes->where('is_ok', false)->count(),
                ],

                // JOKE CATEGORIES (backup first for restore order)
                'jokecats' => $jokecats->map(function($cat) {
                    return [
                        'id' => $cat->id,
                        'name' => $cat->name,
                        'description' => $cat->description ?? null,
                        'jokes_count' => $cat->jokes_count,
                        'created_at' => $cat->created_at->toDateTimeString(),
                        'updated_at' => $cat->updated_at->toDateTimeString(),
                    ];
                })->toArray(),

                // JOKES
                'jokes' => $jokes->map(function($joke) {
                    return [
                        'id' => $joke->id,
                        'title' => $joke->title,
                        'description' => $joke->description,
                        'is_ok' => $joke->is_ok,
                        'is_favorite' => $joke->is_favorite,
                        'jokecat_id' => $joke->jokecat_id,
                        'jokecat_name' => $joke->jokecat ? $joke->jokecat->name : null,
                        'favorites_count' => $joke->favoritedByUsers->count(),
                        'favorited_by_user_ids' => $joke->favoritedByUsers->pluck('id')->toArray(),
                        'created_at' => $joke->created_at->toDateTimeString(),
                        'updated_at' => $joke->updated_at->toDateTimeString(),
                    ];
                })->toArray()
            ];

            // Write to file
            file_put_contents($filepath, json_encode($backupData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            // Log the backup
            \Log::info('Complete jokes backup created', [
                'filename' => $filename,
                'total_jokes' => $jokes->count(),
                'total_categories' => $jokecats->count(),
                'user' => auth()->user()->email,
                'path' => $filepath
            ]);

            // Return success with download
            return response()->download($filepath)->deleteFileAfterSend(false);

        } catch (\Exception $e) {
            \Log::error('Jokes backup failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user' => auth()->user()->email
            ]);

            return redirect()->back()->with('error', 'Backup failed: ' . $e->getMessage());
        }
    }

    /**
     * List all available backups
     */
    public function listBackups()
    {
        // Check permission
        if (!auth()->user()->can('joketable backup')) {
            abort(403, 'Unauthorized action.');
        }

        $backupPath = storage_path('app/backups/jokesbackup');
        $backups = [];

        if (file_exists($backupPath)) {
            $files = glob($backupPath . '/jokes_complete_backup_*.json');

            // Also get old format backups for migration
            $oldFiles = glob($backupPath . '/jokes_backup_*.json');
            $files = array_merge($files, $oldFiles);

            foreach ($files as $file) {
                // Read backup file to get metadata
                $content = json_decode(file_get_contents($file), true);

                $backups[] = [
                    'filename' => basename($file),
                    'size' => $this->formatBytes(filesize($file)),
                    'date' => date('Y-m-d H:i:s', filemtime($file)),
                    'path' => $file,
                    'total_jokes' => $content['statistics']['total_jokes'] ?? $content['total_jokes'] ?? 'N/A',
                    'total_categories' => $content['statistics']['total_categories'] ?? 'N/A',
                    'backed_up_by' => $content['backed_up_by'] ?? 'Unknown',
                    'version' => $content['backup_version'] ?? '1.0'
                ];
            }

            // Sort by date descending (newest first)
            usort($backups, function($a, $b) {
                return $b['date'] <=> $a['date'];
            });
        }

        return view('jokes.backups', compact('backups'));
    }

    /**
     * Download a specific backup file
     */
    public function downloadBackup($filename)
    {
        // Check permission
        if (!auth()->user()->can('joketable backup')) {
            abort(403, 'Unauthorized action.');
        }

        // Validate filename to prevent directory traversal
        if (preg_match('/^jokes_(complete_)?backup_\d{4}-\d{2}-\d{2}_\d{6}\.json$/', $filename)) {
            $filepath = storage_path('app/backups/jokesbackup/' . $filename);

            if (file_exists($filepath)) {
                \Log::info('Backup downloaded', [
                    'filename' => $filename,
                    'user' => auth()->user()->email
                ]);

                return response()->download($filepath);
            }
        }

        return redirect()->back()->with('error', 'Backup file not found.');
    }

    /**
     * Delete a specific backup file
     */
    public function deleteBackup($filename)
    {
        // Check permission
        if (!auth()->user()->can('joketable backup')) {
            abort(403, 'Unauthorized action.');
        }

        // Validate filename to prevent directory traversal
        if (preg_match('/^jokes_(complete_)?backup_\d{4}-\d{2}-\d{2}_\d{6}\.json$/', $filename)) {
            $filepath = storage_path('app/backups/jokesbackup/' . $filename);

            if (file_exists($filepath)) {
                unlink($filepath);

                \Log::info('Backup deleted', [
                    'filename' => $filename,
                    'user' => auth()->user()->email
                ]);

                return redirect()->back()->with('success', 'Backup deleted successfully.');
            }
        }

        return redirect()->back()->with('error', 'Backup file not found.');
    }

    /**
     * Restore from backup
     *
     * REPLACE the restoreFromBackup() method in your JokeController with this one
     */
    public function restoreFromBackup(Request $request)
    {
        // Check permission
        if (!auth()->user()->can('joketable backup')) {
            abort(403, 'Unauthorized action.');
        }

        $filename = $request->input('filename');

        // Validate filename
        if (!preg_match('/^jokes_(complete_)?backup_\d{4}-\d{2}-\d{2}_\d{6}\.json$/', $filename)) {
            return redirect()->back()->with('error', 'Invalid backup file.');
        }

        $filepath = storage_path('app/backups/jokesbackup/' . $filename);

        if (!file_exists($filepath)) {
            return redirect()->back()->with('error', 'Backup file not found.');
        }

        try {
            \DB::beginTransaction();

            // Read backup file
            $backupData = json_decode(file_get_contents($filepath), true);

            if (!$backupData) {
                throw new \Exception('Invalid backup file format.');
            }

            // STEP 1: Restore Joke Categories first
            if (isset($backupData['jokecats'])) {
                foreach ($backupData['jokecats'] as $catData) {
                    \App\Models\Jokecat::updateOrCreate(
                        ['id' => $catData['id']],
                        [
                            'name' => $catData['name'],
                            'description' => $catData['description'] ?? null,
                            'created_at' => $catData['created_at'],
                            'updated_at' => $catData['updated_at'],
                        ]
                    );
                }
            }

            // STEP 2: Restore Jokes
            if (isset($backupData['jokes'])) {
                foreach ($backupData['jokes'] as $jokeData) {
                    $joke = \App\Models\Joke::updateOrCreate(
                        ['id' => $jokeData['id']],
                        [
                            'title' => $jokeData['title'],
                            'description' => $jokeData['description'],
                            'is_ok' => $jokeData['is_ok'],
                            'is_favorite' => $jokeData['is_favorite'] ?? false,
                            'jokecat_id' => $jokeData['jokecat_id'],
                            'created_at' => $jokeData['created_at'],
                            'updated_at' => $jokeData['updated_at'],
                        ]
                    );

                    // STEP 3: Restore favorites (using the correct relationship)
                    if (isset($jokeData['favorited_by_user_ids']) && !empty($jokeData['favorited_by_user_ids'])) {
                        // Sync favorites (only add users that still exist)
                        $existingUserIds = \App\Models\User::whereIn('id', $jokeData['favorited_by_user_ids'])
                            ->pluck('id')
                            ->toArray();

                        $joke->favoritedByUsers()->sync($existingUserIds);
                    }
                }
            }

            \DB::commit();

            \Log::info('Backup restored successfully', [
                'filename' => $filename,
                'user' => auth()->user()->email,
                'jokes_restored' => count($backupData['jokes'] ?? []),
                'categories_restored' => count($backupData['jokecats'] ?? [])
            ]);

            return redirect()->route('jokes.backups.list')->with('success',
                'Backup restored successfully! Restored ' .
                count($backupData['jokes'] ?? []) . ' jokes and ' .
                count($backupData['jokecats'] ?? []) . ' categories.'
            );

        } catch (\Exception $e) {
            \DB::rollBack();

            \Log::error('Backup restore failed', [
                'filename' => $filename,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user' => auth()->user()->email
            ]);

            return redirect()->back()->with('error', 'Restore failed: ' . $e->getMessage());
        }
    }
    /**
     * Helper function to format bytes
     */
    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}