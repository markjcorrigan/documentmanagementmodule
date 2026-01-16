{{-- resources/views/logs/export-pdf.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $log->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            border-bottom: 3px solid #3B82F6;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        h1 {
            color: #3B82F6;
            margin: 0 0 10px 0;
        }
        .meta {
            color: #666;
            font-size: 14px;
            margin-bottom: 5px;
        }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
            margin-right: 5px;
            margin-bottom: 5px;
        }
        .category-badge {
            background-color: {{ $log->category->color ?? '#6c757d' }};
            color: white;
        }
        .tag-badge {
            background-color: #6c757d;
            color: white;
        }
        .pinned-badge {
            background-color: #fbbf24;
            color: #78350f;
        }
        .content {
            margin-top: 30px;
            white-space: pre-wrap;
        }
        .footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 12px;
            color: #999;
        }
        .attachments {
            margin-top: 30px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        .attachments h3 {
            margin-top: 0;
            color: #495057;
        }
        .attachment-item {
            padding: 8px 0;
            border-bottom: 1px solid #dee2e6;
        }
        .attachment-item:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>{{ $log->title }}</h1>

    <div class="meta">
        @if($log->is_pinned)
            <span class="badge pinned-badge">📌 Pinned</span>
        @endif

        @if($log->category)
            <span class="badge category-badge">{{ $log->category->name }}</span>
        @endif

        @foreach($log->tags as $tag)
            <span class="badge tag-badge">{{ $tag->name }}</span>
        @endforeach
    </div>

    <div class="meta">
        <strong>Author:</strong> {{ $log->user->name }}
    </div>

    <div class="meta">
        <strong>Created:</strong> {{ $log->created_at->format('F j, Y \a\t g:i A') }}
    </div>

    @if($log->updated_at != $log->created_at)
        <div class="meta">
            <strong>Last Updated:</strong> {{ $log->updated_at->format('F j, Y \a\t g:i A') }}
        </div>
    @endif
</div>

<div class="content">
    {!! nl2br(e($log->content)) !!}
</div>

@if($log->attachments->count() > 0)
    <div class="attachments">
        <h3>Attachments ({{ $log->attachments->count() }})</h3>
        @foreach($log->attachments as $attachment)
            <div class="attachment-item">
                <strong>{{ $attachment->filename }}</strong>
                <span style="color: #6c757d; font-size: 12px;">
                    ({{ $attachment->formatted_size }} - {{ $attachment->mime_type }})
                </span>
            </div>
        @endforeach
    </div>
@endif

<div class="footer">
    <p>Generated on {{ now()->format('F j, Y \a\t g:i A') }}</p>
    <p>This document was exported from your Logs application</p>
</div>
</body>
</html>