@echo off
echo ========================================
echo DOCUMENTS MODULE - Folder Setup
echo ========================================
echo.

echo Creating Backend Folders...
mkdir app\Http\Controllers\Documents 2>nul
mkdir app\Http\Requests\Documents 2>nul
mkdir app\Livewire\Documents 2>nul

echo Creating Frontend Folders...
mkdir resources\views\documents 2>nul
mkdir resources\views\livewire\documents 2>nul

echo Creating Routes Folder...
mkdir routes\modules 2>nul

echo Creating Storage Folder...
mkdir storage\app\public\assets 2>nul

echo.
echo ========================================
echo Folder Structure Created Successfully!
echo ========================================
echo.
echo Next Steps:
echo 1. Copy all backend files to their destinations
echo 2. Copy all frontend files to their destinations
echo 3. Copy routes file
echo 4. Update web.php with require statement
echo 5. Run: php artisan migrate
echo 6. Run: php artisan optimize:clear
echo.
pause
