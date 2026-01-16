<?php

// At the TOP of routes/web.php, add these imports with ALIASES:
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\BlogPostController;
use App\Http\Controllers\backend\CommentController;
use App\Http\Controllers\backend\HeroController;
use App\Http\Controllers\backend\PortfolioController;
use App\Http\Controllers\backend\ResumeController;
use App\Http\Controllers\backend\ServicesController;
use App\Http\Controllers\backend\SiteSettingsController;
use App\Http\Controllers\backend\SkillsController;
use App\Http\Controllers\backend\TestimonialController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentDownloadController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\FileDemoController;

// Frontend Controllers
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\UserPostsBlogPostController;

use App\Http\Controllers\GuitarFolderController;
use App\Http\Controllers\GuitarScoreController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProtectedStorageFilesController;
use App\Http\Controllers\ProtectedStorageFolderController;
use App\Http\Controllers\PublicLandingController;
use App\Livewire\LiveDocument\Index as DocumentIndex;
use App\Livewire\LiveDocument\ListDocuments;
use App\Livewire\LiveImage\Index as ImageIndex;
use App\Livewire\LiveImage\ListImages;

use App\Helpers\ProtectedFiles;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImageDemoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JokecatController;
use App\Http\Controllers\JokeController;
use App\Http\Controllers\LegacyController;
use App\Http\Controllers\MailerController;
use App\Http\Controllers\PmboksixController;
use App\Http\Controllers\StuffController;
use App\Http\Controllers\TinymceController;
use App\Http\Middleware\TransitionInterceptor;
use App\Livewire\AboutPmway;
use App\Livewire\Accelerate;
use App\Livewire\AcidDatabase;
use App\Livewire\AgileMethodsCarousel;
use App\Livewire\AgilevsTraditional;
use App\Livewire\AmericanFootball;
use App\Livewire\AmericanFootballVideos;
use App\Livewire\ATemplate;
use App\Livewire\Avatarform;
use App\Livewire\Blog\CreatePost;
use App\Livewire\Blog\EditPost;
use App\Livewire\Blog\ProfileFollowers;
use App\Livewire\Blog\ProfileFollowing;
use App\Livewire\Blog\ProfilePosts;
use App\Livewire\Blog\SinglePost;
use App\Livewire\Blog\Writefull;
use App\Livewire\BurndownShort;
use App\Livewire\CapabilityMaturityModel;
use App\Livewire\CategoriesManager;
use App\Livewire\Chat\ChatDashboard;
use App\Livewire\CmmiDevDashboard;
use App\Livewire\CMMiLanding;
use App\Livewire\CmmiLevelOne;
use App\Livewire\CrocodileHunter;
use App\Livewire\DocumentUploader;
use App\Livewire\DoneDone;
use App\Livewire\EthosLogosPathos;
use App\Livewire\FreedomsBarriersGoals;
use App\Livewire\GameStatsNew;
use App\Livewire\HamAndEggs;
use App\Livewire\Home;
use App\Livewire\KanbanCoffee;
use App\Livewire\LittlesLaw;
use App\Livewire\Livewireprocs;
use App\Livewire\NotesManager;
use App\Livewire\PersonalKanban;
use App\Livewire\PmbokProcessExample;
use App\Livewire\PmbokProcessNutshell;
use App\Livewire\Pmway\Itil\ItilFourPracticesLive;
use App\Livewire\Pmway\Laws;
use App\Livewire\PrivateOne;
use App\Livewire\ProductIncrement;
use App\Livewire\RedBeadExperiment;
use App\Livewire\ReleaseManagement;
use App\Livewire\SafeCritique;
use App\Livewire\Sbokfour;
use App\Livewire\ScrumDashboards;
use App\Livewire\Scrumfix;
use App\Livewire\ScrumSpike;
use App\Livewire\ScrumStudyVids;
use App\Livewire\SevenFs;
use App\Livewire\SevenRulesOfScrum;
use App\Livewire\SiteTransition;
use App\Livewire\Snowbird;
use App\Livewire\SpeedboatTool;
use App\Livewire\StudyMethods;
use App\Livewire\StyleGuide;
use App\Livewire\ThePMWay;
use App\Livewire\VModel;
use App\Livewire\WorkCarousel;
use App\Livewire\WorkingSoftware;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// test routes

/**
 * Add these routes to your routes/web.php file temporarily for diagnostics
 * Place them OUTSIDE any auth middleware groups
 */

// Session & CSRF Diagnostic Page
Route::get('/diagnose-session', function () {
    return view('diagnose-session');
})->name('diagnose.session');

// Test POST endpoint for CSRF verification
Route::post('/diagnose-session-post', function () {
    return response()->json([
        'success' => true,
        'message' => '✓ CSRF token is working correctly!',
        'token_received' => request()->input('_token'),
        'session_id' => session()->getId(),
        'time' => now()->toDateTimeString()
    ]);
})->name('diagnose.session.post');

/**
 * After adding these routes, visit:
 * http://pmway.local/diagnose-session
 */

/*
|--------------------------------------------------------------------------
| 🚨 PUBLIC ROUTES - No Authentication Required
|--------------------------------------------------------------------------
| These are accessible to everyone (including bots) for SEO and marketing
*/

// Home & Main Landing
Route::get('/', Home::class)->name('home');
Route::get('/home', Home::class);

// Public landing page route
Route::get('/public-landing', [PublicLandingController::class, 'index'])
    ->name('public-landing');

// Transition Warning Page (Public but with notice)
Route::get('/transition', SiteTransition::class)->name('site.transition');

// Portfolio (Public for marketing)
Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
Route::get('/workcarousel', WorkCarousel::class);

// Style Guide (Public)
Route::get('/style-guide', StyleGuide::class);
Route::get('/atemplate', ATemplate::class)->name('atemplate');

// Utility Routes - Public (Harmless)
Route::view('/tailwind', 'tailwind')->name('tailwind');

/*
|--------------------------------------------------------------------------
| Jokes Module (Public Entertainment)
|--------------------------------------------------------------------------
*/



Route::prefix('jokes')->name('jokes.')->group(function () {
    Route::get('/', [JokeController::class, 'index'])->name('index');
    Route::get('/random', [JokeController::class, 'random'])->name('random');
    Route::get('/category/{id}', [JokeController::class, 'byCategory'])->name('category');
    Route::get('/export/csv', [JokeController::class, 'exportCsv'])->name('export.csv');

    // Joke Management Routes (Super Admin OR 'joke management' permission)
    Route::middleware(['auth', 'role_or_permission:Super Admin|joke management'])->group(function () {
        Route::get('/create', [JokeController::class, 'create'])->name('create');
        Route::post('/', [JokeController::class, 'store'])->name('store');
        Route::post('/delete-multiple', [JokeController::class, 'destroyMultiple'])->name('destroyMultiple');
        Route::get('/{joke}/edit', [JokeController::class, 'edit'])->name('edit');
        Route::put('/{joke}', [JokeController::class, 'update'])->name('update');
        Route::delete('/{joke}', [JokeController::class, 'destroy'])->name('destroy');
    });

    // Joke Categories Management (Super Admin OR 'joke management' permission)
    Route::prefix('categories')->name('jokecats.')->group(function () {
        Route::get('/', [JokecatController::class, 'index'])->name('index');

        Route::middleware(['auth', 'role_or_permission:Super Admin|joke management'])->group(function () {
            Route::get('/create', [JokecatController::class, 'create'])->name('create');
            Route::post('/', [JokecatController::class, 'store'])->name('store');
            Route::get('/{jokecat}/edit', [JokecatController::class, 'edit'])->name('edit');
            Route::put('/{jokecat}', [JokecatController::class, 'update'])->name('update');
            Route::delete('/{jokecat}', [JokecatController::class, 'destroy'])->name('destroy');
        });
    });

    // Backup routes (Super Admin only with 'joketable backup' permission)
    Route::middleware(['auth', 'permission:joketable backup'])->group(function () {
        Route::get('/backup/create', [JokeController::class, 'backupTable'])->name('backup');
        Route::get('/backups', [JokeController::class, 'listBackups'])->name('backups.list');
        Route::get('/backups/download/{filename}', [JokeController::class, 'downloadBackup'])->name('backups.download');
        Route::delete('/backups/delete/{filename}', [JokeController::class, 'deleteBackup'])->name('backups.delete');
        Route::post('/backups/restore', [JokeController::class, 'restoreFromBackup'])->name('backups.restore');
    });

    // Public viewing routes - MOVED TO BOTTOM
    Route::get('/{joke}', [JokeController::class, 'show'])->name('show');
    Route::post('/{joke}/toggle-favorite', [JokeController::class, 'toggleFavorite'])->name('toggleFavorite');
});

/*
|--------------------------------------------------------------------------
| LEGACY CONTACT
|---------
*/

// Contact (Public)
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('store-contact-message', [FrontendController::class, 'StoreContactMessage'])->name('store.contact.message');


/*
|--------------------------------------------------------------------------
| LEGACY BLOG ROUTES (Public viewing)
|--------------------------------------------------------------------------
*/

// LEGACY BLOG ROUTES (Public viewing)
/*
|--------------------------------------------------------------------------
| LEGACY BLOG ROUTES (Public viewing)
|--------------------------------------------------------------------------
*/

// MOST SPECIFIC ROUTES FIRST (exact matches before parameters)
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/most-voted-posts', [FrontendController::class, 'MostVotedPosts'])->name('most.voted');

/*
|--------------------------------------------------------------------------
| BLOG ROUTES - Public Viewing, Auth for Creation/Management
|--------------------------------------------------------------------------
*/
Route::prefix('blog')->name('blog.')->group(function () {
    // PUBLIC blog routes (SEO-friendly)
    Route::get('/post/{post}', SinglePost::class)->name('post');
    Route::get('/profile/{username}', ProfilePosts::class)->name('profile');
    Route::get('/profile/{username}/followers', ProfileFollowers::class)->name('profile.followers');
    Route::get('/profile/{username}/following', ProfileFollowing::class)->name('profile.following');

    // AUTHENTICATED blog routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/feed', Writefull::class)->name('feed');
        Route::get('/create', CreatePost::class)->name('create');
        Route::get('/post/{post}/edit', EditPost::class)->name('edit');
        Route::get('/top-voted', function () {
            return view('tailwind-most-voted');
        })->name('top.voted');
    });
});

// PARAMETER ROUTES LAST (AFTER all specific blog routes)
Route::get('/blog/{id}', [FrontendController::class, 'BlogDetails'])->name('blog.details');
Route::get('/post/details/{id}', [FrontendController::class, 'BlogDetails'])->name('legacy.blog.details');

// Comment submission
Route::post('store-comment', [FrontendController::class, 'StoreComment'])->name('store.comment');

/*
|--------------------------------------------------------------------------
| Booklets and PDF Routes (Public)
|--------------------------------------------------------------------------
*/

// Booklets routes
Route::prefix('booklets')->group(function () {
    // Main seagull page (Blade view)
    Route::get('/seagull', function () {
        // Get list of PDF files for reference
        $pdfFiles = [];
        $pdfDir = public_path('booklets');

        if (is_dir($pdfDir)) {
            $allFiles = scandir($pdfDir);
            foreach ($allFiles as $file) {
                if (pathinfo($file, PATHINFO_EXTENSION) === 'pdf') {
                    $pdfFiles[] = [
                        'filename' => $file,
                        'title' => pathinfo($file, PATHINFO_FILENAME)
                    ];
                }
            }
        }

        return view('booklets.seagull', compact('pdfFiles'));
    })->name('booklets.seagull');

    // Books page (Blade view)
    Route::get('/books', function () {
        return view('booklets.books');
    })->name('booklets.books');

    // dicts - Tech dictionary (Blade view)
    Route::get('/dicts', function () {
        return view('booklets.dicts');
    })->name('booklets.dicts');

    // lrh.html - Lectures (static HTML for now)
    Route::get('/lrh', function () {
        $path = public_path('booklets/lrh.html');
        if (!file_exists($path)) {
            abort(404);
        }
        return response()->file($path);
    })->name('booklets.lrh');

    // lrhstudy.html - Study lectures (static HTML for now)
    Route::get('/lrhstudy', function () {
        $path = public_path('booklets/lrhstudy.html');
        if (!file_exists($path)) {
            abort(404);
        }
        return response()->file($path);
    })->name('booklets.lrhstudy');

    // Serve files from the 'book' folder
    Route::get('/book/{filename}', function ($filename) {
        $path = public_path("booklets/book/{$filename}");

        // Check for .htm or .html
        if (file_exists($path)) {
            return response()->file($path);
        }

        if (file_exists($path . '.htm')) {
            return response()->file($path . '.htm');
        }

        if (file_exists($path . '.html')) {
            return response()->file($path . '.html');
        }

        abort(404, "File not found: {$filename}");
    });
});

// Technical dictionary PDF routes
Route::prefix('technical-dictionary')->name('techdict.')->group(function () {
    Route::get('/technical-dictionary.pdf', function () {
        $path = public_path('technical dictionary/technical dictionary.pdf');
        return file_exists($path) ? response()->file($path) : abort(404);
    })->name('technical');

    Route::get('/master-glossary.pdf', function () {
        $path = public_path('technical dictionary/master_glossary.pdf');
        return file_exists($path) ? response()->file($path) : abort(404);
    })->name('master-glossary');
});

// PDF routes
Route::prefix('pdf')->name('pdf.')->group(function () {
    Route::get('/', [PdfController::class, 'index'])->name('index');
    Route::get('/view/{filename}', [PdfController::class, 'view'])->name('view');
    Route::get('/download/{filename}', [PdfController::class, 'download'])->name('download');
    Route::get('/download-force/{filename}', [PdfController::class, 'forceDownload'])->name('force-download');
});

/*
|--------------------------------------------------------------------------
| SYSTEM & HEALTH CHECK ROUTES (Public)
|--------------------------------------------------------------------------
*/

// Health Check
Route::get('/health', function() {
    $startTime = microtime(true);

    $response = [
        'status' => 'healthy',
        'timestamp' => now()->toIso8601String(),
        'services' => [],
        'system' => [],
        'checks' => [],
    ];

    try {
        // 1. DATABASE CHECK
        DB::connection()->getPdo();
        $response['services']['database'] = 'connected';
        $response['checks']['database'] = true;

    } catch (\Exception $e) {
        $response['services']['database'] = 'error: ' . $e->getMessage();
        $response['checks']['database'] = false;
        $response['status'] = 'unhealthy';
    }

    try {
        // 2. CACHE CHECK (simplified)
        Cache::put('health_check', 'ok', 5);
        $cacheTest = Cache::get('health_check');
        $response['services']['cache'] = $cacheTest === 'ok' ? 'connected' : 'warning';
        $response['services']['cache_driver'] = config('cache.default');

    } catch (\Exception $e) {
        $response['services']['cache'] = 'warning: ' . $e->getMessage();
    }

    // 3. BASIC SYSTEM INFO (Windows compatible)
    $response['system']['php_version'] = PHP_VERSION;
    $response['system']['laravel_version'] = app()->version();
    $response['system']['server_software'] = $_SERVER['SERVER_SOFTWARE'] ?? 'unknown';
    $response['system']['timezone'] = date_default_timezone_get();

    try {
        // 4. DISK SPACE (try C: drive on Windows)
        $diskPath = 'C:';
        if (!is_dir($diskPath)) {
            $diskPath = base_path(); // Laravel directory
        }

        $diskTotal = disk_total_space($diskPath);
        $diskFree = disk_free_space($diskPath);

        if ($diskTotal && $diskFree) {
            $diskPercent = round(100 - ($diskFree / $diskTotal * 100), 2);
            $response['system']['disk_path'] = $diskPath;
            $response['system']['disk_usage_percent'] = $diskPercent;
            $response['system']['disk_free_gb'] = round($diskFree / 1024 / 1024 / 1024, 2);
            $response['system']['disk_total_gb'] = round($diskTotal / 1024 / 1024 / 1024, 2);
            $response['checks']['disk_space'] = $diskPercent < 90;
        }

    } catch (\Exception $e) {
        $response['system']['disk_error'] = $e->getMessage();
    }

    try {
        // 5. VISITOR COUNT (optional - might fail)
        $visitorCount = DB::table('visitor_logs')
            ->where('updated_at', '>', now()->subHour())
            ->count();
        $response['visitors_last_hour'] = $visitorCount;

    } catch (\Exception $e) {
        $response['visitors_last_hour'] = 'table_not_found';
        // Not critical, don't change status
    }
    // Add after your current visitor count
    try {
        $visitorStats = DB::table('visitor_logs')
            ->selectRaw('
            COUNT(*) as total_hits,
            COUNT(DISTINCT ip_address) as unique_ips,
            SUM(CASE WHEN visitor_type = "bot" THEN 1 ELSE 0 END) as bots,
            SUM(CASE WHEN visitor_type = "user" THEN 1 ELSE 0 END) as logged_in_users,
            SUM(CASE WHEN visitor_type = "anonymous" 
                     AND visitor_type != "bot" THEN 1 ELSE 0 END) as anonymous_humans
        ')
            ->where('updated_at', '>', now()->subHour())
            ->first();

        $response['visitor_stats'] = [
            'total_hits' => $visitorStats->total_hits ?? 0,
            'unique_ips' => $visitorStats->unique_ips ?? 0,
            'bots' => $visitorStats->bots ?? 0,
            'logged_in_users' => $visitorStats->logged_in_users ?? 0,
            'anonymous_humans' => $visitorStats->anonymous_humans ?? 0,
        ];

    } catch (\Exception $e) {
        $response['visitor_stats_error'] = $e->getMessage();
    }

    // 6. MEMORY USAGE
    $response['system']['memory_usage_mb'] = round(memory_get_usage(true) / 1024 / 1024, 2);
    $response['system']['memory_peak_mb'] = round(memory_get_peak_usage(true) / 1024 / 1024, 2);

    // 7. RESPONSE TIME
    $response['response_time_ms'] = round((microtime(true) - $startTime) * 1000, 2);

    // 8. FINAL STATUS
    $response['all_checks_passing'] = ($response['checks']['database'] ?? false)
        && ($response['checks']['disk_space'] ?? true);

    return response()->json($response);
});

// Traffic-Insights
Route::get('/traffic-insights', function() {
    try {
        $insights = [];

        // Last hour stats
        $lastHour = DB::table('visitor_logs')
            ->selectRaw('
                COUNT(*) as total,
                COUNT(DISTINCT ip_address) as unique_ips,
                SUM(CASE WHEN visitor_type = "user" THEN 1 ELSE 0 END) as logged_in_hits,
                SUM(CASE WHEN visitor_type = "anonymous" THEN 1 ELSE 0 END) as anonymous_hits,
                SUM(CASE WHEN visitor_type = "bot" THEN 1 ELSE 0 END) as bot_hits
            ')
            ->where('updated_at', '>', now()->subHour())
            ->first();

        $insights['last_hour'] = [
            'total_hits' => (int) ($lastHour->total ?? 0),
            'unique_visitors' => (int) ($lastHour->unique_ips ?? 0),
            'breakdown' => [
                'logged_in_users' => (int) ($lastHour->logged_in_hits ?? 0),
                'anonymous_visitors' => (int) ($lastHour->anonymous_hits ?? 0),
                'bots' => (int) ($lastHour->bot_hits ?? 0)
            ],
            'time_period' => 'Last 60 minutes',
            'generated_at' => now()->toIso8601String()
        ];

        // Last 24 hours
        $last24h = DB::table('visitor_logs')
            ->selectRaw('
                COUNT(*) as total,
                COUNT(DISTINCT ip_address) as unique_ips,
                SUM(CASE WHEN visitor_type = "user" THEN 1 ELSE 0 END) as logged_in_hits,
                SUM(CASE WHEN visitor_type = "anonymous" THEN 1 ELSE 0 END) as anonymous_hits,
                SUM(CASE WHEN visitor_type = "bot" THEN 1 ELSE 0 END) as bot_hits
            ')
            ->where('updated_at', '>', now()->subDay())
            ->first();

        $insights['last_24_hours'] = [
            'total_hits' => (int) ($last24h->total ?? 0),
            'unique_visitors' => (int) ($last24h->unique_ips ?? 0),
            'breakdown' => [
                'logged_in_users' => (int) ($last24h->logged_in_hits ?? 0),
                'anonymous_visitors' => (int) ($last24h->anonymous_hits ?? 0),
                'bots' => (int) ($last24h->bot_hits ?? 0)
            ],
            'time_period' => 'Last 24 hours',
            'generated_at' => now()->toIso8601String()
        ];

        // Top visitor IPs (external only)
        $topIPs = DB::table('visitor_logs')
            ->select('ip_address', DB::raw('COUNT(*) as hits'))
            ->where('updated_at', '>', now()->subDay())
            ->where('visitor_type', '!=', 'user')
            ->groupBy('ip_address')
            ->orderByDesc('hits')
            ->limit(10)
            ->get()
            ->map(function($item) {
                return [
                    'ip_address' => $item->ip_address,
                    'hits' => (int) $item->hits
                ];
            });

        $insights['top_external_ips_24h'] = $topIPs;

        // Add summary statistics
        $insights['summary'] = [
            'status' => 'success',
            'message' => 'Traffic insights generated successfully',
            'total_queries' => 3,
            'response_time_ms' => 0 // You can calculate this if you track start time
        ];

        return response()->json($insights, 200, [], JSON_PRETTY_PRINT);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to generate traffic insights',
            'error' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'timestamp' => now()->toIso8601String()
        ], 500);
    }
});

// Test routes
Route::get('/test-raw', function() {
    $url = 'https://pmway.hopto.org/health';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    echo "<pre>";
    echo htmlspecialchars($response);
    echo "</pre>";
});

// Super-fast monitor endpoint for external tools
Route::get('/ping', function() {
    return 'OK';
});

/*
|--------------------------------------------------------------------------
| 🚨 SUPER ADMIN ONLY - SYSTEM ADMINISTRATION
|--------------------------------------------------------------------------
| These routes can manipulate the system and MUST be protected
*/

Route::middleware(['auth', 'role:Super Admin'])->group(function () {

    // System Optimization & Cache Management
    Route::get('/optimize', function () {
        $kernel = app()->make(Illuminate\Contracts\Console\Kernel::class);
        $commands = [
            'queue:restart' => 'Queue restarted',
            'cache:clear' => 'Cache cleared',
            'config:cache' => 'Config cached',
            'route:clear' => 'Routes cleared',
            'view:clear' => 'Views cleared',
            'optimize:clear' => 'Optimization cleared',
            'optimize' => 'Optimization completed',
            'config:clear' => 'Config cleared',
        ];

        foreach ($commands as $command => $message) {
            $kernel->call($command);
            echo "$message.\n";
            flush();
        }

        exec('composer dump-autoload', $output, $result);
        echo "Composer autoload dumped.\n";
        echo 'All optimization steps completed!';
        flush();
    })->name('system.optimize');

    // Route Management
    Route::get('/routeslisting', function () {
        $routeCollection = Route::getRoutes();
        echo "<table style='width:100%'>";
        echo "<tr><td width='10%'><h4>HTTP Method</h4></td><td width='10%'><h4>Route</h4></td><td width='10%'><h4>Name</h4></td><td width='70%'><h4>Action</h4></td></tr>";
        foreach ($routeCollection as $value) {
            echo "<tr><td>{$value->methods()[0]}</td><td>{$value->uri()}</td><td>{$value->getName()}</td><td>{$value->getActionName()}</td></tr>";
        }
        echo '</table>';
    })->name('routes.listing');

    Route::get('/route-cache', function () {
        try {
            $exitCode = Artisan::call('route:cache');
            return $exitCode === 0 ? 'Route cache generated!' : 'Error generating route cache: '.Artisan::output();
        } catch (\Exception $e) {
            return 'Error generating route cache: '.$e->getMessage();
        }
    })->name('route.cache');

    Route::get('/route-clear', function () {
        try {
            Artisan::call('route:clear');
            return 'Route cache cleared!';
        } catch (\Exception $e) {
            return 'Error clearing route cache: '.$e->getMessage();
        }
    })->name('route.clear');

    // Debug & Diagnostic Routes
    Route::get('/check-visitor-system', function() {
        echo "<pre>";
        echo "=== Visitor Log System Check ===\n\n";

        // 1. Check database connection
        try {
            DB::connection()->getPdo();
            echo "✅ Database connection: OK\n";
        } catch (\Exception $e) {
            echo "❌ Database connection failed: " . $e->getMessage() . "\n";
            exit;
        }

        // 2. Check if table exists
        try {
            $tableExists = Schema::hasTable('visitor_logs');
            echo $tableExists ? "✅ visitor_logs table: EXISTS\n" : "❌ visitor_logs table: DOES NOT EXIST\n";

            if ($tableExists) {
                $count = \App\Models\VisitorLog::count();
                echo "📊 Current records: $count\n";
            }
        } catch (\Exception $e) {
            echo "❌ Error checking table: " . $e->getMessage() . "\n";
        }

        // 3. Test event dispatch
        echo "\n--- Testing Event Dispatch ---\n";
        if ($tableExists) {
            $initialCount = $count;

            try {
                \App\Events\VisitorConnected::dispatch(
                    'test-' . time(),
                    'Test User',
                    request()->ip(),
                    request()->userAgent(),
                    request()->url()
                );

                // Small delay for async processing
                sleep(1);

                $newCount = \App\Models\VisitorLog::count();
                $added = $newCount - $initialCount;

                echo $added > 0 ? "✅ Event dispatch: SUCCESS (added $added record)\n" : "❌ Event dispatch: FAILED (no records added)\n";
                echo "   Before: $initialCount records\n";
                echo "   After: $newCount records\n";

            } catch (\Exception $e) {
                echo "❌ Event dispatch error: " . $e->getMessage() . "\n";
            }
        }

        // 4. Show recent logs
        echo "\n--- Recent Logs (last 5) ---\n";
        if ($tableExists) {
            $logs = \App\Models\VisitorLog::latest()->take(5)->get();
            if ($logs->count() > 0) {
                foreach ($logs as $log) {
                    echo "ID: {$log->user_id} | User: {$log->username} | Time: {$log->connected_at}\n";
                }
            } else {
                echo "No logs found.\n";
            }
        }

        echo "\n=== Next Steps ===\n";
        if (!$tableExists) {
            echo "1. Run: php artisan migrate\n";
        } else if ($count == 0) {
            echo "1. Your logging only triggers when users join WebSocket chat channels\n";
            echo "2. Open a page with your live chat to test\n";
            echo "3. Consider adding middleware to log ALL site visitors\n";
        }

        echo "</pre>";
    })->name('visitor.system.check');

    Route::get('/simulate-500', function () {
        abort(500, 'Simulated 500 error');
    })->name('simulate.error');

    // Protected Content Access
    Route::get('/privateone', PrivateOne::class)->name('private.one');

    // Super User File Access
    Route::get('/stuffs/jokes/{filename}', [StuffController::class, 'show'])
        ->where('filename', '.*')
        ->name('stuffs.jokes');
});

/*
|--------------------------------------------------------------------------
| 🔒 AUTHENTICATED CONTENT - Modern Livewire Pages
|--------------------------------------------------------------------------
| Premium PM/Scrum/ITIL educational content - requires login
*/

Route::middleware(['auth'])->group(function () {

    // PM & Project Management
    Route::get('/the-pmway', ThePMWay::class)->name('the-pmway');
    Route::get('/gamestatsnew', GameStatsNew::class)->name('gamestatsnew');

    // Agile & Scrum
    Route::get('/agile-traditional', AgilevsTraditional::class)->name('agile-traditional');
    Route::get('/scrumfix', Scrumfix::class)->name('scrumfix');
    Route::get('/done-done', DoneDone::class)->name('done-done');
    Route::get('/crocodile-hunter', CrocodileHunter::class)->name('crocodile-hunter');
    Route::get('/agile-methods', AgileMethodsCarousel::class)->name('agile.methods');
    Route::get('/red-bead-experiment', RedBeadExperiment::class)->name('red-bead-experiment');
    Route::get('/scrum-dashboards', ScrumDashboards::class)->name('scrum.dashboards');
    Route::get('/seven-rules-of-scrum', SevenRulesOfScrum::class)->name('seven-rules-of-scrum');
    Route::get('/scrum-spike', ScrumSpike::class)->name('the.spike');
    Route::get('/scrum-study-vids', ScrumStudyVids::class)->name('scrum-study-vids');

    // CMMI
    Route::get('/cmmidevdashboard', CmmiDevDashboard::class)->name('cmmidevdashboard');
    Route::get('/cmmi-landing', CMMiLanding::class)->name('cmmi-landing');
    Route::get('/cmmi-level-one', CmmiLevelOne::class)->name('cmmi-level-one');
    Route::get('/capability-maturity-model', CapabilityMaturityModel::class)->name('cmm');

    // ITIL
    Route::get('/itilfourpracticeslive', ItilFourPracticeslive::class)->name('itilfourpracticeslive');

    // Process & Methodology
    Route::get('/acid-database', AcidDatabase::class)->name('acid-database');
    Route::get('/personal-kanban', PersonalKanban::class)->name('personal-kanban');
    Route::get('/laws', Laws::class)->name('laws');
    Route::get('/pmbok-process-example', PmbokProcessExample::class)->name('pmbok.process.example');
    Route::get('/vmodel', VModel::class)->name('vmodel');
    Route::get('/burndownshort', BurndownShort::class)->name('burndownshort');
    Route::get('/hamandeggs', HamAndEggs::class)->name('hamandeggs');
    Route::get('/kanbancoffee', KanbanCoffee::class)->name('kanban.coffee');
    Route::get('/accelerate', Accelerate::class)->name('accelerate');
    Route::get('/working-software', WorkingSoftware::class)->name('working.software');
    Route::get('/release-management', ReleaseManagement::class)->name('release.management');
    Route::get('/product-increment', ProductIncrement::class)->name('product.increment');
    Route::get('/safe-critique', SafeCritique::class)->name('safe.critique');
    Route::get('/snowbird', Snowbird::class)->name('snowbird');
    Route::get('/sevenfs', SevenFs::class)->name('sevenfs');
    Route::get('/sbok-four', Sbokfour::class)->name('sbok-four');
    Route::get('/littles-law', LittlesLaw::class)->name('littles-law');

    // Communication & Soft Skills
    Route::get('/ethos-logos-pathos', EthosLogosPathos::class)->name('ethos-logos-pathos');
    Route::get('/american-football', AmericanFootball::class)->name('american-football');
    Route::get('/american-football-videos', AmericanFootballVideos::class)->name('american-football.videos');

    // Productivity & Personal Development
    Route::get('/study-methods', StudyMethods::class)->name('study-methods');
    Route::get('/freedoms-barriers-goals', FreedomsBarriersGoals::class)->name('freedoms.barriers.goals');
    Route::get('/speedboat-tool', SpeedboatTool::class)->name('speedboat.tool');

    // About
    Route::get('/about-pmway', AboutPmway::class)->name('about-pmway');
});

/*
|--------------------------------------------------------------------------
| LIVEWIRE COMPONENTS (Demo/Testing) - Authenticated
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/greeter', \App\Livewire\Greeter::class)->name('greeter');
    Route::get('/livewireprocs', Livewireprocs::class)->name('livewireprocs');
    Route::get('/calculator', \App\Livewire\Calculator::class)->name('calculator');
    Route::get('/todo-list', \App\Livewire\TodoList::class)->name('todo-list');
    Route::get('/cascading-dropdown', \App\Livewire\CascadingDropdown::class)->name('cascading-dropdown');
    Route::get('/products', \App\Livewire\ProductsSearch::class)->name('products');
    Route::get('/image-upload', \App\Livewire\ImageUpload::class)->name('image-upload');
    Route::get('/registertest', \App\Livewire\RegisterForm::class)->name('registertest');
    Route::get('/lwsearch', \App\Livewire\LWSearch::class)->name('lwsearch');
});

/*
|--------------------------------------------------------------------------
| LEGACY BLADE VIEW ROUTES - With Transition Warning
|--------------------------------------------------------------------------
| OLD pages with middleware warning about style changes
*/

Route::middleware([TransitionInterceptor::class, 'auth'])->group(function () {

    // ITIL Routes
    Route::get('/home/itilfourpractices', [IndexController::class, 'itilfourpractices']);
    Route::get('/home/itiloverview', [IndexController::class, 'itiloverview']);
    Route::get('/home/itilss', [IndexController::class, 'itilss']);
    Route::get('/home/itilsd', [IndexController::class, 'itilsd']);
    Route::get('/home/itilst', [IndexController::class, 'itilst']);
    Route::get('/home/itilso', [IndexController::class, 'itilso']);
    Route::get('/home/itilcsi', [IndexController::class, 'itilcsi']);
    Route::get('/home/itil', [IndexController::class, 'itil']);
    Route::get('/home/itilpm', [IndexController::class, 'itilpm']);

    // Scrum Routes
    Route::get('/home/scrumroleclarity', [IndexController::class, 'scrumroleclarity']);
    Route::get('/home/userstories', [IndexController::class, 'userstories']);
    Route::get('/home/mvp', [IndexController::class, 'mvp']);
    Route::get('/home/burndownshort', [IndexController::class, 'burndownshort']);
    Route::get('/home/productincrement', [IndexController::class, 'productincrement']);
    Route::get('/home/sprintupclose', [IndexController::class, 'sprintupclose']);
    Route::get('/home/sailboat', [IndexController::class, 'sailboat'])->name('sailboat');
    Route::get('/home/scrum', [IndexController::class, 'scrum']);

    // SAFe Routes
    Route::get('/home/spo', [IndexController::class, 'spo']);
    Route::get('/home/ssm', [IndexController::class, 'ssm']);

    // Change Management Routes
    Route::get('/home/changeman', [IndexController::class, 'changeman']);
    Route::get('/home/changeadkar', [IndexController::class, 'changeadkar']);

    // Metrics & Measurement Routes
    Route::get('/home/measurement', [IndexController::class, 'measurement']);
    Route::get('/home/gamestats', [IndexController::class, 'gamestats'])->name('gamestats');
    Route::get('/home/removetheredbeads', [IndexController::class, 'removetheredbeads']);

    // Productivity Routes
    Route::get('/home/procrastination', [IndexController::class, 'procrastination']);
    Route::get('/home/recharge', [IndexController::class, 'recharge']);
    Route::get('/home/freedoms', [IndexController::class, 'freedoms']);
    Route::get('/home/monkey', [IndexController::class, 'monkey']);

    // Other Legacy Routes
    Route::get('/home/about', [IndexController::class, 'about']);
    Route::get('/home/baseline', [IndexController::class, 'baseline']);
    Route::get('/home/dml', [IndexController::class, 'dml']);
    Route::get('/home/test', [IndexController::class, 'test']);
});

/*
|--------------------------------------------------------------------------
| 🔒 LEGACY FILE SERVING ROUTES - Now Protected
|--------------------------------------------------------------------------
| PDFs, videos, downloads - ALL require authentication
*/

Route::middleware(['auth'])->group(function () {

    // Legacy HTML pages catch-all
    Route::get('/home/{page}', [LegacyController::class, 'show']);

    // PDF viewing routes
    Route::get('/viewpdf/{subfolder}/{filename}', [LegacyController::class, 'viewPdf']);
    Route::get('/viewpdf/{filename}', [LegacyController::class, 'viewPdf']);
    Route::get('/legacy/pdf/{subfolder}/{filename}', [LegacyController::class, 'viewPdf'])
        ->where('filename', '.*\.pdf');
    Route::get('/legacy/pdf/{filename}', [LegacyController::class, 'viewPdf'])
        ->where('filename', '.*\.pdf');

    // Video viewing routes
    Route::get('/viewvideo/{subfolder}/{filename}', [LegacyController::class, 'viewVideo']);
    Route::get('/legacy/video/{subfolder}/{filename}', [LegacyController::class, 'viewVideo'])
        ->where('filename', '.*\.(mp4|avi|mov|wmv)');

    // Download routes
    Route::get('/download/{subfolder}/{filename}', [LegacyController::class, 'download']);
    Route::get('/downloadzip/{filename}', [LegacyController::class, 'downloadZip']);
    Route::get('/legacy/download/{subfolder}/{filename}', [LegacyController::class, 'download']);
    Route::get('/legacy/download-zip/{filename}', [LegacyController::class, 'downloadZip']);

    // Public file serving from cmmidev directory (now protected)
    Route::get('/cmmidev/{path}', [LegacyController::class, 'servePublicFile'])
        ->where('path', '.*');

    // CMMI files from storage
    Route::get('/cmmi/files/{path}', function ($path) {
        $filePath = storage_path('app/public/assets/cmmidev/'.$path);
        if (!file_exists($filePath)) {
            abort(404);
        }
        return response()->file($filePath);
    })->where('path', '.*')->name('cmmi.files');

    // View PDF for ITIL 4 guides
    Route::get('/view-pdf/{filename}', function ($filename) {
        $filePath = base_path('resources/views/livewire/pmway/itil/itil4guides/'.$filename);
        if (file_exists($filePath)) {
            return response()->file($filePath);
        }
        abort(404);
    });

    // Individual legacy page route
    Route::get('/cmmidevdash', [LegacyController::class, 'page'])->name('cmmidevdash');

    // ITIL legacy routes (now protected)
    Route::get('/itiloverview', [IndexController::class, 'itiloverview']);
    Route::get('/itilss', [IndexController::class, 'itilss']);
    Route::get('/itilsd', [IndexController::class, 'itilsd']);
    Route::get('/itilst', [IndexController::class, 'itilst']);
    Route::get('/itilso', [IndexController::class, 'itilst']);
    Route::get('/itilcsi', [IndexController::class, 'itilcsi']);

    // File demo routes
    Route::get('/myfile-demo', [FileDemoController::class, 'index'])->name('myfile-demo');
    Route::delete('/myfile-demo/{id}', [FileDemoController::class, 'destroy'])->name('myfile-demo.destroy');
    Route::get('/myfile-demo/file/{filename}', [FileDemoController::class, 'serve'])->name('myfile-demo.serve');

    Route::get('/myimage-demo', [ImageDemoController::class, 'index'])->name('myimage-demo');
    Route::delete('/myimage-demo/{id}', [ImageDemoController::class, 'destroy'])->name('myimage-demo.destroy');
    Route::get('/myimage-demo/image/{imagename}', [ImageDemoController::class, 'serve'])->name('myimage-demo.serve');

    Route::post('upload-file', [IndexController::class, 'uploadFile'])
        ->middleware(['verified', 'permission:file demo']);

    // File downloads
    Route::get('viewpdf/{subfolder}/{filename}', [IndexController::class, 'viewpdf'])
        ->where('filename', '.*')
        ->name('viewpdf');

    Route::get('viewvideo/{subfolder}/{filename}', [IndexController::class, 'viewvideo'])
        ->where('subfolder', '[^/]+')
        ->where('filename', '.*')
        ->name('viewvideo');

    Route::get('download/{subfolder}/{filename}', [IndexController::class, 'saveAction'])
        ->where('subfolder', '[^/]+')
        ->where('filename', '.*')
        ->name('download');

    Route::get('downloadzip/{filename}', [IndexController::class, 'downloadZip'])
        ->where('filename', '.*')
        ->name('downloadzip');

    Route::get('user-view/{subfolder}/{filename}', [IndexController::class, 'userViewFile'])
        ->name('user.view.file');

    Route::get('/download-pdf/{filename}', [IndexController::class, 'downloadPdf'])
        ->name('download.pdf');

    Route::get('/download/assets/{filename}', function ($filename) {
        $filename = basename($filename);
        $filePath = storage_path('app/public/assets/'.$filename);

        if (!File::exists($filePath)) {
            abort(404, 'File not found');
        }

        $allowedExtensions = ['pdf', 'zip', 'doc', 'docx', 'xls', 'xlsx'];
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (!in_array($extension, $allowedExtensions)) {
            abort(403, 'File type not allowed');
        }

        return response()->download($filePath);
    })->name('download.asset');
});

/*
|--------------------------------------------------------------------------
| PMBOK Routes - Authenticated Required
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::prefix('pmbok-spa')->name('pmbok.spa.')->group(function () {
        Route::get('/', \App\Livewire\PmbokSpa\Dashboard::class)->name('dashboard');
        Route::get('/projects', \App\Livewire\PmbokSpa\ProjectList::class)->name('projects');
        Route::get('/process/{processId}', \App\Livewire\PmbokSpa\ProcessPage::class)->name('process');
    });

    Route::get('/pmboknutshell', PmbokProcessNutshell::class)->name('pmboknutshell');

    Route::prefix('pmboksix')->controller(PmboksixController::class)->group(function () {
        Route::get('initiate', 'initiate');
        Route::get('plan', 'plan');
        Route::get('execute', 'execute');
        Route::get('monitorandcontrol', 'monitorandcontrol');
        Route::get('close', 'close');
        Route::get('pmbokprocessnutshell', 'pmbokprocessnutshell');
        Route::get('pmnotes', 'pmnotes');
        Route::get('integration', 'integration');
        Route::get('communication', 'communication');
        Route::get('procurement', 'procurement');
        Route::get('quality', 'quality');
        Route::get('resource', 'resource');
        Route::get('risk', 'risk');
        Route::get('schedule', 'schedule');
        Route::get('scope', 'scope');
        Route::get('cost', 'cost');
        Route::get('stakeholder', 'stakeholder');

        foreach (['four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen'] as $prefix) {
            foreach (['one', 'two', 'three', 'four', 'five', 'six', 'seven'] as $suffix) {
                Route::get("{$prefix}{$suffix}", $prefix.$suffix);
            }
        }
    });
});

/*
|--------------------------------------------------------------------------
| Chat Module - Authenticated
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/chat', ChatDashboard::class)->name('chat.index');
});

/*
|--------------------------------------------------------------------------
| Visitor Analytics - Authenticated (Admin/Super Admin)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Super Admin'])->group(function () {
    // Primary route
    Route::get('/visitor-logs', \App\Livewire\VisitorAnalytics::class)->name('logs.index');

    // Alias route for backward compatibility
    Route::get('/visitor-analytics', \App\Livewire\VisitorAnalytics::class)->name('visitor.analytics');
});

/*
|--------------------------------------------------------------------------
| Notes App - Authenticated
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/notes', NotesManager::class)->name('notes.index');
    Route::get('/notes/categories', CategoriesManager::class)->name('notes.categories');
});

/*
|--------------------------------------------------------------------------
| TinyMCE & Editor - Authenticated
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::post('/tinymce/upload', [TinymceController::class, 'upload'])->name('tinymce.upload');
    Route::get('/editor/{filename?}', [EditorController::class, 'load'])->name('editor.load');
    Route::post('/editor/save', [EditorController::class, 'save'])->name('editor.save');
    Route::post('/editor/delete/{filename}', [EditorController::class, 'delete'])->name('editor.delete');
});

/*
|--------------------------------------------------------------------------
| Tailwind CSS Training - Authenticated
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/twcsstraining', \App\Livewire\TWCSSTraining::class)->name('twcsstraining');
    Route::get('/twcsstraining/{file}', function ($file) {
        $path = public_path('twcsstraining/'.$file);
        return file_exists($path) ? response()->file($path) : abort(404);
    })->where('file', '.*');
});

/*
|--------------------------------------------------------------------------
| PHPMailer Routes - Authenticated
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('email', [MailerController::class, 'email'])->name('email');
    Route::post('send-email', [MailerController::class, 'composeEmail'])->name('send-email');
});

/*
|--------------------------------------------------------------------------
| 🔐 AUTHENTICATED ROUTES - User Dashboard & Management
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');
    Route::get('/pmwaysearch', \App\Livewire\PMWaySearch::class)->name('pmwaysearch');
    Route::post('/forcelogout', [AuthenticatedSessionController::class, 'destroy'])->name('forcelogout');

    // Avatar Management
    Route::get('/manage-avatar', Avatarform::class);

    // CV (Protected)
    Route::get('/mycv', \App\Livewire\CvIndex::class)->name('mycv')->middleware('permission:mycv noaccess');

    // Document Management
	/*
    Route::get('/document-uploads', [DocumentController::class, 'uploads'])->name('uploads')->middleware('permission:document uploads');
    Route::post('/document-upload', [DocumentController::class, 'upload'])->name('upload')->middleware('permission:document upload');
    Route::get('/documents', [DocumentController::class, 'documents'])->name('documents');
    Route::get('/downloadbyshortname/{shortname}', [DocumentController::class, 'downloadByShortName'])->name('downloadByShortName')->middleware('permission:download byshortname');
    Route::delete('/documents/{id}', [DocumentController::class, 'destroy'])->name('documents.destroy')->middleware('permission:documents destroy');
    Route::get('/documents/{id}/edit', [DocumentController::class, 'edit'])->name('documents.edit')->middleware('permission:documents edit');
    Route::put('/documents/{id}', [DocumentController::class, 'update'])->name('documents.update')->middleware('permission:documents update');
    Route::get('/docusearch/{term}', [DocumentController::class, 'search']);
    Route::get('/documents/{shortname}/download', [DocumentController::class, 'downloadByShortName'])->name('documents.download');
	*/
	


    // Livewire/LiveDocuments spa
    Route::get('/livedocuments', DocumentIndex::class)->name('livedocuments.index');
    Route::get('/livedocumentslist', ListDocuments::class)->name('livedocuments.list');

    // Image Management
    Route::get('/image-uploads', [ImageController::class, 'uploads'])->name('image-uploading')->middleware('permission:document uploads');
    Route::post('/image-upload', [ImageController::class, 'upload'])->name('uploading')->middleware('permission:image upload');
    Route::get('/images', [ImageController::class, 'images'])->name('images');
    Route::delete('/images/{id}', [ImageController::class, 'destroy'])->name('images.destroy')->middleware('permission:images destroy');
    Route::get('/images/{id}/edit', [ImageController::class, 'edit'])->name('images.edit')->middleware('permission:images edit');
    Route::put('/images/{id}', [ImageController::class, 'update'])->name('images.update')->middleware('permission:images update');
    Route::get('/images/{shortname}/download', [ImageController::class, 'downloadByShortName'])->name('images.download');

    // Livewire/LiveImages spa
    Route::get('/liveimages', ImageIndex::class)->name('liveimages.index');
    Route::get('/liveimageslist', ListImages::class)->name('liveimages.list');

    // Blog Post Routes (Backend/Admin)
    Route::post('/update-post-status', [BlogPostController::class, 'updatePostStatus'])->name('update.post.status')->middleware('permission:blog approved');
    Route::get('/useraddpost', [UserPostsBlogPostController::class, 'UserAddPost'])->name('user.add.post');
    Route::post('/userstorepost', [UserPostsBlogPostController::class, 'UserStorePost'])->name('user.store.post');
    Route::get('/search', [UserPostsBlogPostController::class, 'usersearch'])->name('usersearch');
    Route::get('/post/details', [UserPostsBlogPostController::class, 'firstPost'])->name('first.post');
    Route::get('/writestuff', Writefull::class)->name('writestuff');

    Route::controller(BlogPostController::class)->group(function () {
        Route::get('all-post', 'AllPost')->middleware('permission:all post')->name('all.post');
        Route::get('/blogsbyauthor', 'blogsByAuthor')->middleware('permission:all postsbyauthor')->name('blogs.by.author');
        Route::get('add-post', 'AddPost')->middleware('permission:add post')->name('add.post');
        Route::post('store-post', 'StorePost')->middleware('permission:store post')->name('store.post');
        Route::get('edit-post/{id}', 'EditPost')->middleware('permission:edit post')->name('edit.post');
        Route::post('update-post/{id}', 'UpdatePost')->middleware('permission:update post')->name('update.post');
        Route::get('delete-post/{id}', 'DeletePost')->middleware('permission:delete post')->name('delete.post');
        Route::get('/post/{post}', 'viewSinglePost')->name('view.post');
        Route::get('/admin/post/{post}', 'viewSinglePost');
    });

    // Portfolio Dashboard
    Route::get('/portfoliodash', [AdminController::class, 'PortfolioDash'])->name('portfoliodash')->middleware('permission:portfolio dash');

    // Hero Section
    Route::controller(HeroController::class)->group(function () {
        Route::get('here-section', 'HeroSection')->name('hero.section')->middleware('permission:all hero');
        Route::post('update-here-section', 'UpdateHeroSection')->name('update.here.section')->middleware('permission:update hero');
    });

    // Services
    Route::controller(ServicesController::class)->group(function () {
        Route::get('all-services', 'AllServices')->name('all.services')->middleware('permission:all service');
        Route::get('add-service', 'AddService')->name('add.service')->middleware('permission:add service');
        Route::post('store-service', 'StoreService')->name('store.service')->middleware('permission:store service');
        Route::get('edit-service/{id}', 'EditService')->name('edit.service')->middleware('permission:edit service');
        Route::post('update-service', 'UpdateService')->name('update.service')->middleware('permission:update service');
        Route::get('delete-service/{id}', 'DeleteService')->name('delete.service')->middleware('permission:delete service');
    });

    // Portfolio/Recent Works
    Route::controller(PortfolioController::class)->group(function () {
        Route::get('all-recent-works', 'AllRecentWorks')->name('all.recent.works')->middleware('permission:all work');
        Route::get('all-work', 'AddWork')->name('add.work')->middleware('permission:add work');
        Route::post('store-work', 'StoreWork')->name('store.work')->middleware('permission:store work');
        Route::get('edit-word/{id}', 'EditWork')->name('edit.work')->middleware('permission:edit work');
        Route::post('update-work', 'UpdateWork')->name('update.work')->middleware('permission:update work');
        Route::get('delete-word/{id}', 'DeleteWork')->name('delete.work')->middleware('permission:delete work');
    });

    // Experience & Education
    Route::controller(ResumeController::class)->group(function () {
        Route::get('my-experience', 'MyExperience')->name('my.experience')->middleware('permission:all experience');
        Route::post('store-experience', 'StoreExperience')->name('store.experience')->middleware('permission:store experience');
        Route::get('edit-experience/{id}', 'EditExperience')->middleware('permission:edit experience');
        Route::post('update-experience', 'UpdateExperience')->name('update.experience')->middleware('permission:update experience');
        Route::get('delete-experience/{id}', 'DeleteExperience')->name('delete.experience')->middleware('permission:delete experience');
        Route::get('my-education', 'MyEducation')->name('my.education')->middleware('permission:all education');
    });

    // Skills
    Route::controller(SkillsController::class)->group(function () {
        Route::get('add-skill', 'AddSkill')->name('add.skill')->middleware('permission:add skill');
        Route::post('store-skill', 'StoreSkill')->name('store.skill')->middleware('permission:store skill');
        Route::get('all-skills', 'AllSkills')->name('all.skills')->middleware('permission:all skill');
        Route::get('edit-skill/{id}', 'EditSkill')->name('edit.skill')->middleware('permission:edit skill');
        Route::post('update-skill', 'UpdateSkill')->name('update.skill')->middleware('permission:update skill');
        Route::get('delete-skill/{id}', 'DeleteSkill')->name('delete.skill')->middleware('permission:delete skill');
    });

    // Testimonials
    Route::controller(TestimonialController::class)->group(function () {
        Route::get('add-testimony', 'AddTestimony')->name('add.testimony')->middleware('permission:add testimony');
        Route::post('store-testimony', 'StoreTestimony')->name('store.testimony')->middleware('permission:store testimony');
        Route::get('all-testimoies', 'AllTestimonies')->name('all.testimoies')->middleware('permission:all testimony');
        Route::get('edit-testimony/{id}', 'EditTestimony')->name('edit.testimony')->middleware('permission:edit testimony');
        Route::post('update-testimony', 'UpdateTestimony')->name('update.testimony')->middleware('permission:update testimony');
        Route::get('delete-testimony/{id}', 'DeleteTestimony')->name('delete.testimony')->middleware('permission:delete testimony');
    });

    // Comments & Contacts
    Route::controller(CommentController::class)->group(function () {
        Route::get('user-comments', 'UserComments')->name('user.comments');
        Route::post('comment-status-update', 'CommentStatusUpdate')->name('comment.status.update')->middleware('permission:update comment');
        Route::get('contact-message', 'ContactMessage')->name('contact.message')->middleware('permission:all contact');
        Route::get('delete-contact/{id}', 'DeleteContact')->name('delete.contact')->middleware('permission:delete contact');
    });

    // Site Settings
    Route::controller(SiteSettingsController::class)->group(function () {
        Route::get('site-settings', 'SiteSettings')->name('site.settings')->middleware('permission:all setting');
        Route::post('update-site-settings', 'UpdateSiteSettings')->name('update.site.settings')->middleware('permission:update setting');
    });

    // FilePond Document Manager
    Route::get('/admin/upload-documents', DocumentUploader::class)
        ->name('admin.upload.documents')
        ->middleware('role:Super User');

    Route::get('/admin/document-manager', DocumentUploader::class)
        ->name('admin.document.manager')
        ->middleware('permission:manage documents');

    Route::get('/admin/documents/download', [DocumentDownloadController::class, 'download'])
        ->name('admin.download.document')
        ->middleware('permission:manage documents');

    Route::get('/admin/documents/view', [DocumentDownloadController::class, 'view'])
        ->name('admin.view.document')
        ->middleware('permission:manage documents');

    // Impersonation (Super Admin Only)
    Route::post('/impersonate/{user}', [\App\Http\Controllers\ImpersonationController::class, 'store'])
        ->name('impersonate.store')
        ->middleware('permission:impersonate');
    Route::delete('/impersonate/stop', [\App\Http\Controllers\ImpersonationController::class, 'destroy'])
        ->name('impersonate.destroy');

    // Settings
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', \App\Livewire\Settings\Profile::class)->name('settings.profile');
    Route::get('settings/password', \App\Livewire\Settings\Password::class)->name('settings.password');
    Route::get('settings/appearance', \App\Livewire\Settings\Appearance::class)->name('settings.appearance');
    Route::get('settings/locale', \App\Livewire\Settings\Locale::class)->name('settings.locale');

    // Admin Routes
    Route::prefix('admin')->as('admin.')->group(function () {
        Route::get('/', \App\Livewire\Admin\Index::class)->name('index')->middleware('permission:access dashboard');
        Route::get('/users', \App\Livewire\Admin\Users::class)->name('users.index')->middleware('permission:view users');
        Route::get('/users/create', \App\Livewire\Admin\Users\CreateUser::class)->name('users.create')->middleware('permission:create users');
        Route::get('/users/{user}', \App\Livewire\Admin\Users\ViewUser::class)->name('users.show')->middleware('permission:view users');
        Route::get('/users/{user}/edit', \App\Livewire\Admin\Users\EditUser::class)->name('users.edit')->middleware('permission:update users');
        Route::get('/roles', \App\Livewire\Admin\Roles::class)->name('roles.index')->middleware('permission:view roles');
        Route::get('/roles/create', \App\Livewire\Admin\Roles\CreateRole::class)->name('roles.create')->middleware('permission:create roles');
        Route::get('/roles/{role}/edit', \App\Livewire\Admin\Roles\EditRole::class)->name('roles.edit')->middleware('permission:update roles');
        Route::get('/permissions', \App\Livewire\Admin\Permissions::class)->name('permissions.index')->middleware('permission:view permissions');
        Route::get('/permissions/create', \App\Livewire\Admin\Permissions\CreatePermission::class)->name('permissions.create')->middleware('permission:create permissions');
        Route::get('permissions/{permission}/edit', \App\Livewire\Admin\Permissions\EditPermission::class)->name('permissions.edit')->middleware('permission:update permissions');
    });

    // Scrum video lessons
    Route::get('/scrumvidlessons', [IndexController::class, 'scrumvidlessons']);
});

/*
|--------------------------------------------------------------------------
| Test Routes (Restrict to Admins)
|--------------------------------------------------------------------------
*/

Route::get('/admins-only', function () {
    return 'Only admins should be able to see this page';
})->middleware(['auth', 'can:visitAdminPages']);

/*
|--------------------------------------------------------------------------
| PROTECTED STORAGE ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'permission:protected storage'])->prefix('protected-storage')->group(function () {

    // Main Storage Access Page
    Route::get('/', function () {
        return view('protected-links');
    })->name('storage.home');

    // Storage Dashboard
    Route::get('/dashboard', function () {
        $resources = [
            'agile' => 'Agile',
            'azure' => 'Azure',
            'bigdata' => 'Big Data',
            'booklets' => 'Booklets',
            'books' => 'Books',
            'cobit' => 'COBIT',
            'computing' => 'Computing',
            'devops' => 'DevOps',
            'devopsmedia' => 'DevOps Media',
            'documents' => 'Documents',
            'freezonecourses' => 'FreeZone Courses',
            'headfirst' => 'Head First',
            'helpme' => 'HelpMe',
            'home' => 'Home',
            'itil' => 'ITIL',
            'java' => 'Java',
            'kanban' => 'Kanban',
            'laravel' => 'Laravel',
            'lean' => 'Lean',
            'lrh' => 'LRH',
            'microsoft' => 'Microsoft',
            'mor' => 'MoR',
            'msp' => 'MSP',
            'notil' => 'Not ITIL',
            'oop' => 'OOP',
            'p3o' => 'P3O',
            'php' => 'PHP',
            'Pmi' => 'PMI',
            'prince2' => 'PRINCE2',
            'programming' => 'Programming',
            'python' => 'Python',
            'safe' => 'SAFe',
            'scientology' => 'Scientology',
            'scientologydict' => 'Scientology Dictionary',
            'scrum' => 'Scrum',
            'Scrumban' => 'Scrumban',
            'Scrummanual' => 'Scrum Manual',
            'Scrummedia' => 'Scrum Media',
            'Search' => 'Search',
            'servicenow' => 'ServiceNow',
            'spc' => 'SPC',
            'strategy' => 'Strategy',
            'studentmotivationpdf' => 'Student Motivation PDF',
            'studymanual' => 'Study Manual',
            'studynotes' => 'Study Notes',
            'techdic' => 'Tech Dictionary',
            'technicaldictionary' => 'Technical Dictionary',
        ];

        $status = [];
        foreach ($resources as $key => $name) {
            $hasIndex = Storage::disk('protected')->exists("{$key}/index.html");
            $files = Storage::disk('protected')->allFiles($key);
            $fileCount = count($files);

            $status[] = [
                'name' => $name,
                'key' => $key,
                'has_index' => $hasIndex,
                'file_count' => $fileCount,
                'url' => route('storage.resource', ['resource' => $key]),
                'local_path' => "storage/protected/{$key}/"
            ];
        }

        return view('storage-dashboard', ['resources' => $status]);
    })->name('storage.dashboard');

    // Storage API Endpoints
    Route::prefix('api')->group(function () {
        Route::get('/status', function () {
            $resources = [
                'agile' => 'Agile',
                'azure' => 'Azure',
                'bigdata' => 'Big Data',
                'booklets' => 'Booklets',
                'books' => 'Books',
                'cobit' => 'COBIT',
                'computing' => 'Computing',
                'devops' => 'DevOps',
                'devopsmedia' => 'DevOps Media',
                'documents' => 'Documents',
                'freezonecourses' => 'FreeZone Courses',
                'headfirst' => 'Head First',
                'helpme' => 'HelpMe',
                'home' => 'Home',
                'itil' => 'ITIL',
                'java' => 'Java',
                'kanban' => 'Kanban',
                'laravel' => 'Laravel',
                'lean' => 'Lean',
                'lrh' => 'LRH',
                'microsoft' => 'Microsoft',
                'mor' => 'MoR',
                'msp' => 'MSP',
                'notil' => 'Not ITIL',
                'oop' => 'OOP',
                'p3o' => 'P3O',
                'php' => 'PHP',
                'Pmi' => 'PMI',
                'prince2' => 'PRINCE2',
                'programming' => 'Programming',
                'python' => 'Python',
                'safe' => 'SAFe',
                'scientology' => 'Scientology',
                'scientologydict' => 'Scientology Dictionary',
                'scrum' => 'Scrum',
                'Scrumban' => 'Scrumban',
                'Scrummanual' => 'Scrum Manual',
                'Scrummedia' => 'Scrum Media',
                'Search' => 'Search',
                'servicenow' => 'ServiceNow',
                'spc' => 'SPC',
                'strategy' => 'Strategy',
                'studentmotivationpdf' => 'Student Motivation PDF',
                'studymanual' => 'Study Manual',
                'studynotes' => 'Study Notes',
                'techdic' => 'Tech Dictionary',
                'technicaldictionary' => 'Technical Dictionary',
            ];

            $status = [];
            foreach ($resources as $key => $name) {
                $hasIndex = Storage::disk('protected')->exists("{$key}/index.html");
                $files = Storage::disk('protected')->allFiles($key);
                $fileCount = count($files);

                $totalSize = 0;
                foreach ($files as $file) {
                    $totalSize += Storage::disk('protected')->size($file);
                }

                $status[] = [
                    'key' => $key,
                    'name' => $name,
                    'has_index' => $hasIndex,
                    'file_count' => $fileCount,
                    'total_size' => $totalSize,
                    'url' => route('storage.resource', ['resource' => $key]),
                    'local_path' => "storage/protected/{$key}"
                ];
            }

            return response()->json([
                'success' => true,
                'resources' => $status,
                'timestamp' => now()->toDateTimeString()
            ]);
        })->name('storage.api.status');

        Route::post('/clear-cache/{resource}', function ($resource) {
            $validResources = [
                'agile', 'azure', 'bigdata', 'booklets', 'books', 'cobit', 'computing',
                'devops', 'devopsmedia', 'documents', 'freezonecourses', 'headfirst',
                'helpme', 'home', 'itil', 'java', 'kanban', 'laravel', 'lean', 'lrh',
                'microsoft', 'mor', 'msp', 'notil', 'oop', 'p3o', 'php', 'Pmi',
                'prince2', 'programming', 'python', 'safe', 'scientology',
                'scientologydict', 'scrum', 'Scrumban', 'Scrummanual', 'Scrummedia',
                'Search', 'servicenow', 'spc', 'strategy', 'studentmotivationpdf',
                'studymanual', 'studynotes', 'techdic', 'technicaldictionary'
            ];

            if (!in_array($resource, $validResources)) {
                return response()->json(['success' => false, 'message' => 'Invalid resource'], 400);
            }

            $files = Storage::disk('protected')->allFiles($resource);
            $deletedCount = 0;

            foreach ($files as $file) {
                Storage::disk('protected')->delete($file);
                $deletedCount++;
            }

            return response()->json([
                'success' => true,
                'message' => "Cleared {$deletedCount} files from {$resource}",
                'files_deleted' => $deletedCount
            ]);
        })->name('storage.api.clear-cache');
    });

    // CATCH-ALL STORAGE RESOURCE ROUTE
    Route::get('/{resource}/{path?}', function (Request $request, $resource, $path = '') {
        Log::info("🚀 Accessing: {$resource}/{$path}");

        $cleanPath = trim($path, '/');

        // Build the full file path
        if (empty($cleanPath)) {
            $basePath = $resource;
        } else {
            $basePath = $resource . '/' . $cleanPath;
        }

        // Build possible file paths
        $possiblePaths = [];

        // Check if it's a directory (serve index.html)
        $possiblePaths[] = "{$basePath}/index.html";
        $possiblePaths[] = "{$basePath}/index.htm";

        // Check as direct file
        $possiblePaths[] = $basePath;

        // Check with extensions if no extension present
        if (!str_contains($basePath, '.')) {
            $possiblePaths[] = "{$basePath}.html";
            $possiblePaths[] = "{$basePath}.htm";
        }

        Log::info("🔍 Checking paths: " . json_encode($possiblePaths));

        foreach ($possiblePaths as $filePath) {
            if (Storage::disk('protected')->exists($filePath)) {
                Log::info("✅ Found file: {$filePath}");

                $fullPath = Storage::disk('protected')->path($filePath);
                $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                $mimeTypes = [
                    'html' => 'text/html',
                    'htm' => 'text/html',
                    'css' => 'text/css',
                    'js' => 'application/javascript',
                    'jpg' => 'image/jpeg',
                    'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                    'svg' => 'image/svg+xml',
                    'webp' => 'image/webp',
                    'ico' => 'image/x-icon',
                    'pdf' => 'application/pdf',
                    'txt' => 'text/plain',
                    'zip' => 'application/zip',
                    'rar' => 'application/x-rar-compressed',
                    '7z' => 'application/x-7z-compressed',
                    'mp3' => 'audio/mpeg',
                    'wav' => 'audio/wav',
                    'ogg' => 'audio/ogg',
                    'mp4' => 'video/mp4',
                    'webm' => 'video/webm',
                    'avi' => 'video/x-msvideo',
                ];

                $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';

                // Only force download for archives and executables
                $downloadExtensions = ['zip', 'rar', '7z', 'exe', 'dmg'];
                $disposition = in_array($extension, $downloadExtensions) ? 'attachment' : 'inline';

                // For HTML files, inject base tag to fix relative links
                if (in_array($extension, ['html', 'htm'])) {
                    $content = file_get_contents($fullPath);

                    $baseUrl = url('/protected-storage/' . dirname($filePath));
                    if (dirname($filePath) === '.') {
                        $baseUrl = url('/protected-storage/' . $resource);
                    }

                    $baseTag = '<base href="' . $baseUrl . '/">';
                    $content = preg_replace('/(<head[^>]*>)/i', '$1' . $baseTag, $content);

                    return response($content, 200)
                        ->header('Content-Type', $mimeType)
                        ->header('Content-Disposition', $disposition);
                }

                // For audio/video files, add range support
                if (in_array($extension, ['mp3', 'mp4', 'wav', 'ogg', 'webm', 'avi'])) {
                    return response()->file($fullPath, [
                        'Content-Type' => $mimeType,
                        'Content-Disposition' => 'inline',
                        'Accept-Ranges' => 'bytes',
                    ]);
                }

                // All other files
                return response()->file($fullPath, [
                    'Content-Type' => $mimeType,
                    'Content-Disposition' => $disposition,
                ]);
            }
        }

        // Not found
        Log::error("❌ File not found. Checked: " . json_encode($possiblePaths));
        return response("File not found: {$basePath}<br><br>Checked:<br>" . implode('<br>', $possiblePaths), 404);

    })->where('path', '.*')->name('storage.resource');
});

/*
|--------------------------------------------------------------------------
| Storage Protected Folders (Basic Auth + Super Admin)
|--------------------------------------------------------------------------
| IMPORTANT: These routes must come AFTER all other routes but BEFORE catch-alls
*/

Route::get('/test-auth-simple', function () {
    return 'Should prompt for password';
})->middleware('basicauth');

Route::prefix('scientology')->middleware(['basicauth', 'auth', 'role:Super Admin'])->group(function () {
    Route::get('{path?}', function ($path = '') {
        \Log::info("🌐 Route accessed: /scientology/{$path}");
        return ProtectedFiles::serveFile('scientology', $path);
    })->where('path', '.*');
});

// Add more protected folders as needed:
// Route::prefix('client-area')->middleware(['basicauth', 'auth', 'role:Super Admin'])->group(function () {
//     Route::get('{path?}', function ($path = '') {
//         return ProtectedFiles::serveFile('client-area', $path);
//     })->where('path', '.*');
// });


/*
|--------------------------------------------------------------------------
| Protected Storage Files Routes NB update folder in the module
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Protected Storage Files Routes
|--------------------------------------------------------------------------
*/

// FILE ROUTES
Route::get('/protected-storage-files', [ProtectedStorageFilesController::class, 'index'])->name('protectedstorage.index');
Route::post('/protected-storage-files/upload', [ProtectedStorageFilesController::class, 'upload'])->name('protectedstorage.upload');
Route::get('/protected-storage-files/{id}/view', [ProtectedStorageFilesController::class, 'view'])->name('protectedstorage.view');
Route::get('/protected-storage-files/{id}/stream', [ProtectedStorageFilesController::class, 'stream'])->name('protectedstorage.stream');
Route::get('/protected-storage-files/{id}/download', [ProtectedStorageFilesController::class, 'download'])->name('protectedstorage.download');
Route::get('/protected-storage-files/{id}/edit', [ProtectedStorageFilesController::class, 'edit'])->name('protectedstorage.edit');
Route::put('/protected-storage-files/{id}', [ProtectedStorageFilesController::class, 'update'])->name('protectedstorage.update');
Route::delete('/protected-storage-files/{id}', [ProtectedStorageFilesController::class, 'destroy'])->name('protectedstorage.destroy');

// FOLDER ROUTES
Route::prefix('protected-storage-folders')->name('protectedstorage.folders.')->group(function () {
    Route::get('/', [ProtectedStorageFolderController::class, 'index'])->name('index');
    Route::post('/', [ProtectedStorageFolderController::class, 'store'])->name('store');
    Route::get('/{id}', [ProtectedStorageFolderController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [ProtectedStorageFolderController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ProtectedStorageFolderController::class, 'update'])->name('update');
    Route::delete('/{id}', [ProtectedStorageFolderController::class, 'destroy'])->name('destroy');
    Route::post('/{id}/scan', [ProtectedStorageFolderController::class, 'scan'])->name('scan');
});

/*
|--------------------------------------------------------------------------
| Guitar Practice Media Routes NB update folder in the module
|--------------------------------------------------------------------------
*/

// EXISTING FILE ROUTES (already working)
Route::get('/guitar-scores', [GuitarScoreController::class, 'index'])->name('guitar.index');
Route::post('/guitar-scores/upload', [GuitarScoreController::class, 'upload'])->name('guitar.upload');
Route::get('/guitar-scores/{id}/view', [GuitarScoreController::class, 'view'])->name('guitar.view');
Route::get('/guitar-scores/{id}/stream', [GuitarScoreController::class, 'stream'])->name('guitar.stream');
Route::get('/guitar-scores/{id}/download', [GuitarScoreController::class, 'download'])->name('guitar.download');
Route::get('/guitar-scores/{id}/edit', [GuitarScoreController::class, 'edit'])->name('guitar.edit');
Route::put('/guitar-scores/{id}', [GuitarScoreController::class, 'update'])->name('guitar.update');
Route::delete('/guitar-scores/{id}', [GuitarScoreController::class, 'destroy'])->name('guitar.destroy');

// NEW FOLDER ROUTES
Route::prefix('guitar-folders')->name('guitar.folders.')->group(function () {
    Route::get('/', [GuitarFolderController::class, 'index'])->name('index');
    Route::post('/', [GuitarFolderController::class, 'store'])->name('store');
    Route::get('/{id}', [GuitarFolderController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [GuitarFolderController::class, 'edit'])->name('edit');
    Route::put('/{id}', [GuitarFolderController::class, 'update'])->name('update');
    Route::delete('/{id}', [GuitarFolderController::class, 'destroy'])->name('destroy');
    // Add the scan route INSIDE the prefix group
    Route::post('/{id}/scan', [GuitarFolderController::class, 'scan'])->name('scan');
});

/*
|--------------------------------------------------------------------------
| Dynamic Page Loader (Keep Last) - Protected
|--------------------------------------------------------------------------
| IMPORTANT: This should be the LAST route in the file
*/

Route::middleware(['auth'])->group(function () {
    Route::get('home/{page}', [IndexController::class, 'homePage'])->where('page', '.*');
});

	require __DIR__.'/modules/documents.php';

require __DIR__.'/auth.php';