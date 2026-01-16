@echo off
title Restart Reverb
set PM2_PATH=C:\Users\Administrator\AppData\Roaming\npm\pm2.cmd

echo Restarting Laravel Reverb...
echo.
call "%PM2_PATH%" restart laravel-reverb
call "%PM2_PATH%" save
echo.
echo ================================
call "%PM2_PATH%" status
echo ================================
echo.
echo Press any key to close...
pause