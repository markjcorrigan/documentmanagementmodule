@echo off
title Start Reverb
set PM2_PATH=C:\Users\Administrator\AppData\Roaming\npm\pm2.cmd

cd /d C:\xampp\htdocs\pmway.hopto.org
echo Starting Laravel Reverb...
echo.
call "%PM2_PATH%" start ecosystem.config.cjs
call "%PM2_PATH%" save
echo.
echo ================================
call "%PM2_PATH%" status
echo ================================
echo.
echo Press any key to close...
pause