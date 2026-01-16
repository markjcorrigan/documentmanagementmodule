<?php
/**
 * Laravel Session & CSRF Diagnostic Script
 * 
 * Add this route to your routes/web.php temporarily:
 * Route::get('/diagnose-session', function() { return view('diagnose-session'); });
 * 
 * Then create this file as: resources/views/diagnose-session.blade.php
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Session & CSRF Diagnostics</title>
    <style>
        body { font-family: monospace; padding: 20px; background: #1e1e1e; color: #d4d4d4; }
        .section { background: #252526; padding: 15px; margin: 10px 0; border-radius: 5px; border-left: 4px solid #007acc; }
        .pass { color: #4ec9b0; }
        .fail { color: #f48771; }
        .warning { color: #dcdcaa; }
        h2 { color: #569cd6; margin-top: 0; }
        pre { background: #1e1e1e; padding: 10px; overflow-x: auto; }
        .status { font-weight: bold; font-size: 1.2em; }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 8px; border-bottom: 1px solid #3e3e42; }
        td:first-child { color: #9cdcfe; width: 40%; }
    </style>
</head>
<body>
    <h1>🔍 Laravel Session & CSRF Diagnostics</h1>

    <?php
    // Test 1: Session Configuration
    $sessionDriver = config('session.driver');
    $sessionLifetime = config('session.lifetime');
    $sessionDomain = config('session.domain');
    $sessionPath = config('session.path');
    $sessionSecure = config('session.secure');
    $sessionHttpOnly = config('session.http_only');
    $sessionSameSite = config('session.same_site');
    ?>

    <div class="section">
        <h2>1️⃣ Session Configuration</h2>
        <table>
            <tr>
                <td>Driver:</td>
                <td class="<?= $sessionDriver === 'file' ? 'pass' : 'warning' ?>"><?= $sessionDriver ?></td>
            </tr>
            <tr>
                <td>Lifetime:</td>
                <td><?= $sessionLifetime ?> minutes</td>
            </tr>
            <tr>
                <td>Domain:</td>
                <td class="<?= $sessionDomain === null ? 'pass' : 'fail' ?>"><?= $sessionDomain === null ? 'null (✓ CORRECT)' : $sessionDomain . ' (❌ Should be null for local)' ?></td>
            </tr>
            <tr>
                <td>Path:</td>
                <td><?= $sessionPath ?></td>
            </tr>
            <tr>
                <td>Secure Cookie:</td>
                <td class="<?= $sessionSecure === false ? 'pass' : 'fail' ?>"><?= $sessionSecure ? 'true (❌ Should be false for http)' : 'false (✓ CORRECT)' ?></td>
            </tr>
            <tr>
                <td>HTTP Only:</td>
                <td class="<?= $sessionHttpOnly === true ? 'pass' : 'warning' ?>"><?= $sessionHttpOnly ? 'true (✓)' : 'false' ?></td>
            </tr>
            <tr>
                <td>Same Site:</td>
                <td><?= $sessionSameSite ?></td>
            </tr>
        </table>
    </div>

    <?php
    // Test 2: Session Storage
    $sessionFilesPath = storage_path('framework/sessions');
    $sessionFilesExist = is_dir($sessionFilesPath);
    $sessionFilesWritable = is_writable($sessionFilesPath);
    $sessionFileCount = $sessionFilesExist ? count(glob($sessionFilesPath . '/*')) : 0;
    ?>

    <div class="section">
        <h2>2️⃣ Session Storage</h2>
        <table>
            <tr>
                <td>Storage Path:</td>
                <td><?= $sessionFilesPath ?></td>
            </tr>
            <tr>
                <td>Directory Exists:</td>
                <td class="<?= $sessionFilesExist ? 'pass' : 'fail' ?>"><?= $sessionFilesExist ? '✓ YES' : '❌ NO' ?></td>
            </tr>
            <tr>
                <td>Writable:</td>
                <td class="<?= $sessionFilesWritable ? 'pass' : 'fail' ?>"><?= $sessionFilesWritable ? '✓ YES' : '❌ NO - Run: chmod -R 775 storage' ?></td>
            </tr>
            <tr>
                <td>Session Files:</td>
                <td><?= $sessionFileCount ?> files</td>
            </tr>
        </table>
    </div>

    <?php
    // Test 3: Current Session
    session(['diagnostic_test' => 'working_' . time()]);
    $sessionId = session()->getId();
    $sessionData = session('diagnostic_test');
    $sessionWorks = $sessionData !== null;
    ?>

    <div class="section">
        <h2>3️⃣ Session Functionality</h2>
        <table>
            <tr>
                <td>Session ID:</td>
                <td><?= $sessionId ?: 'NONE' ?></td>
            </tr>
            <tr>
                <td>Test Write/Read:</td>
                <td class="<?= $sessionWorks ? 'pass' : 'fail' ?>"><?= $sessionWorks ? '✓ WORKING' : '❌ FAILED' ?></td>
            </tr>
            <tr>
                <td>Test Value:</td>
                <td><?= $sessionData ?: 'NULL' ?></td>
            </tr>
        </table>
    </div>

    <?php
    // Test 4: CSRF Token
    $csrfToken = csrf_token();
    $csrfTokenLength = strlen($csrfToken);
    ?>

    <div class="section">
        <h2>4️⃣ CSRF Token</h2>
        <table>
            <tr>
                <td>Token Generated:</td>
                <td class="<?= !empty($csrfToken) ? 'pass' : 'fail' ?>"><?= !empty($csrfToken) ? '✓ YES' : '❌ NO' ?></td>
            </tr>
            <tr>
                <td>Token Length:</td>
                <td class="<?= $csrfTokenLength === 40 ? 'pass' : 'warning' ?>"><?= $csrfTokenLength ?> chars</td>
            </tr>
            <tr>
                <td>Token Value:</td>
                <td><code><?= substr($csrfToken, 0, 20) ?>...</code></td>
            </tr>
        </table>
    </div>

    <?php
    // Test 5: Environment Variables
    $appUrl = env('APP_URL');
    $appEnv = env('APP_ENV');
    $appDebug = env('APP_DEBUG');
    ?>

    <div class="section">
        <h2>5️⃣ Environment</h2>
        <table>
            <tr>
                <td>APP_URL:</td>
                <td class="<?= $appUrl === 'http://pmway.local' ? 'pass' : 'warning' ?>"><?= $appUrl ?></td>
            </tr>
            <tr>
                <td>APP_ENV:</td>
                <td><?= $appEnv ?></td>
            </tr>
            <tr>
                <td>APP_DEBUG:</td>
                <td><?= $appDebug ? 'true' : 'false' ?></td>
            </tr>
            <tr>
                <td>Current URL:</td>
                <td><?= request()->url() ?></td>
            </tr>
            <tr>
                <td>Current Domain:</td>
                <td><?= request()->getHost() ?></td>
            </tr>
        </table>
    </div>

    <?php
    // Test 6: Middleware Check
    $webMiddleware = config('app.middleware.web', []);
    ?>

    <div class="section">
        <h2>6️⃣ Browser Cookie Test</h2>
        <p>Check your browser's Developer Tools:</p>
        <pre>1. Open DevTools (F12)
2. Go to: Application → Cookies → <?= request()->getSchemeAndHttpHost() ?>

3. Look for cookie named: <span class="pass"><?= config('session.cookie') ?></span>

4. Verify these settings:
   - Domain: <?= request()->getHost() ?>

   - Path: /
   - HttpOnly: ✓ (checked)
   - Secure: (empty for HTTP)
   - SameSite: Lax</pre>
    </div>

    <div class="section">
        <h2>7️⃣ Test CSRF Form Submission</h2>
        <p>This form will test if CSRF tokens work:</p>
        <form method="POST" action="/diagnose-session-post" style="margin-top: 10px;">
            @csrf
            <input type="hidden" name="test" value="csrf_test">
            <button type="submit" style="background: #007acc; color: white; padding: 10px 20px; border: none; border-radius: 3px; cursor: pointer; font-size: 14px;">
                Test CSRF Protection
            </button>
        </form>
        <p style="margin-top: 10px; color: #dcdcaa;">Note: Add this route first:</p>
        <pre>Route::post('/diagnose-session-post', function() {
    return 'CSRF token is working! ✓';
});</pre>
    </div>

    <?php
    // Overall Status
    $allGood = $sessionWorks && !empty($csrfToken) && $sessionFilesWritable && $sessionDomain === null;
    ?>

    <div class="section">
        <h2>📊 Overall Status</h2>
        <p class="status <?= $allGood ? 'pass' : 'fail' ?>">
            <?= $allGood ? '✓ Everything looks good!' : '❌ Issues detected' ?>
        </p>
        
        <?php if (!$allGood): ?>
        <h3 style="color: #f48771;">Action Items:</h3>
        <ul>
            <?php if (!$sessionWorks): ?>
            <li>Session is not working - check storage permissions</li>
            <?php endif; ?>
            
            <?php if (empty($csrfToken)): ?>
            <li>CSRF token not generated - session might not be initialized</li>
            <?php endif; ?>
            
            <?php if (!$sessionFilesWritable): ?>
            <li>Run: <code>chmod -R 775 storage && chown -R www-data:www-data storage</code></li>
            <?php endif; ?>
            
            <?php if ($sessionDomain !== null): ?>
            <li>Fix session.php: Set 'domain' => null</li>
            <?php endif; ?>
        </ul>
        <?php endif; ?>
    </div>

    <div class="section">
        <h2>🔧 Next Steps</h2>
        <pre>1. Fix any issues shown above

2. Clear all caches:
   php artisan config:clear
   php artisan cache:clear
   php artisan view:clear
   rm -rf storage/framework/sessions/*

3. Clear browser:
   - Open Incognito window
   - Or clear cookies for pmway.local

4. Test login form:
   - Go to <?= url('/login') ?>

   - Check DevTools → Network → POST request
   - Verify _token is sent in Form Data

5. If still failing, check:
   tail -50 storage/logs/laravel.log</pre>
    </div>

</body>
</html>
