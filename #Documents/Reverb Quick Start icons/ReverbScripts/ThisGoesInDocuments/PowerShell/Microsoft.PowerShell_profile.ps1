# Laravel Reverb PM2 shortcuts
function Stop-Reverb { pm2 stop laravel-reverb }
function Start-Reverb { pm2 restart laravel-reverb }
function Kill-Reverb { pm2 delete laravel-reverb }
function Status-Reverb { pm2 status }
function Logs-Reverb { pm2 logs laravel-reverb }

# Short aliases
Set-Alias stopreverb Stop-Reverb
Set-Alias startreverb Start-Reverb
Set-Alias killreverb Kill-Reverb