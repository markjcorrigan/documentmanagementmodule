<?php
// Add this at the VERY TOP of the file
$resources = $resources ?? [];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Storage Dashboard</title>

    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f5f5f5; }
        .container { max-width: 1200px; margin: 0 auto; }
        .header {
            background: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .nav-links { margin-top: 20px; }
        .nav-links a {
            display: inline-block;
            margin-right: 15px;
            padding: 8px 16px;
            background: #2a4dff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .resource-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
        }
        .resource-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .resource-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .resource-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        .resource-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .resource-status {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }
        .status-online { background: #28a745; }
        .status-offline { background: #dc3545; }
        .resource-meta {
            color: #666;
            font-size: 14px;
            margin: 10px 0;
        }
        .resource-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        .btn {
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }
        .btn-primary {
            background: #2a4dff;
            color: white;
        }
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        .btn-success {
            background: #28a745;
            color: white;
        }
        .btn-danger {
            background: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>📊 Storage Dashboard</h1>
        <p>Monitor and manage your protected storage resources.</p>
        <div class="nav-links">
            <a href="{{ route('storage.home') }}">← Back to Storage Home</a>
            <a href="/">← Back to Main Site</a>
        </div>
    </div>

    <div class="resource-grid">
        @foreach($resources as $resource)
            <div class="resource-card">
                <div class="resource-header">
                    <div class="resource-title">{{ $resource['name'] }}</div>
                    <div class="resource-status">
                        <span class="status-dot {{ $resource['has_index'] ? 'status-online' : 'status-offline' }}"></span>
                        <small>{{ $resource['has_index'] ? 'Online' : 'Offline' }}</small>
                    </div>
                </div>

                <div class="resource-meta">
                    <div><strong>📁 Files:</strong> {{ $resource['file_count'] }}</div>
                    <div><strong>📝 Path:</strong> {{ $resource['local_path'] }}</div>
                    <div><strong>🔗 URL:</strong> <code>{{ $resource['url'] }}</code></div>
                </div>

                <div class="resource-actions">
                    <a href="{{ $resource['url'] }}" class="btn btn-primary" target="_blank">Open</a>
                    <a href="{{ $resource['url'] }}?refresh=true" class="btn btn-secondary" target="_blank">Refresh</a>
                    <button onclick="clearCache('{{ $resource['key'] }}')" class="btn btn-danger">Clear Cache</button>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function clearCache(resource) {
        if (!confirm(`Clear cache for ${resource}? This will remove all locally cached files.`)) return;

        fetch('{{ route("storage.api.clear-cache", ["resource" => "__RESOURCE__"]) }}'.replace('__RESOURCE__', resource), {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(`Cache cleared: ${data.message}`);
                    location.reload();
                } else {
                    alert('Failed to clear cache');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error clearing cache');
            });
    }
</script>
</body>
</html>