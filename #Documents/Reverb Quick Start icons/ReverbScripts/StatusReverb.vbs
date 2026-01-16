Set WshShell = CreateObject("WScript.Shell")
WshShell.Run "cmd /c cd /d C:\xampp\htdocs\pmway.hopto.org && C:\Users\Administrator\AppData\Roaming\npm\pm2.cmd status && echo. && echo Press any key to close... && pause > nul", 1, True
Set WshShell = Nothing
