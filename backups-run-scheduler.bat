@echo off
cd /d C:\xampp\htdocs\pmway.hopto.org
php artisan schedule:run >> storage\logs\scheduler.log 2>&1