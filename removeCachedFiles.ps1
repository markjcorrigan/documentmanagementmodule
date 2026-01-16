# 1. Navigate to your project
cd C:\xampp\htdocs\pmway.hopto.org

# 2. Run the clear commands manually:
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan event:clear
php artisan clear-compiled

# Clear Spatie Response Cache
php artisan responsecache:clear

# Clear Livewire cache
php artisan livewire:discover
php artisan livewire:clear-state

# Remove all cached files
Remove-Item -Force -Path "bootstrap\cache\*" -ErrorAction SilentlyContinue
Remove-Item -Force -Path "storage\framework\cache\*" -ErrorAction SilentlyContinue
Remove-Item -Force -Path "storage\framework\views\*" -ErrorAction SilentlyContinue
Remove-Item -Force -Path "storage\framework\sessions\*" -ErrorAction SilentlyContinue

# Clear Composer cache
composer dump-autoload -o

Write-Host "✅ All caches cleared successfully!" -ForegroundColor Green