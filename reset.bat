@echo off
echo Clearing all Laravel caches...
php artisan optimize:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear
php artisan event:clear
php artisan clear-compiled
echo Done! All caches cleared.
