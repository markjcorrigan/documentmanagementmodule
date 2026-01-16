Backup Management Commands
1. Run Backups (Manual)
bash
php artisan db:backup --type=daily      # Database backup
php artisan config:backup --type=daily  # Config backup
2. Check Backup Status
bash
php artisan backup:status               # Detailed status report
3. Quick Status Check
bash
# One-liner for quick check
echo "📅 Today: $(date +%Y-%m-%d)" && \
echo "📊 DB backups: $(find storage/app/backups/daily/ -name \"*.sql\" 2>/dev/null | wc -l)" && \
echo "📁 Config backups: $(find storage/app/backups/configs/ -name \"*.zip\" 2>/dev/null | wc -l)" && \
echo "🕐 Latest: $(find storage/app/backups/ -type f -name \"*.sql\" -o -name \"*.zip\" -exec ls -lt {} + 2>/dev/null | head -1 | awk '{print \$6, \$7, \$8, \$9}')"
4. View Backup Files
bash
# List all backups with sizes
find storage/app/backups/ -type f \( -name "*.sql" -o -name "*.zip" \) -exec ls -lh {} \;

# List today's backups
find storage/app/backups/ -type f -name "*$(date +%Y-%m-%d)*" -exec ls -lh {} \;
5. Scheduler Management
bash
php artisan schedule:list               # View all scheduled commands
php artisan schedule:run                # Run due commands now
6. Check Scheduler Logs
bash
tail -f storage/logs/laravel.log        # General Laravel log
tail -f storage/logs/backup.log         # Backup-specific log (when run by scheduler)
Scheduled Backup Times
Daily DB: 2:30 AM

Daily Config: 2:35 AM

Weekly DB: Sunday 4:00 AM

Monthly DB: 1st of month 5:00 AM

Windows Task Scheduler
Runs: php artisan schedule:run every minute

Task name: "Laravel Scheduler"

Just copy this section to your README.md! The most important commands are php artisan backup:status and php artisan db:backup --type=daily.