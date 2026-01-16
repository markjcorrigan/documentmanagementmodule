===============================================
TRUEMIRROR - HOW TO RUN (BYPASS WINDOWS NONSENSE)
===============================================

Microsoft's execution policy is blocking your PowerShell scripts.

SOLUTION: Use the .BAT files instead!

-----------------------------------------------
FILES INCLUDED:
-----------------------------------------------

1. TRUEMIRROR_PROD.bat
   - Simple launcher (runs as current user)
   - Double-click this to run TRUEMIRROR_PROD.ps1

2. TRUEMIRROR_PROD_ADMIN.bat
   - Admin launcher (auto-elevates to Administrator)
   - Use this if you need admin privileges
   - Will show UAC prompt

3. TRUEMIRROR_ROOTBACKUP.bat
   - Simple launcher (runs as current user)
   - Double-click this to run TRUEMIRROR_ROOTBACKUP.ps1

4. TRUEMIRROR_ROOTBACKUP_ADMIN.bat
   - Admin launcher (auto-elevates to Administrator)
   - Use this if you need admin privileges
   - Will show UAC prompt

-----------------------------------------------
INSTRUCTIONS:
-----------------------------------------------

STEP 1: Put ALL files in the same folder:
   - TRUEMIRROR_PROD.ps1
   - TRUEMIRROR_PROD.bat (or TRUEMIRROR_PROD_ADMIN.bat)
   - TRUEMIRROR_ROOTBACKUP.ps1
   - TRUEMIRROR_ROOTBACKUP_ADMIN.bat (or TRUEMIRROR_ROOTBACKUP_ADMIN.bat)

STEP 2: Double-click the .BAT file you want to run
   - NOT the .ps1 file!
   - The .bat file will launch the .ps1 file correctly

STEP 3: Enjoy never dealing with execution policy again!

-----------------------------------------------
WHICH ONE TO USE?
-----------------------------------------------

For most backups/mirrors:
→ Use TRUEMIRROR_PROD_ADMIN.bat (recommended)
→ Use TRUEMIRROR_ROOTBACKUP_ADMIN.bat (recommended)

If you don't need admin rights:
→ Use TRUEMIRROR_PROD.bat
→ Use TRUEMIRROR_ROOTBACKUP.bat

-----------------------------------------------
WHY THIS WORKS:
-----------------------------------------------

.BAT files don't have execution policy restrictions.
The batch file launches PowerShell with -ExecutionPolicy Bypass,
so your scripts run without Windows getting in your way.

You're the admin of your own machine - you shouldn't need
Microsoft's permission to run your own scripts!

-----------------------------------------------
TROUBLESHOOTING:
-----------------------------------------------

If the batch file doesn't work:
1. Make sure the .ps1 and .bat files are in the SAME folder
2. Right-click the .bat file → "Run as administrator"
3. Check Windows Defender isn't blocking it

If you get "script not found" error:
1. Open the .bat file in Notepad
2. Make sure the script names match exactly
3. Make sure there are no extra spaces

===============================================
