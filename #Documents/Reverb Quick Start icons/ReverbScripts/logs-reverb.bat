@echo off
title Reverb Logs
set PM2_PATH=C:\Users\Administrator\AppData\Roaming\npm\pm2.cmd

echo Showing live logs... Press Ctrl+C to exit
echo.
call "%PM2_PATH%" logs laravel-reverb
pause