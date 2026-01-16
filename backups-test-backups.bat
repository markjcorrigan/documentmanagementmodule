@echo off
echo ============================================
echo Testing Backup System
echo ============================================
echo.

cd /d C:\xampp\htdocs\pmway.hopto.org

echo [1/3] Testing daily backup...
php artisan db:backup --type=daily
echo.

echo [2/3] Testing weekly backup...
php artisan db:backup --type=weekly
echo.

echo [3/3] Testing monthly backup...
php artisan db:backup --type=monthly
echo.

echo ============================================
echo Backup files created:
echo ============================================
echo.

echo DAILY BACKUPS:
dir storage\app\backups\daily\*.sql /B /O-D 2>nul
echo.

echo WEEKLY BACKUPS:
dir storage\app\backups\weekly\*.sql /B /O-D 2>nul
echo.

echo MONTHLY BACKUPS:
dir storage\app\backups\monthly\*.sql /B /O-D 2>nul
echo.

echo ============================================
echo Test complete! Check files above.
echo ============================================
pause