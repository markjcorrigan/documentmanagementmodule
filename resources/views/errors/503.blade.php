<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>We'll Be Right Back</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .container {
            text-align: center;
            padding: 2rem;
            max-width: 600px;
        }

        .icon {
            font-size: 80px;
            margin-bottom: 1rem;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-20px);
            }
            60% {
                transform: translateY(-10px);
            }
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .emoji {
            font-size: 1.5rem;
        }

        .dots {
            display: inline-block;
            animation: dots 1.5s infinite;
        }

        @keyframes dots {
            0%, 20% { content: '.'; }
            40% { content: '..'; }
            60%, 100% { content: '...'; }
        }

        .loading {
            margin-top: 2rem;
        }

        .loading-bar {
            width: 200px;
            height: 4px;
            background: rgba(255,255,255,0.3);
            border-radius: 2px;
            margin: 1rem auto;
            overflow: hidden;
        }

        .loading-bar::before {
            content: '';
            display: block;
            height: 100%;
            background: #fff;
            animation: loading 2s ease-in-out infinite;
        }

        @keyframes loading {
            0% { width: 0%; }
            50% { width: 100%; }
            100% { width: 0%; }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="icon">🛠️</div>
    <h1>We'll Be Right Back!</h1>
    <p>We're currently performing some maintenance.</p>
    <p class="emoji">Thanks for your patience! ✨</p>

    <div class="loading">
        <div class="loading-bar"></div>
        <p style="font-size: 0.9rem; opacity: 0.7;">Working on it<span class="dots">...</span></p>
    </div>
</div>
</body>
</html>
