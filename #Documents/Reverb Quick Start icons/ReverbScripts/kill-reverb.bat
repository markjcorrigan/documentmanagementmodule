@echo off
title Kill Reverb
set PM2_PATH=C:\Users\Administrator\AppData\Roaming\npm\pm2.cmd

echo Removing Reverb from PM2...
echo.
call "%PM2_PATH%" delete laravel-reverb
call "%PM2_PATH%" save
echo.
echo ================================
call "%PM2_PATH%" status
echo ================================
echo.
echo Press any key to close...
pause