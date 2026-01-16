@echo off
title Stop Reverb
set PM2_PATH=C:\Users\Administrator\AppData\Roaming\npm\pm2.cmd

echo Stopping Laravel Reverb...
echo.
call "%PM2_PATH%" stop laravel-reverb
echo.
echo ================================
call "%PM2_PATH%" status
echo ================================
echo.
echo Press any key to close...
pause