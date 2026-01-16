<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reverb Config Test</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            border-bottom: 3px solid #4CAF50;
            padding-bottom: 10px;
        }
        .status {
            font-size: 24px;
            font-weight: bold;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            text-align: center;
        }
        .status.working {
            background: #d4edda;
            color: #155724;
            border: 2px solid #c3e6cb;
        }
        .status.error {
            background: #f8d7da;
            color: #721c24;
            border: 2px solid #f5c6cb;
        }
        .section {
            margin: 30px 0;
        }
        .section h2 {
            color: #555;
            border-bottom: 2px solid #ddd;
            padding-bottom: 8px;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #f8f9fa;
            font-weight: 600;
            color: #333;
        }
        tr:hover {
            background: #f8f9fa;
        }
        .null-value {
            color: #dc3545;
            font-weight: bold;
        }
        .good-value {
            color: #28a745;
        }
        .warning {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin: 20px 0;
        }
        .info {
            background: #d1ecf1;
            border-left: 4px solid #17a2b8;
            padding: 15px;
            margin: 20px 0;
        }
        code {
            background: #f4f4f4;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 5px;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔍 Reverb Configuration Test (Web Context)</h1>
        
        <div class="status {{ $statusColor === 'green' ? 'working' : 'error' }}">
            {{ $status }}
        </div>

        @if($statusColor === 'red')
        <div class="warning">
            <strong>⚠️ Problem Detected!</strong>
            <p>Your web server is reading different configuration than your CLI.</p>
            <p><strong>Solution:</strong></p>
            <ol>
                <li>Run: <code>php artisan config:clear</code></li>
                <li>Restart Apache/XAMPP</li>
                <li>Refresh this page</li>
            </ol>
        </div>
        @else
        <div class="info">
            <strong>✅ Configuration is correct!</strong>
            <p>If you're still having issues with chat, check:</p>
            <ul>
                <li>Is Reverb server running? <code>pm2 status</code></li>
                <li>Check logs: <code>pm2 logs laravel-reverb</code></li>
                <li>Browser console for JavaScript errors</li>
            </ul>
        </div>
        @endif

        <!-- Environment Variables -->
        <div class="section">
            <h2>📋 Environment Variables (.env file)</h2>
            <table>
                <thead>
                    <tr>
                        <th>Variable</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($envValues as $key => $value)
                    <tr>
                        <td><strong>{{ $key }}</strong></td>
                        <td class="{{ $value === 'NULL' ? 'null-value' : 'good-value' }}">
                            {{ $value ?? 'NULL' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Config Values -->
        <div class="section">
            <h2>⚙️ Laravel Config Cache</h2>
            <table>
                <thead>
                    <tr>
                        <th>Config Key</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($configValues as $key => $value)
                    <tr>
                        <td><strong>{{ $key }}</strong></td>
                        <td class="{{ $value === 'NULL' ? 'null-value' : 'good-value' }}">
                            {{ $value ?? 'NULL' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Cache Status -->
        <div class="section">
            <h2>💾 Cache File Status</h2>
            <table>
                <thead>
                    <tr>
                        <th>Cache File</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cacheFiles as $name => $status)
                    <tr>
                        <td><strong>{{ $name }}</strong></td>
                        <td class="{{ str_contains($status, '✓') ? 'good-value' : 'null-value' }}">
                            {{ $status }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p style="margin-top: 15px; color: #666;">
                <strong>Note:</strong> On development, cache files should NOT exist (✓ is good).
            </p>
        </div>

        <!-- Quick Actions -->
        <div class="section">
            <h2>🔧 Quick Actions</h2>
            <a href="/chat" class="btn">Go to Chat</a>
            <a href="javascript:location.reload()" class="btn">Refresh Test</a>
            <a href="/" class="btn">Back to Home</a>
        </div>

        <!-- CLI Comparison -->
        <div class="info">
            <strong>💡 Compare with CLI:</strong>
            <p>Run this in terminal to see CLI values:</p>
            <code>php artisan reverb:diagnostic</code>
            <p style="margin-top: 10px;">Values shown on this page should match the CLI output.</p>
        </div>
    </div>
</body>
</html>
