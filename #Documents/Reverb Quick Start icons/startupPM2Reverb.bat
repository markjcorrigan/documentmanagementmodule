@echo off
cd C:\xampp\htdocs\pmway.hopto.org
pm2 start ecosystem.config.cjs
pm2 save