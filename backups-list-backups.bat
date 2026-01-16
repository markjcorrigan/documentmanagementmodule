@echo off
cd /d C:\xampp\htdocs\pmway.hopto.org
php artisan db:list-backups
pause