@echo off
title Reverb Status
set PM2_PATH=C:\Users\Administrator\AppData\Roaming\npm\pm2.cmd

echo ================================
call "%PM2_PATH%" status
echo ================================
echo.
echo Press any key to close...
pause