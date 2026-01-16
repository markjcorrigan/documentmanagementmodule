@echo off
REM ============================================================================
REM Catalog-DriveFiles.bat
REM Catalog all files and folders on a drive with progress display
REM ============================================================================

REM ============================================================================
REM CONFIGURATION - SET YOUR DRIVE PATH HERE
REM ============================================================================
set "DRIVE_PATH=I:\"
REM ============================================================================

setlocal enabledelayedexpansion

REM Get current date for filename
for /f "tokens=2 delims==" %%I in ('wmic os get localdatetime /value') do set datetime=%%I
set DATE_STAMP=%datetime:~0,4%-%datetime:~4,2%-%datetime:~6,2%

REM Create output folder with date
set "OUTPUT_FOLDER=%DRIVE_PATH%FileCatalog_%DATE_STAMP%"
if not exist "%OUTPUT_FOLDER%" mkdir "%OUTPUT_FOLDER%"

REM Set output files inside the dated folder
set "TXT_FILE=%OUTPUT_FOLDER%\FileCatalog.txt"
set "CSV_FILE=%OUTPUT_FOLDER%\Files.csv"
set "FOLDER_CSV=%OUTPUT_FOLDER%\Folders.csv"

echo ============================================
echo File Catalog Script
echo ============================================
echo Drive Path: %DRIVE_PATH%
echo Output Folder: %OUTPUT_FOLDER%
echo.
echo Output Files:
echo   Text: FileCatalog.txt
echo   Files CSV: Files.csv
echo   Folders CSV: Folders.csv
echo.
echo Start Time: %datetime:~0,4%-%datetime:~4,2%-%datetime:~6,2% %datetime:~8,2%:%datetime:~10,2%:%datetime:~12,2%
echo ============================================
echo.

REM Initialize text file
echo FILE CATALOG > "%TXT_FILE%"
echo ============ >> "%TXT_FILE%"
echo Drive Path: %DRIVE_PATH% >> "%TXT_FILE%"
echo Generated: %datetime:~0,4%-%datetime:~4,2%-%datetime:~6,2% %datetime:~8,2%:%datetime:~10,2%:%datetime:~12,2% >> "%TXT_FILE%"
echo ============ >> "%TXT_FILE%"
echo. >> "%TXT_FILE%"
echo Full Path ^| File Name ^| Size (bytes) >> "%TXT_FILE%"
echo ----------------------------------------------------------- >> "%TXT_FILE%"
echo. >> "%TXT_FILE%"

REM Initialize CSV file
echo FullPath,FileName,Directory,Extension,SizeBytes,ModifiedDate > "%CSV_FILE%"

REM Initialize Folder CSV
echo FolderPath,FolderName,ModifiedDate > "%FOLDER_CSV%"

set FILE_COUNT=0
set FOLDER_COUNT=0

echo Phase 1: Cataloging folders...
echo.

REM Catalog folders using dir command
for /f "delims=" %%D in ('dir "%DRIVE_PATH%" /ad /b /s 2^>nul') do (
    set /a FOLDER_COUNT+=1
    set "FOLDER_PATH=%%D"
    
    REM Get folder name from path
    for %%F in ("!FOLDER_PATH!") do (
        set "FOLDER_NAME=%%~nxF"
        set "MODIFIED=%%~tF"
    )
    
    REM Write to folder CSV
    echo "!FOLDER_PATH!","!FOLDER_NAME!","!MODIFIED!" >> "%FOLDER_CSV%"
    
    REM Show progress every 50 folders
    set /a MOD=!FOLDER_COUNT! %% 50
    if !MOD! EQU 0 (
        <nul set /p =.
    )
)

echo.
echo Total folders found: !FOLDER_COUNT!
echo.
echo Phase 2: Cataloging files...
echo Please wait, this may take a while...
echo.

REM Catalog files using dir command
for /f "delims=" %%F in ('dir "%DRIVE_PATH%" /a-d /b /s 2^>nul') do (
    set /a FILE_COUNT+=1
    set "FILE_PATH=%%F"
    
    REM Get file details
    for %%A in ("!FILE_PATH!") do (
        set "FILE_NAME=%%~nxA"
        set "FILE_DIR=%%~dpA"
        set "FILE_EXT=%%~xA"
        set "FILE_SIZE=%%~zA"
        set "FILE_DATE=%%~tA"
    )
    
    REM Handle empty size (for locked/special files)
    if "!FILE_SIZE!"=="" set "FILE_SIZE=0"
    
    REM Write to text file
    echo !FILE_PATH! ^| !FILE_NAME! ^| !FILE_SIZE! bytes >> "%TXT_FILE%"
    
    REM Write to CSV
    echo "!FILE_PATH!","!FILE_NAME!","!FILE_DIR!","!FILE_EXT!","!FILE_SIZE!","!FILE_DATE!" >> "%CSV_FILE%"
    
    REM Show progress every 500 files (less verbose)
    set /a MOD=!FILE_COUNT! %% 500
    if !MOD! EQU 0 (
        echo Files cataloged: !FILE_COUNT!
    )
)

echo.
echo ============================================
echo Scan Complete!
echo ============================================
echo Total Files: !FILE_COUNT!
echo Total Folders: !FOLDER_COUNT!
echo ============================================
echo.

REM Add summary to text file
echo. >> "%TXT_FILE%"
echo ============ >> "%TXT_FILE%"
echo SUMMARY >> "%TXT_FILE%"
echo ============ >> "%TXT_FILE%"
echo Total Files Cataloged: !FILE_COUNT! >> "%TXT_FILE%"
echo Total Folders Cataloged: !FOLDER_COUNT! >> "%TXT_FILE%"
echo Scan Completed: %datetime:~0,4%-%datetime:~4,2%-%datetime:~6,2% %datetime:~8,2%:%datetime:~10,2%:%datetime:~12,2% >> "%TXT_FILE%"

echo Output files created:
echo   Text: %TXT_FILE%
echo   Files CSV: %CSV_FILE%
echo   Folders CSV: %FOLDER_CSV%
echo.
echo All files saved in: %OUTPUT_FOLDER%
echo.
echo IMPORTANT: Open the CSV files in Excel to:
echo   - Sort by size, name, or date
echo   - Filter by extension
echo   - Search for specific files
echo.
echo TIP: In Excel, use Ctrl+F to search across all files!
echo.
echo Opening output folder...
start "" "%OUTPUT_FOLDER%"
echo.

pause