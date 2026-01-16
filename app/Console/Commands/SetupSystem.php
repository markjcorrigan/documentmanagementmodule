<?php

namespace App\Console\Commands;

use App\Models\Document;
use App\Models\Image;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File as FileFacade;

class SetupSystem extends Command
{
    protected $signature = 'system:setup';

    protected $description = 'Complete system setup with migrations, user creation, and data rebuild';

    public function handle()
    {
        $this->info('╔══════════════════════════════════════════════════╗');
        $this->info('║          SYSTEM SETUP & INITIALIZATION           ║');
        $this->info('╚══════════════════════════════════════════════════╝');
        $this->newLine();

        // ===================================
        // ⿀ GENERATE APPLICATION KEY (FIRST)
        // ===================================
        $this->info('------------------------------');
        $this->info('🔑 Generating application key...');
        $this->info('------------------------------');
        $this->newLine();

        $this->call('key:generate');

        $this->newLine();
        $this->info('✅ Application key generated successfully.');
        $this->newLine();

        // ===================================
        // ⿠ MIGRATE FRESH (AUTOMATIC)
        // ===================================
        $this->info('------------------------------');
        $this->info('🔄 Running migrate:fresh --seed...');
        $this->info('------------------------------');
        $this->newLine();

        // Run automatically without asking
        $this->call('migrate:fresh', ['--seed' => true]);

        $this->newLine();
        $this->info('✅ Database migrated and seeded successfully.');
        $this->newLine();

        // ===================================
        // ⿡ CREATE SUPER ADMIN
        // ===================================
        $this->info('------------------------------');
        $this->info('Creating Super Admin User');
        $this->info('------------------------------');

        $this->createUser(true);

        // ===================================
        // ⿢ CREATE ADDITIONAL USERS (OPTIONAL)
        // ===================================
        while ($this->confirm('Do you want to add another user?', false)) {
            $this->newLine();
            $this->info('------------------------------');
            $this->info('Creating Additional User');
            $this->info('------------------------------');
            $this->createUser(false);
        }
        $this->newLine();

        // ===================================
        // ⿣ STORAGE LINK (CHECK/CREATE)
        // ===================================
        $this->info('------------------------------');
        $this->info('🔗 Checking storage symlink...');
        $this->info('------------------------------');

        $storageLinkExists = is_link(public_path('storage'));

        if ($storageLinkExists) {
            $this->info('ℹ️  Storage symlink already exists and is in place.');
        } else {
            $this->warn('⚠️  Storage symlink does not exist.');
            if ($this->confirm('Do you want to create the storage symlink now?', true)) {
                Artisan::call('storage:link');
                $this->info('✅ Storage symlink has been created successfully.');
                $storageLinkExists = true;
            } else {
                $this->warn('⚠️  Skipped storage symlink creation.');
            }
        }
        $this->newLine();

        // ===================================
        // ⿤ REBUILD DOCUMENTS (AUTOMATIC)
        // ===================================
        $this->info('------------------------------');
        $this->info('📄 Rebuilding documents...');
        $this->info('------------------------------');
        $this->newLine();

        $documentCount = $this->rebuildDocuments();

        $this->newLine();
        $this->info('✅ Documents rebuild complete. Total in database: '.$documentCount);
        $this->newLine();

        // ===================================
        // ⿥ REBUILD IMAGES (AUTOMATIC)
        // ===================================
        $this->info('------------------------------');
        $this->info('🖼️  Rebuilding images...');
        $this->info('------------------------------');
        $this->newLine();

        $imageCount = $this->rebuildImages();

        $this->newLine();
        $this->info('✅ Images rebuild complete. Total in database: '.$imageCount);
        $this->newLine();

        // ===================================
        // ⿦ SYSTEM MAINTENANCE (AUTOMATIC)
        // ===================================
        $this->info('------------------------------');
        $this->info('🔧 Running system maintenance...');
        $this->info('------------------------------');
        $this->newLine();

        // Call and display real-time output
        $this->call('system:maintenance');

        $this->newLine();
        $this->info('✅ System maintenance complete.');
        $this->newLine();

        // ===================================
        // ⿧ FINAL RESULTS
        // ===================================
        $this->newLine();
        $this->info('╔══════════════════════════════════════════════════╗');
        $this->info('║            SETUP COMPLETED SUCCESSFULLY          ║');
        $this->info('╚══════════════════════════════════════════════════╝');
        $this->newLine();
        $this->info('📊 Summary:');

        $storageLinkStatus = $storageLinkExists ? '✅ Verified' : '⚠️  Not created';
        $documentStatus = $documentCount > 0 ? "✅ {$documentCount} processed" : '⚠️  None found';
        $imageStatus = $imageCount > 0 ? "✅ {$imageCount} processed" : '⚠️  None found';

        $this->table(
            ['Task', 'Status'],
            [
                ['Application Key', '✅ Generated'],
                ['Database Migration', '✅ Completed'],
                ['Storage Link', $storageLinkStatus],
                ['Documents Rebuilt', $documentStatus],
                ['Images Rebuilt', $imageStatus],
                ['System Maintenance', '✅ Completed'],
            ]
        );
        $this->newLine();
        $this->info('🎉 Your system is ready to use!');

        return Command::SUCCESS;
    }

    /**
     * Rebuild documents from storage folder
     */
    private function rebuildDocuments()
    {
        $folder = storage_path('app/public/assets');

        // Create folder if it doesn't exist
        if (! is_dir($folder)) {
            FileFacade::makeDirectory($folder, 0755, true);
            $this->info("Folder created: {$folder}");
        }

        // Check if folder has any files
        $filesInFolder = array_filter(scandir($folder), fn ($f) => ! in_array($f, ['.', '..']) && is_file($folder.DIRECTORY_SEPARATOR.$f));

        if (empty($filesInFolder)) {
            $this->warn('Warning: The assets folder is empty. No documents to rebuild.');

            return 0;
        }

        // Clear out existing records
        Document::truncate();
        $this->warn('Documents table cleared.');

        $countAdded = 0;

        foreach ($filesInFolder as $file) {
            // Generate short name from file
            $shortName = substr(
                preg_replace('/[\(\[].*?[\)\]]/', '', str_replace(' ', '', $file)),
                0,
                30
            );

            // Get file extension
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

            // Insert fresh record with extension
            Document::create([
                'name' => $file,
                'shortname' => $shortName,
                'path' => 'assets/'.$file,
                'description' => $shortName,
                'extension' => $ext,
            ]);

            $this->info("Added document: $file");
            $countAdded++;
        }

        $this->info("Total files added: $countAdded");

        return $countAdded;
    }

    /**
     * Rebuild images from storage folder
     */
    private function rebuildImages()
    {
        $folder = storage_path('app/public/images');

        // Create folder if it doesn't exist
        if (! is_dir($folder)) {
            FileFacade::makeDirectory($folder, 0755, true);
            $this->info("Folder created: {$folder}");
        }

        // Check if folder has any files
        $filesInFolder = array_filter(scandir($folder), fn ($f) => ! in_array($f, ['.', '..']) && is_file($folder.DIRECTORY_SEPARATOR.$f));

        if (empty($filesInFolder)) {
            $this->warn('Warning: The images folder is empty. No images to rebuild.');

            return 0;
        }

        // Clear out existing records
        Image::truncate();
        $this->warn('Images table cleared.');

        $countAdded = 0;

        foreach ($filesInFolder as $file) {
            // Generate short name from file
            $shortName = substr(
                preg_replace('/[\(\[].*?[\)\]]/', '', str_replace(' ', '', $file)),
                0,
                30
            );

            // Get file extension
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

            // Insert fresh record with extension
            Image::create([
                'name' => $file,
                'shortname' => $shortName,
                'path' => 'assets/'.$file,
                'description' => $shortName,
                'extension' => $ext,
            ]);

            $this->info("Added image: $file");
            $countAdded++;
        }

        $this->info("Total files added: $countAdded");

        return $countAdded;
    }

    /**
     * Create a new user with prompts
     */
    private function createUser($isFirstUser = false)
    {
        // Ask for user details
        $name = $this->ask('What is the user\'s name?');
        $email = $this->ask('What is the user\'s email?');

        // Ask for password with confirmation
        $password = null;
        while (true) {
            $password = $this->secret('What is the user\'s password?');
            $confirmPassword = $this->secret('Confirm the user\'s password?');

            if ($password === $confirmPassword) {
                break;
            }

            $this->error('Passwords do not match. Please try again.');
        }

        // Ask if user should be Super Admin
        $isSuperAdmin = $this->confirm('Do you want to add this user to the Super Admin role?', $isFirstUser);

        try {
            // Create the user
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
                'locale' => 'en',
            ]);

            // Only assign role if Super Admin (regular users don't need a role)
            if ($isSuperAdmin) {
                $user->assignRole('Super Admin');
            }

            $this->newLine();
            $this->info('✅ User created successfully!');
            $this->newLine();

            // Get ALL users and display them with their roles
            $allUsers = User::with('roles')->orderBy('id')->get();
            $this->info('👥 All Users in System ('.$allUsers->count().' total):');

            $userData = [];
            foreach ($allUsers as $u) {
                $roleName = $u->roles->first() ? $u->roles->first()->name : 'User';
                $userData[] = [
                    $u->id,
                    $u->name,
                    $u->email,
                    $roleName,
                ];
            }

            $this->table(
                ['ID', 'Name', 'Email', 'Role'],
                $userData
            );

            return;

        } catch (\Exception $e) {
            $this->error('❌ Failed to create user: '.$e->getMessage());

            return;
        }
    }
}
