<!DOCTYPE html>
<html>
<head>
    <title>Protected Storage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            max-width: 800px;
            margin: 0 auto;
            background: #f5f5f5;
        }
        .header {
            background: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .nav-links {
            margin-top: 20px;
        }
        .nav-links a {
            display: inline-block;
            margin-right: 15px;
            padding: 8px 16px;
            background: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .link-list a {
            display: block;
            padding: 20px;
            margin-bottom: 15px;
            font-size: 18px;
            text-decoration: none;
            color: white;
            background: linear-gradient(135deg, #2a4dff, #6c8eff);
            border-radius: 8px;
            transition: all 0.3s;
            text-align: center;
            box-shadow: 0 3px 6px rgba(42, 77, 255, 0.2);
            border: none;
        }
        .link-list a:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(42, 77, 255, 0.3);
            background: linear-gradient(135deg, #1a3dcc, #5c7eff);
        }
        .dashboard-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>🔒 Protected Storage</h1>
    <p><strong>New URL Structure:</strong> All storage resources are now under <code>/storage/</code> prefix.</p>
    <p>Example: <code>https://yourdomain.com/storage/scientology/</code></p>

    <div class="nav-links">
        <a href="{{ route('storage.dashboard') }}">📊 Storage Dashboard</a>
        <a href="/">← Back to Main Site</a>
    </div>
</div>

<div class="link-list">
    <a href="{{ route('storage.resource', ['resource' => 'scientology']) }}" target="_blank">
        📚 Scientology
    </a>

    <a href="{{ route('storage.resource', ['resource' => 'freezonecourses']) }}" target="_blank">
        🎓 FreeZone Courses
    </a>

    <a href="{{ route('storage.resource', ['resource' => 'helpme']) }}" target="_blank">
        ❓ HelpMe
    </a>

    <a href="{{ route('storage.resource', ['resource' => 'lrh']) }}" target="_blank">
        📖 LRH
    </a>

    <a href="{{ route('storage.resource', ['resource' => 'studentmotivationpdf']) }}" target="_blank">
        💪 Student Motivation PDF
    </a>

    <a href="{{ route('storage.resource', ['resource' => 'studymanual']) }}" target="_blank">
        📘 Study Manual
    </a>

    <a href="{{ route('storage.resource', ['resource' => 'techdict']) }}" target="_blank">
        🔧 Tech Dictionary
    </a>

    <a href="{{ route('storage.resource', ['resource' => 'scientologydict']) }}" target="_blank">
        📕 Scientology Dictionary
    </a>

    <a href="{{ route('storage.resource', ['resource' => 'technicaldictionary']) }}" target="_blank">
        📗 Technical Dictionary
    </a>

    <a href="{{ route('storage.resource', ['resource' => 'scrum']) }}" target="_blank">
        📗 Scrum
    </a>
</div>

</body>
</html>