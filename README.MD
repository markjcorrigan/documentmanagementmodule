# PMWay - Laravel Livewire + TALL + Blog Integration


>NB Important Routes:  
```
.\reset.bat
php artisan logs:clear
php artisan system:setup-confidential
php artisan storage:link --force      

php artisan visitor:stats --hours=1  # Last hour
php artisan backup:status


```
>SPATIE PERMISSIONS 
Best Practice for Module Visibility:
Use @can() to check permissions (not roles). Super Admins automatically have all permissions if you set them up correctly.
Lock Module/Section to Permission:
````
@can('joke management')
<!-- Your module content here -->
<div>Joke Management Module</div>
@endcan
````

Lock Button/Action to Permission:
````
@can('joke management')
<button wire:click="deleteJoke({{ $joke->id }})">Delete</button>
@endcan
````

Check Multiple Permissions (ANY):
````
@canany(['joke management', 'blog approved'])
<!-- Shows if user has ANY of these permissions -->
@endcanany
````
OR 
```
      @canany(['view users', 'view roles', 'view permissions'])
            <flux:navlist.group heading="Users" class="grid">
                @can('view users')
                    <flux:navlist.item icon="user" :href="route('admin.users.index')" :current="request()->routeIs('admin.users.*')">
                        {{ __('users.title') }}
                    </flux:navlist.item>
                @endcan
                @can('view roles')
                    <flux:navlist.item icon="shield-user" :href="route('admin.roles.index')" :current="request()->routeIs('admin.roles.*')">
                        {{ __('roles.title') }}
                    </flux:navlist.item>
                @endcan
                @can('view permissions')
                    <flux:navlist.item icon="shield-check" :href="route('admin.permissions.index')" :current="request()->routeIs('admin.permissions.*')">
                        {{ __('permissions.title') }}
                    </flux:navlist.item>
                @endcan

                    @can('view permissions')
                        <flux:navlist.item icon="pencil" :href="route('portfoliodash')" :current="request()->routeIs('portfoliodash.*')">
                            {{ __('PortfolioAdmin') }}
                        </flux:navlist.item>
                    @endcan
            </flux:navlist.group>
        @endcanany
```
OR
```
    @can('joke management')
    <a href="{{ route('jokes.create') }}">Create your first joke</a>
    @endcan

```

Check Multiple Permissions (ALL):
````

@can('joke management')
@can('blog approved')
<!-- Shows only if user has BOTH permissions -->
@endcan
@endcan
````

Only Check Role (rare, but sometimes needed):
````
@role('Super Admin')
<!-- Debug panel or admin-only tools -->
@endrole
````

Make Super Admin Bypass All Permission Checks:
In your User model or AuthServiceProvider:
````
phpGate::before(function ($user, $ability) {
return $user->hasRole('Super Admin') ? true : null;
});
````
>With this setup, just use @can('permission-name') everywhere and Super Admin always sees everything.


https://pmway.hopto.org/routes/routes.html  nb name lowercase pwd Zupperwiz@
The idea is to update this via the html so open file in phpstrom and tick off as I test.  This will be a big audit process to be completed in the first weeks of January 2026.
If i am locked out clear cache via google chrome.

```
rg --color=always --colors 'path:fg:yellow' --colors 'path:style:bold' --colors 'line:fg:yellow' --colors 'line:style:bold' --colors 'match:fg:yellow' --colors 'match:style:bold' -i -n -C 3 "Super User" resources/views/ -g "*.blade.php"
``` 

## 1. Raison d’être
I'm using **TallStarter** for Laravel 12 Livewire Starter Kit from Mortenebak.
Into this, I am incorporating a blog I found called **Laravel 11 Portfolio Website**.
Thank you to the original authors for their code.

I will make substantial changes to incorporate my original web into Monetnebak's **Laravel** **Livewire** starter kit.  These have included my original **Bootstrap v3+4** and **Twig** configurations from my PMWay web, and Spatie permissions (now integrated into **TallStarter**.
This is proving to be a good **Livewire** and **Laravel 12** learning exercise.  While my forms all facilitate CRUD operations, I am basing the information in the web site on Seeded information.  I.e. this way if I make a change to my Portfolio, as an example, it will be as an addition to the seeder as this way I can quickly refresh the database and reseed changes. Information on my approach is below.
---

Guitar Sync Command - work in progress
```
php artisan guitar:sync --force --skip-hidden
```

NOTE:  Quick command that encapsulates the below:
```Bash
php artisan system:setup
php artisan system:setup-confidential
php artisan system:setup-confidential --skip-protected

```
MAINTENANCE MODE:
```
php artisan maintenance:down  
php artisan maintenance:up
```
NB Live Chat Diagnostic:
```
https://pmway.hopto.org/reverb-config-test
```

|--------------------------------------------------------------------------
| PINT: Example Usage
|--------------------------------------------------------------------------
|
| Run Pint normally:
|   php artisan code:pint
|
| Run only on modified files:
|   php artisan code:pint --dirty
|
| Run Pint and automatically commit fixes:
|   php artisan code:pint --commit
|
| Combine flags:
|   php artisan code:pint --dirty --commit

```
php artisan code:pint  
```
RECTOR:  RECTOR:RUN IS DANGEROUS.  Run only after a full backup.
```
php artisan rector:check
php artisan rector:run

```
PHPSTAN
Run PHPStan on default paths (app, routes, database) at level 8:  (1 is easy and 8 is strict)
````
php artisan phpstan:check
php artisan phpstan:check --level=5
php artisan phpstan:check --paths=app,tests
````

CODE AUDIT We can create a single Artisan command that will run both Rector (dry-run) and PHPStan sequentially, 
reporting issues for both without modifying any files. This is ideal for safely checking your codebase before applying Rector changes.
NB AUDIT MAKES THE CHANsGES.  USE WITH CARE

````
php artisan code:audit --rector-dry-run
php artisan code:audit --phpstan-level=8 --phpstan-paths=app,tests,routes --rector-dry-run
php artisan code:audit
````

PINT, PHPSTAN and RECTOR AGAINST ONE FILE ONLY CHECK AND THEN FIX  NB AUDIT IS FOR REAL
```
php artisan code:audit --file=app/Models/User.php --rector-dry-run --pint
php artisan code:audit --file=app/Models/User.php

```

VISITOR STATS  or look at visitor_logs table in phpmyadmin
````
php artisan visitor:stats
php artisan visitor:stats --detail
php artisan visitor:stats --hours=1  # Last hour
php artisan visitor:stats --hours=168 # Last week (168 hours)
````
Tinker commands to get at visitor stats
// See all enhanced data
>>> \App\Models\VisitorLog::latest()->first()

// Check different visitor types
>>> \App\Models\VisitorLog::bots()->count()
>>> \App\Models\VisitorLog::users()->count()
>>> \App\Models\VisitorLog::anonymous()->count()

// See bot breakdown
>>> \App\Models\VisitorLog::bots()->groupBy('bot_type')->selectRaw('bot_type, COUNT(*) as count')->get()

// Browser statistics
>>> \App\Models\VisitorLog::where('visitor_type', '!=', 'bot')->groupBy('browser')->selectRaw('browser, COUNT(*) as count')->orderByDesc('count')->get()

CLEAR LOGS:  Works well with AI coding.  I.e. clear logs and go directly to the issue on hand.
```
php artisan logs:clear
```
NB:  (nb click the link to https://pmway.hopto.org/maintenance2024 which sets cookie)

REVERB In Prod  (In Dev Ctrl C to stop reverb and php artisan reverb:start
OR in Prod use Bash)
PM2 Quick Reference:

pm2 restart laravel-reverb → Restarts, returns to prompt, keeps running
pm2 stop laravel-reverb → Stops it (status becomes "stopped")
pm2 delete laravel-reverb → Removes it from PM2 completely
pm2 status → Check what's running
pm2 logs laravel-reverb → Watch live logs (Ctrl+C to exit, process keeps running)
```Bash
# List PM2 processes
pm2 list

# Stop Reverb process
pm2 stop laravel-reverb

# Start Reverb process
pm2 start laravel-reverb

# Restart Reverb process
pm2 restart laravel-reverb

# View logs
pm2 logs laravel-reverb

pm2 start ecosystem.config.cjs

# Restart Reverb

php artisan config:clear
pm2 restart laravel-reverb

```
```Bash
php artisan app:toggle-maintenance

php artisan system:maintenance
php artisan system:maintenance-simple
php artisan cache:nuke
.\reset.bat
```
Barest minimum
```
php artisan view:clear
php artisan optimize:clear
```
Skip NPM
```
php artisan system:maintenance --skip-npm
```
🔑 Generate Application Key
🔄 Migrate Fresh (optional)
👤 Create Users
🔗 Storage Link
📄 Rebuild Documents
🖼️ Rebuild Images
🔧 System Maintenance


# Cache Clear Commands

## Daily Use (Safe)
```
php artisan optimize:clear && php artisan optimize
```


## Nuclear (Safe - Keeps Sessions)
```
rm -rf bootstrap/cache/*.php storage/framework/cache/data/* storage/framework/views/* && php artisan optimize:clear && php artisan optimize
```


## Full Nuclear (Includes Sessions - Use Sparingly)  NB Run my full build command after this.
```
rm -rf bootstrap/cache/*.php storage/framework/cache/data/* storage/framework/views/* storage/framework/sessions/* && php artisan optimize:clear && php artisan optimize
```
# XAMPP DATABASE BACKUPS
# XAMPP DATABASE & CONFIG BACKUPS

## Backup Commands

### Manual Backups
```bash
# Create manual backups
php artisan db:backup --type=daily      # Database daily backup
php artisan db:backup --type=weekly     # Database weekly backup
php artisan db:backup --type=monthly    # Database monthly backup
php artisan config:backup --type=daily  # XAMPP config files backup
```

---

## Check Backup Status

### Detailed Backup Status
```bash
php artisan backup:status
```

### Quick Status Check
```bash
echo "📅 Today: $(date +%Y-%m-%d)" && \
echo "📊 DB backups: $(find storage/app/backups/daily/ -name \"*.sql\" 2>/dev/null | wc -l)" && \
echo "📁 Config backups: $(find storage/app/backups/configs/ -name \"*.zip\" 2>/dev/null | wc -l)" && \
echo "🕐 Latest: $(find storage/app/backups/ -type f -name \"*.sql\" -o -name \"*.zip\" -exec ls -lt {} + 2>/dev/null | head -1 | awk '{print \$6, \$7, \$8, \$9}')"
```

---

## List Backup Files

### List All Backups
```bash
find storage/app/backups/ -type f \( -name "*.sql" -o -name "*.zip" \) -exec ls -lh {} \;
```

### List Today’s Backups
```bash
find storage/app/backups/ -type f -name "*$(date +%Y-%m-%d)*" -exec ls -lh {} \;
```

---

## Scheduler Commands (Laravel 12)

### Check Scheduled Tasks
```bash
php artisan schedule:list
```

### Run Due Tasks Manually
```bash
php artisan schedule:run
```

> Note: In Laravel 12, scheduling is configured in bootstrap/app.php

---

## Restore Backup

### Database Restore
```bash
# Replace BACKUP_FILE.sql with actual filename
mysql -u root -p pmwayhopto < storage/app/backups/daily/BACKUP_FILE.sql
```

### Config Restore
```text
Manually extract ZIP from:
storage/app/backups/configs/
```

---

## Maintenance Commands

### Clear Laravel Caches
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### Clear Bootstrap Cache
```bash
rm -f bootstrap/cache/*.php
```

---

## Backup Locations

### Database
```text
Daily:   storage/app/backups/daily/    (keeps 7 days)
Weekly:  storage/app/backups/weekly/   (keeps 4 weeks)
Monthly: storage/app/backups/monthly/  (keeps 3 months)
```

### Configurations (XAMPP)
```text
storage/app/backups/configs/daily/
```

---

## Automated Schedule (Laravel 12)

### Database Backups
```text
Daily:   2:30 AM every day
Weekly:  4:00 AM every Sunday
Monthly: 5:00 AM 1st of each month
```

### Config Backups
```text
Daily: 2:35 AM every day (after DB backup)
```

### Other Scheduled Tasks
```text
Visitor cleanup: Every 10 minutes
Notes cleanup:   2:00 AM daily
Notes reindex:   1:00 AM daily
Notes stats:     11:55 PM daily
Log cleanup:     6:00 AM every Monday
```

---

## Windows Task Scheduler Setup
```text
Task Name: Laravel Scheduler
Command:   C:\xampp\php\php.exe C:\xampp\htdocs\pmway.hopto.org\artisan schedule:run
Schedule:  Every minute
Run as:    SYSTEM account
```

> In Laravel 12, schedules live in bootstrap/app.php using ->withSchedule()



## END OF BACKUP STRATEGY


END OF BACKUP STRATEGY

CONFIG BACKUP STRATEGY

```
php artisan config:backup --type=daily
```
EMD OF CONFIG BACKUP STRATEGY


🆕 First Time Setup
```  
php artisan migrate
php artisan scout:rebuild --fresh --sync
```
🚀 After Deployment
```
php artisan scout:rebuild
```
🐛 Search Not Working
```
php artisan scout:rebuild --fresh
```
📁 Files Missing from Database
```
php artisan scout:rebuild --sync
```
🔧 After Changing toSearchableArray()
```
php artisan scout:rebuild --fresh
```
## XAMPP Restart Required After:
- Any cache changes that seem stuck
- After deleting bootstrap/cache files
- When PHP opcache is involved

## 2. TallStarter - A Laravel Livewire Starter Kit

**Latest Version on Packagist:** Active – stable and maintained.
Includes:

- ✅ User Management
- ✅ Role Management
- ✅ Permissions Management
- ✅ Localization options
- ✅ Separate Dashboard for Super Admins
- ✅ Updated for Laravel 12.0 and Livewire 3.0

**TALL Stack:**

- Tailwind CSS
- Alpine.js
- Laravel
- Laravel Livewire (components)

**Additional Features:**

- Flux UI (flexible UI components)
- Laravel Pint (code style fixes)
- PestPHP (testing)
- missing-livewire-assertions (extra testing of Livewire components)
- LivewireAlerts (SweetAlerts)
- Spatie Roles & Permissions (user roles & permissions)
- Strict Eloquent Models
- Laravel Debugbar
- Laravel IDE helper

**Upcoming Considerations:**

- Wire Elements / Modals
- Laravel Cashier (Stripe integration)

---

## 3. Installation

Using this repository

### 0a. Using TallStarter template
```bash
laravel new my-project --using=mortenebak/tallstarter
```

1. Install dependencies

```bash
composer install
```
```bash
npm install
```
If for production then npm run build
```bash
npm run build # or npm run dev
```
2. Configure environment

cp .env.example .env
```bash
php artisan key:generate
```
```bash
php artisan storage:link
```

3. Migrate database and seed

```bash
	php artisan migrate:fresh --seed
```

4. Or Migrate and Seed database separately
```bash
	php artisan migrate:fresh
```

```bash
	php artisan db:seed
```
All seeders below are seeded up front with the first seed command.
PermissionSeeder::class,
UserSeeder::class,
RoleSeeder::class,
SiteSettingSeeder::class,
BlogPostStarterSeeder::class,
SearchTableSeeder::class,
HeroesSeeder::class,
ServiceSeeder::class,
ResumesSeeder::class,
SkillsSeeder::class


5. Create the first Super Admin user

```bash
	php artisan app:create-user
```

Or do the above all at once:

 * FullSetupCommand
 *
 * This command runs a full setup of the application:
 * 1. Creates a user or super admin
 * 2. Rebuilds the documents table
 * 3. Rebuilds the images table
 *
 * Usage:
 * php artisan app:full-setup           // Run with prompts
 * php artisan app:full-setup --force   // Skip confirmations for rebuilds
 * php artisan app:full-setup --max-logs=20   // Customize max log files to keep

php artisan app:full-setup --max-logs=10

php artisan app:full-setup --force --max-logs=10

--force skips confirmation prompts in documents/images rebuilds.

--max-logs controls how many old logs to keep.

Optional:  Changing a table or seeder and then migrating and seeding.

```bash
php artisan migrate:refresh --path=/database/migrations\2025_03_03_131959_create_skills_table.php
````

```bash
        php artisan db:seed --class=SkillsSeeder
```

6. Set default timezone (if different from UTC)

In config/app.php:
'timezone' => env('APP_TIMEZONE', 'UTC'),

.env
APP_TIMEZONE=Africa/Johannesburg

Then clear caches:

```bash
        php artisan system:maintenance
```
I use this approach of dropping all the below into the command line.
php artisan queue:restart
php artisan route:clear
php artisan view:clear
php artisan optimize:clear
php artisan cache:clear
php artisan clear-compiled
php artisan config:cache
php artisan package:discover
php artisan debugbar:clear
php artisan optimize
composer dump-autoload

Optional based on need:
/optimize
php artisan scout:import "App\Models\Document"
php artisan responsecache:clear
php artisan route:cache  to speed up route cache in production.  php a


Check the timezone with:
```bash
php artisan tinker
````
>>> config('app.timezone')

7. Rebuild Documents Table Console Command
Overview

PMWay includes a console command to rebuild the documents table from the files in your project.

Command:

```bash
	php artisan documents:rebuild
```

Command:

```bash
	php artisan images:rebuild
```

Documents in PMWay are read from:
    $path = storage_path('app/public/assets');
    In your web page, use this HTML:
    html<a href="{{ asset('storage/assets/homehosting.pdf') }}" download>
    Download Home Hosting Document
    </a>
    Or if you want it to open in the browser (if possible):
    html<a href="{{ asset('storage/assets/homehosting.pdf') }}" >
    View Home Hosting Document
    </a>

So any image file...
storage/app/public/images/example.jpg
will be accessible from the browser at:
/storage/images/example.jpg

Storage::url()
<img src="{{ Storage::url('images/example.jpg') }}" alt="Example">
This method uses Laravel's Storage facade to generate a URL for the file. It's useful when working with files stored in the storage/app/public directory or other disks configured in config/filesystems.php.

asset()
<img src="{{ asset('storage/images/example.jpg') }}" alt="Example">
This method generates a URL for the file using the asset helper function. It's useful when referencing files in the public directory or files that have been symlinked to the public directory.

Key Difference
The key difference is that Storage::url() is more flexible and can handle files stored in different disks, while asset() is more straightforward and assumes the file is publicly accessible.

Note that for my pmboksix folder outside Laravel in the twig folder I had to use this type of access to get at the images:
<img class="img-fluid" src="/storage/images/mouseover.png" onclick="this.src='/storage/images/81ittos.png'" ondblclick="this.src='/storage/images/mouseover.png'">


Additional information about file handling that I use in Laravel:
Signature with optional force flag:
	protected $signature = 'documents:rebuild {--force : Skip confirmation}';
Uses Laravel File Facade:

	use Illuminate\Support\Facades\File;

	$files = File::files($path);
	foreach ($files as $file) {
    	echo $file->getFilename();
	}

Artisan will ask:
	This will DELETE all existing documents and rebuild from files in storage/app/public/assets. Continue? (yes/no) [no]:
Type yes to proceed.
Automatic Mode (Skip Confirmation)


	php artisan documents:rebuild --force


Immediately clears and rebuilds the documents table without any prompts.


	php artisan documents:rebuild --max-logs=5


	php artisan documents:rebuild --force --max-logs=5

8. LOGS:
Logs are stored in storage/logs/:

your-project/
└── storage/
    └── logs/
        ├── rebuild_documents_20250926_093012.log
        ├── rebuild_documents_20250925_154500.log
        └── ...

Max Logs Option

Limits number of rebuild log files kept.

Example usage:

```bash
	php artisan documents:rebuild --max-logs=5
```
```bash
	php artisan documents:rebuild --force --max-logs=5
```

9. Spatie Permissions
These are managed from the admin dashboard.
A route like Route::get('/document-uploads', [DocumentController::class, 'uploads'])->name('uploads')->middleware('permission:document uploads'); means only 'Super Admin' role
can upload documents.

However, it seems that Spatie recommend that we also create a Gate:
I.e. In app/Providers/AuthServiceProvider.php add

    use Illuminate\Support\Facades\Gate;

    public function boot()
    {
    $this->registerPolicies();

    Gate::define('Super Admin', function ($user) {
        return $user->hasRole('Super Admin');
    });
    }

Then in view:

    @can('Super Admin')
    // Content visible to Super Admins
    <input type="checkbox" wire:click="updateChecked({{ $result->id }})" {{ $result->checked ? 'checked' : '' }}>
    @endcan

10.  Hard wiring the database tables.  I have dealt with this above but here is more information about my approach:
Note that I am writing all the entries for the tables including search lists etc. into the seeders.
This means that with every change to a seeder I will need to drop the table and then reseed.
As I am Super Admin and only I will have access to CRUD the tables I am doing this manually.
The advantage is that I can quickly recreate the web site full of key information that I need in it.


The optional commands to delete a specific table and reseed are:
```Bash
php artisan migrate:refresh --path=/database/migrations\2025_09_22_094750_create_search_terms_table.php
```
```Bash
php artisan db:seed --class=SearchTableSeeder
```

11. I am using the SearchTableSeeder to be able to search for each page in my database.
I add the search criteria into the page and make sure that search infomration in 'terms' is separated by commas and when the page has been checked and is ready for production I change checked to true.
Only Super Admin can see the check box which is hard wired so a good way for me to keep the web site updated.
  ['terms' => 'Pin down your actual performance, CMMi Level Zero, CML1 or CML2+, Dunning Kruger Effect, Route is also /pin', 'link' => 'home/pin', 'checked' => true],
The SearchTableSeeder etc., are all seeded up front with the first seed command.
    PermissionSeeder::class,
    UserSeeder::class,
    RoleSeeder::class,
    SiteSettingSeeder::class,
    BlogPostStarterSeeder::class,
    SearchTableSeeder::class,
    HeroesSeeder::class,
    ServiceSeeder::class,
    ResumesSeeder::class,
    SkillsSeeder::class


12. For Production in Windows or Xampp Home Serving Remember:
    APP_DEBUG=false
    APP_ENV=production
    APP_URL=https://pmway.hopto.org
    storage/app/public/assets/homehosting.pdf to use Certbot and Xampp
    The Link
    In your web page, use this HTML:
    html<a href="{{ asset('storage/assets/homehosting.pdf') }}" download>
    Download Home Hosting Document
    </a>
    Or if you want it to open in the browser (if possible):
    html<a href="{{ asset('storage/assets/homehosting.pdf') }}" >
    View Home Hosting Document
    </a>

    In AppServiceProvider
    public function boot(): void
    {
    // Keep your pagination styling
    Paginator::useBootstrapFive();
    Paginator::useTailwind();

        // ✅ Option 1: Only share $user with views in "pmboksix" folder
        View::composer('pmboksix.*', function ($view) {
            $view->with('user', Auth::user());
        });

        // ✅ Option 2 (optional): Uncomment if you want $user in ALL views
        // View::share('user', Auth::user());

        Vite::useBuildDirectory('build');
        Vite::useManifestFilename('.vite/manifest.json');
    }
And check vite.config.js

        import { defineConfig, loadEnv } from 'vite';
        import laravel from 'laravel-vite-plugin';
        import tailwindcss from "@tailwindcss/vite";

        export default defineConfig(({ command, mode }) => {
        const env = loadEnv(mode, './', '');
        return {
        plugins: [
        laravel({
        input: [
        'resources/css/app.css',
        'resources/js/app.js',
        ],
        refresh: [
        'resources/views/**/*.blade.php',
        'resources/views/**/*.php',
        'app/Livewire/**/*.php',
        'app/View/Components/**/*.php',
        'app/View/Components/livewire/**/*.php',
        ],
        }),
        tailwindcss(),
        ],
        server: {
        cors: true,
        open: env.APP_URL || 'http://localhost:5173',
        hmr: {
        overlay: true,
        },
        },
        // Remove the build customization - use Laravel's defaults
        };
        });


13. Final Notes:

-	All previous document records will be deleted and replaced.

-	Fully self-contained — no additional seeders or commands required.

-	Supports images, videos, audio, PDFs, and other file types depending on your implementation.

-	Interactive mode prevents accidental deletion by asking confirmation before rebuilding.

14. Admin Dashboard & Features

Multi-language support

-	Super Admin dashboard

- 	Livewire-powered components

- 	Flux UI integration

-	SweetAlerts support

15. Testing & Debugging

-	PestPHP for testing

-	missing-livewire-assertions for Livewire component tests

-	Laravel Debugbar for debugging

16. Additional Tools

-	Laravel Pint for code style enforcement

-	Laravel IDE Helper for better IDE support

17. Style guides
```
https://pmway.hopto.org/style-guide
https://pmway.hopto.org/style-guide-simple
```



