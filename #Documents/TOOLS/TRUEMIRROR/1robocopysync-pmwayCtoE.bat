@echo off
REM ====================================================================
REM ROBOCOPY BACKUP - SAFE VERSION
REM Source will NEVER be modified - only reads from source
REM ====================================================================

REM Define paths clearly

set SOURCE=c:\xampp\htdocs\pmway.hopto.org
set DEST=E:\pmway.hopto.org

REM Create timestamp for log filename
set TIMESTAMP=%DATE:~10,4%%DATE:~4,2%%DATE:~7,2%_%TIME:~0,2%%TIME:~3,2%%TIME:~6,2%
set TIMESTAMP=%TIMESTAMP: =0%
set LOGFILE=%DEST%\robocopy_log_%TIMESTAMP%.txt

REM Verify source exists
if not exist "%SOURCE%" (
    echo ERROR: Source folder does not exist: %SOURCE%
    pause
    exit /b 1
)

REM Verify destination drive exists
if not exist "%DEST:~0,2%\" (
    echo ERROR: Destination drive %DEST:~0,2% not found!
    pause
    exit /b 1
)

REM Show what will be done
echo.
echo SOURCE: %SOURCE%
echo DESTINATION: %DEST%
echo.
echo This will MIRROR source to destination (destination will be modified)
echo Press Ctrl+C to cancel, or
pause

REM Safe mirror with comprehensive logging
robocopy "%SOURCE%" "%DEST%" /MIR /R:3 /W:5 /V /TS /FP /BYTES /X /LOG:"%LOGFILE%" /TEE /NP

REM Append summary to log file
echo. >> "%LOGFILE%"
echo ==================================================================== >> "%LOGFILE%"
echo SUMMARY OF COPIED/MODIFIED FILES: >> "%LOGFILE%"
echo ==================================================================== >> "%LOGFILE%"
findstr /C:"New File" /C:"Newer" /C:"Older" "%LOGFILE%" >> "%LOGFILE%.temp"
type "%LOGFILE%.temp" >> "%LOGFILE%"
del "%LOGFILE%.temp"
echo. >> "%LOGFILE%"
echo ==================================================================== >> "%LOGFILE%"
echo SUMMARY OF DELETED FILES: >> "%LOGFILE%"
echo ==================================================================== >> "%LOGFILE%"
findstr /C:"*EXTRA File" "%LOGFILE%" >> "%LOGFILE%.temp"
type "%LOGFILE%.temp" >> "%LOGFILE%"
del "%LOGFILE%.temp"

echo.
echo Backup complete! Full log with summary saved to: %LOGFILE%
pause