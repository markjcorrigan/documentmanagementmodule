<?php

#!/bin/bash
echo "🧹 NUCLEAR CACHE CLEAR - This will clear EVERYTHING"

# 1. Laravel caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan event:clear

# 2. Delete cached files manually
rm -f bootstrap/cache/*.php
rm -rf storage/framework/cache/data/*
rm -rf storage/framework/views/*

# 3. Clear compiled classes
php artisan clear-compiled

# 4. Rebuild autoloader
composer dump-autoload

# 5. Clear OPcache (if installed)
php -r "if (function_exists('opcache_reset')) opcache_reset();"

echo "✅ All Laravel caches cleared!"
echo "⚠️  NOW YOU MUST:"
echo "1. Restart Apache in XAMPP Control Panel"
echo "2. Run: pm2 restart laravel-reverb"
echo "3. Hard refresh browser (Ctrl+Shift+R)"
echo "4. Run: npm run build (if you changed JS files)"
