module.exports = {
    apps: [{
        name: 'laravel-reverb',
        script: 'artisan',
        interpreter: 'php',
        args: 'reverb:start',
        cwd: 'C:\\xampp\\htdocs\\pmway.hopto.org',
        instances: 1,
        autorestart: true,
        watch: false,
        max_memory_restart: '256M',
        error_file: './storage/logs/reverb-error.log',
        out_file: './storage/logs/reverb-out.log',
        log_file: './storage/logs/reverb-combined.log',
        time: true
    }]
};