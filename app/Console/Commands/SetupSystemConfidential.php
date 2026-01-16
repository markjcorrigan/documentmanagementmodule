<?php



/**

 * ========================================

 * SYSTEM SETUP COMMAND

 * ========================================

 * Run this command to set up the entire system:

 *

 * php artisan system:setup-confidential

 *

 * ========================================

 */



namespace App\Console\Commands;



use App\Models\Document;

use App\Models\Image;

use App\Models\ProtectedFile;

use App\Models\GuitarScore;

use App\Models\User;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as FileFacade;

use Illuminate\Support\Facades\Storage;



class SetupSystemConfidential extends Command
{
    protected $signature = 'system:setup-confidential {--skip-protected : Skip protected storage sync} {--skip-guitar : Skip guitar scores sync}';

    protected $description = 'Complete system setup with migrations, user creation, and data rebuild (non-interactive)';


    // ===================================

    // 🔐 HARD-CODED CREDENTIALS

    // ===================================

    private const ADMIN_NAME = 'markjc';


    private const ADMIN_EMAIL = 'markjc@mweb.co.za';


    private const ADMIN_PASSWORD = 'Qwerpoiu13971@';


    private const IS_SUPER_ADMIN = true;


    private const ADMIN_AVATAR = 'blogpostnewavatar_marksavatar.jpg';  // Avatar filename in storage/app/public/avatars/


    public function handle()

    {

        $this->info('╔══════════════════════════════════════════════════╗');

        $this->info('║     SYSTEM SETUP & INITIALIZATION (AUTOMATED)    ║');

        $this->info('╚══════════════════════════════════════════════════╝');

        $this->newLine();


        // ===================================

        // ❓ ASK REBUILD PREFERENCES UPFRONT

        // ===================================

        $this->info('------------------------------');

        $this->info('❓ Setup Configuration');

        $this->info('------------------------------');

        $this->newLine();


        $this->warn('⚠️  Note: Fresh database will drop ALL tables and rebuild everything from scratch.');

        $this->warn('   If you want to preserve existing data, choose "no" for fresh setup.');

        $this->newLine();


        // AUTO-CONFIGURATION: FULL REBUILD
        $freshSetup = true;
        $rebuildDocs = true;
        $rebuildImages = true;
        $rebuildProtected = !$this->option('skip-protected');
        $rebuildGuitarScores = !$this->option('skip-guitar');

        $this->info('✅ AUTO-REBUILD MODE: Everything will be rebuilt');
        $this->newLine();


        $this->newLine();


        // ===================================

        // 🔑 GENERATE APPLICATION KEY (FIRST)

        // ===================================

        $this->info('------------------------------');

        $this->info('🔑 Generating application key...');

        $this->info('------------------------------');

        $this->newLine();


        $exitCode = $this->call('key:generate', ['--force' => true]);


        if ($exitCode === 0) {

            $this->info('✅ Application key generated successfully.');

        } else {

            $this->error('❌ Failed to generate application key!');

            return Command::FAILURE;

        }


        $this->newLine();


        // ===================================

        // 🔄 MIGRATE (FRESH OR NORMAL)

        // ===================================

        $this->info('------------------------------');

        if ($freshSetup) {

            $this->info('🔄 Running migrate:fresh...');

        } else {

            $this->info('🔄 Running migrations...');

        }

        $this->info('------------------------------');

        $this->newLine();


        if ($freshSetup) {

            // Run migrate:fresh

            $this->call('migrate:fresh', [

                '--force' => true,

                '--no-interaction' => true

            ]);

        } else {

            // Run normal migration

            $this->call('migrate', [

                '--force' => true,

                '--no-interaction' => true

            ]);

        }


        $this->newLine();

        $this->info('✅ Database migrations completed.');

        $this->newLine();


        // ===================================

        // 👤 CREATE USERS (MUST BE BEFORE SEEDERS)

        // ===================================

        $this->info('------------------------------');

        $this->info('👤 Creating users...');

        $this->info('------------------------------');

        $this->newLine();


        $this->createUser();


        $this->newLine();

        $this->info('✅ Users created successfully.');

        $this->newLine();


        // ===================================

        // 📊 ENSURING VISITOR_LOGS TABLE

        // ===================================

        if ($freshSetup) {

            $this->info('------------------------------');

            $this->info('📊 Ensuring visitor_logs table...');

            $this->info('------------------------------');

            $this->newLine();


            if (!\Illuminate\Support\Facades\Schema::hasTable('visitor_logs')) {

                $this->warn('⚠️  visitor_logs table missing after migrate:fresh');


                try {

                    $this->call('migrate', [

                        '--path' => 'database/migrations/2025_12_09_204103_create_visitor_logs_table.php',

                        '--force' => true,

                        '--no-interaction' => true

                    ]);

                    $this->info('✅ Visitor logs table migrated.');

                } catch (\Exception $e) {

                    $this->error('❌ Failed to create visitor_logs table: ' . $e->getMessage());

                    $this->info('Creating table directly as fallback...');


                    \Illuminate\Support\Facades\Schema::create('visitor_logs', function ($table) {

                        $table->id();

                        $table->string('user_id')->nullable();

                        $table->string('username')->nullable();

                        $table->string('ip_address')->nullable();

                        $table->text('user_agent')->nullable();

                        $table->string('page_url')->nullable();

                        $table->timestamp('connected_at');

                        $table->timestamp('disconnected_at')->nullable();

                        $table->timestamps();

                    });

                    $this->info('✅ visitor_logs table created directly.');

                }

            } else {

                $count = \App\Models\VisitorLog::count();

                $this->info("✅ visitor_logs table exists with {$count} records.");

            }


            $this->newLine();

        }


        // ===================================

        // 🔐 SEED PERMISSIONS (MUST BE FIRST)

        // ===================================

        if ($freshSetup) {

            $this->info('------------------------------');

            $this->info('🔐 Seeding permissions...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('PermissionSeeder');


            $this->newLine();

            $this->info('✅ Permissions seeded successfully.');

            $this->newLine();


            // ===================================

            // 👥 SEED ROLES (AFTER PERMISSIONS)

            // ===================================

            $this->info('------------------------------');

            $this->info('👥 Seeding roles...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('RoleSeeder');


            $this->newLine();

            $this->info('✅ Roles seeded successfully.');

            $this->newLine();


            // ===================================

            // 🔍 SEED SEARCH TABLE

            // ===================================

            $this->info('------------------------------');

            $this->info('🔍 Seeding search table...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('SearchTableSeeder');


            $this->newLine();

            $this->info('✅ Search table seeded successfully.');

            $this->newLine();


            // ===================================

            // 🦸 SEED HEROES

            // ===================================

            $this->info('------------------------------');

            $this->info('🦸 Seeding heroes...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('HeroesSeeder');


            $this->newLine();

            $this->info('✅ Heroes seeded successfully.');

            $this->newLine();


            // ===================================

            // 🛠️ SEED SERVICES

            // ===================================

            $this->info('------------------------------');

            $this->info('🛠️ Seeding services...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('ServiceSeeder');


            $this->newLine();

            $this->info('✅ Services seeded successfully.');

            $this->newLine();


            // ===================================

            // 📄 SEED RESUMES

            // ===================================

            $this->info('------------------------------');

            $this->info('📄 Seeding resumes...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('ResumesSeeder');


            $this->newLine();

            $this->info('✅ Resumes seeded successfully.');

            $this->newLine();


            // ===================================

            // 💪 SEED SKILLS

            // ===================================

            $this->info('------------------------------');

            $this->info('💪 Seeding skills...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('SkillsSeeder');


            $this->newLine();

            $this->info('✅ Skills seeded successfully.');

            $this->newLine();


            // ===================================

            // 🎭 SEED JOKE CATEGORIES

            // ===================================

            $this->info('------------------------------');

            $this->info('🎭 Seeding joke categories...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('JokecatSeeder');


            $this->newLine();

            $this->info('✅ Joke categories seeded successfully.');

            $this->newLine();


            // ===================================

            // 😂 IMPORTING JOKES (WITH PROGRESS)

            // ===================================

            $this->info('------------------------------');

            $this->info('😂 Importing jokes from SQL file...');

            $this->info('------------------------------');

            $this->newLine();


            $this->warn('⏳ This may take a moment for large SQL files...');

            $this->newLine();


            $this->safeSeeder('JokesTableSeeder');


            $this->newLine();

            $this->info('✅ Jokes imported successfully.');

            $this->newLine();


            // ===================================

            // 📚 SEED BLOG POSTS

            // ===================================

            $this->info('------------------------------');

            $this->info('📚 Seeding blog posts...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('BlogPostSeeder');


            $this->newLine();

            $this->info('✅ Blog posts seeded successfully.');


            // SITE SETTINGS SEEDER
            $this->info('------------------------------');
            $this->info('⚙️ Seeding site settings...');
            $this->info('------------------------------');
            $this->newLine();
            $this->safeSeeder('SiteSettingSeeder');
            $this->newLine();
            $this->info('✅ Site settings seeded successfully.');
            $this->newLine();

            $this->newLine();


            // ===================================

            // 📦 SEED SHOP CATEGORIES

            // ===================================

            $this->info('------------------------------');

            $this->info('📦 Seeding shop categories...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('ShopCategorySeeder');


            $this->newLine();

            $this->info('✅ Shop categories seeded successfully.');

            $this->newLine();


            // ===================================

            // 🛍️ SEED SHOP PRODUCTS

            // ===================================

            $this->info('------------------------------');

            $this->info('🛍️ Seeding shop products...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('ShopProductSeeder');


            $this->newLine();

            $this->info('✅ Shop products seeded successfully.');

            $this->newLine();


            // ===================================

            // 📹 SEED VIDEO CATEGORIES

            // ===================================

            $this->info('------------------------------');

            $this->info('📹 Seeding video categories...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('VideosCategorySeeder');


            $this->newLine();

            $this->info('✅ Video categories seeded successfully.');

            $this->newLine();


            // ===================================

            // 🎥 SEED VIDEOS

            // ===================================

            $this->info('------------------------------');

            $this->info('🎥 Seeding videos...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('VideosSeeder');


            $this->newLine();

            $this->info('✅ Videos seeded successfully.');

            $this->newLine();


            // ===================================

            // 📱 SEED CHANNEL CATEGORIES

            // ===================================

            $this->info('------------------------------');

            $this->info('📱 Seeding channel categories...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('ChannelCategorySeeder');


            $this->newLine();

            $this->info('✅ Channel categories seeded successfully.');

            $this->newLine();


            // ===================================

            // 📺 SEED CHANNELS

            // ===================================

            $this->info('------------------------------');

            $this->info('📺 Seeding channels...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('ChannelSeeder');


            $this->newLine();

            $this->info('✅ Channels seeded successfully.');

            $this->newLine();


            // ===================================

            // 📝 SEED BLOG CATEGORIES

            // ===================================

            $this->info('------------------------------');

            $this->info('📝 Seeding blog categories...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('BlogcatSeeder');


            $this->newLine();

            $this->info('✅ Blog categories seeded successfully.');

            $this->newLine();


            // ===================================

            // 🖼️ SEED GALLERY CATEGORIES

            // ===================================

            $this->info('------------------------------');

            $this->info('🖼️ Seeding gallery categories...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('GallerycatSeeder');


            $this->newLine();

            $this->info('✅ Gallery categories seeded successfully.');

            $this->newLine();


            // ===================================

            // 📷 SEED GALLERY ITEMS

            // ===================================

            $this->info('------------------------------');

            $this->info('📷 Seeding gallery items...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('GallerySeeder');


            $this->newLine();

            $this->info('✅ Gallery items seeded successfully.');

            $this->newLine();


            // ===================================

            // ⭐ SEED FAVOURITES

            // ===================================

            $this->info('------------------------------');

            $this->info('⭐ Seeding favourites...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('FavouritesSeeder');


            $this->newLine();

            $this->info('✅ Favourites seeded successfully.');

            $this->newLine();


            // ===================================

            // 🏷️ SEED TAG CATEGORIES

            // ===================================

            $this->info('------------------------------');

            $this->info('🏷️ Seeding tag categories...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('TagcatSeeder');


            $this->newLine();

            $this->info('✅ Tag categories seeded successfully.');

            $this->newLine();


            // ===================================

            // 🎯 SEED TAGS

            // ===================================

            $this->info('------------------------------');

            $this->info('🎯 Seeding tags...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('TagsSeeder');


            $this->newLine();

            $this->info('✅ Tags seeded successfully.');

            $this->newLine();


            // ===================================

            // 🔗 SEED LINK CATEGORIES

            // ===================================

            $this->info('------------------------------');

            $this->info('🔗 Seeding link categories...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('LinkcatSeeder');


            $this->newLine();

            $this->info('✅ Link categories seeded successfully.');

            $this->newLine();


            // ===================================

            // 🌐 SEED LINKS

            // ===================================

            $this->info('------------------------------');

            $this->info('🌐 Seeding links...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('LinksSeeder');


            $this->newLine();

            $this->info('✅ Links seeded successfully.');

            $this->newLine();


            // ===================================

            // 💬 SEED LIVECHAT MESSAGES

            // ===================================

            $this->info('------------------------------');

            $this->info('💬 Seeding LiveChat messages...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('LivechatSeeder');


            $this->newLine();

            $this->info('✅ LiveChat messages seeded successfully.');

            $this->newLine();


            // ===================================

            // 💡 SEED QUOTES

            // ===================================

            $this->info('------------------------------');

            $this->info('💡 Seeding quotes...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('QuoteSeeder');


            $this->newLine();

            $this->info('✅ Quotes seeded successfully.');

            $this->newLine();


            // ===================================

            // 🎵 SEED MUSIC CATEGORIES

            // ===================================

            $this->info('------------------------------');

            $this->info('🎵 Seeding music categories...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('MusicsSeeder');


            $this->newLine();

            $this->info('✅ Music categories seeded successfully.');

            $this->newLine();


            // ===================================

            // 🎼 SEED MUSIC ITEMS

            // ===================================

            $this->info('------------------------------');

            $this->info('🎼 Seeding music items...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('MusicSeeder');


            $this->newLine();

            $this->info('✅ Music items seeded successfully.');

            $this->newLine();


            // ===================================

            // 📄 SEED PAGE CATEGORIES

            // ===================================

            $this->info('------------------------------');

            $this->info('📄 Seeding page categories...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('PagesCategorySeeder');


            $this->newLine();

            $this->info('✅ Page categories seeded successfully.');

            $this->newLine();


            // ===================================

            // 📃 SEED PAGES

            // ===================================

            $this->info('------------------------------');

            $this->info('📃 Seeding pages...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('PageSeeder');


            $this->newLine();

            $this->info('✅ Pages seeded successfully.');

            $this->newLine();


            // ===================================

            // 📰 SEED NEWS CATEGORIES

            // ===================================

            $this->info('------------------------------');

            $this->info('📰 Seeding news categories...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('NewsCategorySeeder');


            $this->newLine();

            $this->info('✅ News categories seeded successfully.');

            $this->newLine();


            // ===================================

            // 📢 SEED NEWS ITEMS

            // ===================================

            $this->info('------------------------------');

            $this->info('📢 Seeding news items...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('NewsSeeder');


            $this->newLine();

            $this->info('✅ News items seeded successfully.');

            $this->newLine();


            // ===================================

            // 📋 SEED DOWNLOAD CATEGORIES

            // ===================================

            $this->info('------------------------------');

            $this->info('📋 Seeding download categories...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('DownloadCategorySeeder');


            $this->newLine();

            $this->info('✅ Download categories seeded successfully.');

            $this->newLine();


            // ===================================

            // ⬇️ SEED DOWNLOADS

            // ===================================

            $this->info('------------------------------');

            $this->info('⬇️ Seeding downloads...');

            $this->info('------------------------------');

            $this->newLine();


            $this->safeSeeder('DownloadSeeder');


            $this->newLine();

            $this->info('✅ Downloads seeded successfully.');

            $this->newLine();

        }


        // ===================================

        // 🔗 CREATE SYMBOLIC LINK

        // ===================================

        $this->info('------------------------------');

        $this->info('🔗 Creating storage symlink...');

        $this->info('------------------------------');

        $this->newLine();


        $storageLinkExists = is_link(public_path('storage'));


        if ($storageLinkExists) {

            $this->info('ℹ️  Storage symlink already exists and is in place.');

        } else {

            Artisan::call('storage:link', ['--force' => true, '--no-interaction' => true]);

            $this->info('✅ Storage symlink has been created successfully.');

            $storageLinkExists = true;

        }

        $this->newLine();


        // Initialize counts

        $documentCount = 0;

        $imageCount = 0;


        // ===================================

        // 📁 REBUILD DOCUMENTS (CONDITIONAL)

        // ===================================

        if ($rebuildDocs) {

            $this->info('------------------------------');

            $this->info('📄 Rebuilding documents...');

            $this->info('------------------------------');

            $this->newLine();


            $documentCount = $this->rebuildDocuments();


            $this->newLine();

            $this->info('✅ Documents rebuild complete. Total in database: ' . $documentCount);

            $this->newLine();

        } else {

            $this->info('------------------------------');

            $this->info('📄 Documents...');

            $this->info('------------------------------');

            $this->newLine();

            $this->warn('⏭️  Skipping documents rebuild (user choice)');

            $documentCount = Document::count();

            $this->info("   Existing records in database: {$documentCount}");

            $this->newLine();

        }


        // ===================================

        // 🖼️ REBUILD IMAGES (CONDITIONAL)

        // ===================================

        if ($rebuildImages) {

            $this->info('------------------------------');

            $this->info('🖼️  Rebuilding images...');

            $this->info('------------------------------');

            $this->newLine();


            $imageCount = $this->rebuildImages();


            $this->newLine();

            $this->info('✅ Images rebuild complete. Total in database: ' . $imageCount);

            $this->newLine();

        } else {

            $this->info('------------------------------');

            $this->info('🖼️  Images...');

            $this->info('------------------------------');

            $this->newLine();

            $this->warn('⏭️  Skipping images rebuild (user choice)');

            $imageCount = Image::count();

            $this->info("   Existing records in database: {$imageCount}");

            $this->newLine();

        }


        // ===================================

        // 🔒 SYNC PROTECTED STORAGE (CONDITIONAL)

        // ===================================

        $protectedFileStats = ['files' => 0, 'folders' => 0, 'total' => 0];


        if ($rebuildProtected && !$this->option('skip-protected')) {

            $this->info('------------------------------');

            $this->info('🔒 Syncing protected storage files...');

            $this->info('------------------------------');

            $this->newLine();


            $this->warn('⏳ This may take several minutes for large directories...');

            $this->newLine();


            $protectedFileStats = $this->syncProtectedStorage();


            $this->newLine();

            $this->info('✅ Protected storage sync complete.');

            $this->info('   Files: ' . $protectedFileStats['files']);

            $this->info('   Folders: ' . $protectedFileStats['folders']);

            $this->info('   Total: ' . $protectedFileStats['total']);

            $this->newLine();

        } else {

            $this->info('------------------------------');

            $this->info('🔒 Protected storage...');

            $this->info('------------------------------');

            $this->newLine();

            $this->warn('⏭️  Skipping protected storage sync (user choice)');


            $existingFiles = ProtectedFile::where('type', 'file')->count();

            $existingFolders = ProtectedFile::where('type', 'folder')->count();

            $existingTotal = ProtectedFile::count();


            $protectedFileStats = [

                'files' => $existingFiles,

                'folders' => $existingFolders,

                'total' => $existingTotal

            ];


            $this->info("   Existing records in database: {$existingTotal} ({$existingFiles} files, {$existingFolders} folders)");

            $this->newLine();

        }


        // ===================================
        // 🎸 SYNC GUITAR SCORES STORAGE
        // ===================================
        $guitarScoreStats = ['files' => 0, 'folders' => 0, 'total' => 0];

        if ($rebuildGuitarScores && !$this->option('skip-guitar')) {
            $this->info('------------------------------');
            $this->info('🎸 Syncing guitar scores...');
            $this->info('------------------------------');
            $this->newLine();

            $this->warn('⏳ This may take several minutes...');
            $this->newLine();

            $guitarScoreStats = $this->syncGuitarScores();

            $this->newLine();
            $this->info('✅ Guitar scores sync complete.');
            $this->info('   Files: ' . $guitarScoreStats['files']);
            $this->info('   Folders: ' . $guitarScoreStats['folders']);
            $this->info('   Total: ' . $guitarScoreStats['total']);
            $this->newLine();
        } else {
            $this->info('------------------------------');
            $this->info('🎸 Guitar scores...');
            $this->info('------------------------------');
            $this->newLine();
            $this->warn('⏭️  Skipping guitar scores sync (user choice)');

            $existingFiles = GuitarScore::where('type', 'file')->count();
            $existingFolders = GuitarScore::where('type', 'folder')->count();
            $existingTotal = GuitarScore::count();

            $guitarScoreStats = [
                'files' => $existingFiles,
                'folders' => $existingFolders,
                'total' => $existingTotal
            ];

            $this->info("   Existing records in database: {$existingTotal} ({$existingFiles} files, {$existingFolders} folders)");
            $this->newLine();
        }


        // ===================================

        // 🔧 SYSTEM MAINTENANCE (AUTOMATIC)

        // ===================================

        $this->info('------------------------------');

        $this->info('🔧 Running system maintenance...');

        $this->info('------------------------------');

        $this->newLine();


        $this->call('system:maintenance', ['--no-interaction' => true]);


        $this->newLine();

        $this->info('✅ System maintenance complete.');

        $this->newLine();


        // ===================================

        // 📊 FINAL RESULTS

        // ===================================

        $this->newLine();

        $this->info('╔══════════════════════════════════════════════════╗');

        $this->info('║            SETUP COMPLETED SUCCESSFULLY          ║');

        $this->info('╚══════════════════════════════════════════════════╝');

        $this->newLine();

        $this->info('📊 Summary:');


        // Get Blog Posts count

        $blogpostsCount = \App\Models\BlogPost::count();


        // Get joke counts

        $jokeCategoryCount = \App\Models\Jokecat::count();

        $jokeCount = \App\Models\Joke::count();


        $setupMode = $freshSetup ? '✅ Fresh Setup' : '⚠️  Partial Rebuild';

        $storageLinkStatus = $storageLinkExists ? '✅ Verified' : '⚠️  Not created';


        $documentStatus = $rebuildDocs

            ? ($documentCount > 0 ? "✅ {$documentCount} rebuilt" : '⚠️  None found')

            : "⏭️  Skipped ({$documentCount} existing)";


        $imageStatus = $rebuildImages

            ? ($imageCount > 0 ? "✅ {$imageCount} rebuilt" : '⚠️  None found')

            : "⏭️  Skipped ({$imageCount} existing)";


        $protectedStorageStatus = $rebuildProtected

            ? ($protectedFileStats['total'] > 0 ? "✅ {$protectedFileStats['files']} files, {$protectedFileStats['folders']} folders" : '⚠️  Empty')

            : "⏭️  Skipped ({$protectedFileStats['total']} existing)";

        $guitarScoresStatus = $rebuildGuitarScores

            ? ($guitarScoreStats['total'] > 0 ? "✅ {$guitarScoreStats['files']} files, {$guitarScoreStats['folders']} folders" : '⚠️  Empty')

            : "⏭️  Skipped ({$guitarScoreStats['total']} existing)";


        $blogpostStatus = $blogpostsCount > 0 ? "✅ {$blogpostsCount} processed" : '⚠️  None found';

        $jokeCategoryStatus = $jokeCategoryCount > 0 ? "✅ {$jokeCategoryCount} categories" : '⚠️  None found';

        $jokeStatus = $jokeCount > 0 ? "✅ {$jokeCount} jokes" : '⚠️  None found';


        // Get visitor logs status

        $visitorLogsExists = \Illuminate\Support\Facades\Schema::hasTable('visitor_logs');

        $visitorLogsCount = $visitorLogsExists ? \App\Models\VisitorLog::count() : 0;

        $visitorLogsStatus = $visitorLogsExists ?

            ($visitorLogsCount > 0 ? "✅ {$visitorLogsCount} records" : "✅ Table ready") :

            '❌ Missing';


        $this->table(

            ['Task', 'Status'],

            [

                ['Setup Mode', $setupMode],

                ['Application Key', '✅ Generated'],

                ['Database Migration', '✅ Completed'],

                ['Joke Categories', $jokeCategoryStatus],

                ['Blog Posts', $blogpostStatus],

                ['Jokes Imported', $jokeStatus],

                ['Users Created', $freshSetup ? '✅ 3 Users (Mark, Jo, Jane)' : '⏭️  Skipped (existing)'],

                ['Storage Link', $storageLinkStatus],

                ['Documents', $documentStatus],

                ['Images', $imageStatus],

                ['Protected Storage', $protectedStorageStatus],

                ['Guitar Scores', $guitarScoresStatus],

                ['Visitor Logs', $visitorLogsStatus],

                ['System Maintenance', '✅ Completed'],

            ]

        );

        $this->newLine();

        // ===================================
        // 📋 SEEDERS EXECUTED
        // ===================================
        if ($freshSetup) {
            $this->info('📋 Seeders Executed (in order):');
            $this->newLine();
            
            $seeders = [
                '1. PermissionSeeder - Permissions and access controls',
                '2. RoleSeeder - User roles (Super Admin, LiveChat, etc.)',
                '3. SearchTableSeeder - Search functionality setup',
                '4. HeroesSeeder - Hero/banner content',
                '5. ServiceSeeder - Services data',
                '6. ResumesSeeder - Resume/CV information',
                '7. SkillsSeeder - Skills database',
                '8. JokecatSeeder - Joke categories',
                '9. JokesTableSeeder - Jokes (from SQL file)',
                '10. BlogPostSeeder - Blog posts content',
                '11. SiteSettingSeeder - Site configuration settings',
                '12. ShopCategorySeeder - Shop categories',
                '13. ShopProductSeeder - Shop products',
                '14. VideosCategorySeeder - Video categories',
                '15. VideosSeeder - Video content',
                '16. ChannelCategorySeeder - Channel categories',
                '17. ChannelSeeder - Channel data',
                '18. BlogcatSeeder - Blog categories',
                '19. GallerycatSeeder - Gallery categories',
                '20. GallerySeeder - Gallery items',
                '21. FavouritesSeeder - User favourites',
                '22. TagcatSeeder - Tag categories',
                '23. TagsSeeder - Tags',
                '24. LinkcatSeeder - Link categories',
                '25. LinksSeeder - Links',
                '26. LivechatSeeder - Live chat messages',
                '27. QuoteSeeder - Quotes',
                '28. MusicsSeeder - Music categories',
                '29. MusicSeeder - Music items',
                '30. PagesCategorySeeder - Page categories',
                '31. PageSeeder - Pages',
                '32. NewsCategorySeeder - News categories',
                '33. NewsSeeder - News items',
                '34. DownloadCategorySeeder - Download categories',
                '35. DownloadSeeder - Download items',
            ];
            
            foreach ($seeders as $seeder) {
                $this->line('   ' . $seeder);
            }
            
            $this->newLine();
        }

        $this->info('🎉 Your system is ready to use!');

        $this->info('🔐 Login with: ' . self::ADMIN_EMAIL);


        return Command::SUCCESS;

    }


    /**
     * Sync protected storage files with database (with batching to prevent hangs)
     */

    private function syncProtectedStorage()

    {

        try {

            $this->info('🔍 Starting protected storage sync...');


            // Check if protected storage directory exists

            $protectedPath = storage_path('app/protected');

            $this->info("📍 Checking path: {$protectedPath}");


            if (!is_dir($protectedPath)) {

                $this->warn('⚠️  Protected storage directory does not exist. Creating it...');

                FileFacade::makeDirectory($protectedPath, 0755, true);

                $this->info("✅ Created directory: {$protectedPath}");


                return [

                    'files' => 0,

                    'folders' => 0,

                    'total' => 0,

                ];

            }


            $this->info("✅ Directory exists: {$protectedPath}");


            // Clear existing records for fresh sync

            $existingCount = ProtectedFile::count();

            if ($existingCount > 0) {

                ProtectedFile::truncate();

                $this->info("🗑️  Cleared {$existingCount} existing protected files records.");

            }


            // Check if 'protected' disk is configured

            try {

                $disk = Storage::disk('protected');

                $this->info('✅ Protected disk configured');

            } catch (\Exception $e) {

                $this->error('❌ Protected disk not configured: ' . $e->getMessage());

                return [

                    'files' => 0,

                    'folders' => 0,

                    'total' => 0,

                ];

            }


            // Get all files and directories recursively

            $this->info('🔎 Scanning for files and directories...');


            $allFiles = $disk->allFiles();

            $allDirectories = $disk->allDirectories();


            $this->info("📊 Storage scan results:");

            $this->info("   Files found: " . count($allFiles));

            $this->info("   Directories found: " . count($allDirectories));


            if (count($allFiles) === 0 && count($allDirectories) === 0) {

                $this->warn('⚠️  No files or folders found in protected storage.');

                return [

                    'files' => 0,

                    'folders' => 0,

                    'total' => 0,

                ];

            }


            $totalItems = count($allDirectories) + count($allFiles);

            $this->info("📦 Total items to process: {$totalItems}");

            $this->newLine();


            $processedDirs = 0;

            $processedFiles = 0;

            $errors = [];


            // Process directories in batches

            $this->info('📁 Processing directories...');

            $dirBatchSize = 50;

            $dirBatches = array_chunk($allDirectories, $dirBatchSize);


            foreach ($dirBatches as $batchIndex => $dirBatch) {

                $batchNum = $batchIndex + 1;

                $totalBatches = count($dirBatches);

                $this->info("   Batch {$batchNum}/{$totalBatches} (directories)...");


                foreach ($dirBatch as $directory) {

                    try {

                        $this->syncDirectory($directory, $disk);

                        $processedDirs++;

                    } catch (\Exception $e) {

                        $errors[] = "Directory {$directory}: " . $e->getMessage();

                    }

                }


                // Show progress

                $percent = round(($processedDirs / count($allDirectories)) * 100);

                $this->info("   Progress: {$processedDirs}/" . count($allDirectories) . " directories ({$percent}%)");

            }


            $this->newLine();

            $this->info('📄 Processing files...');


            // Process files in batches

            $fileBatchSize = 100;

            $fileBatches = array_chunk($allFiles, $fileBatchSize);


            foreach ($fileBatches as $batchIndex => $fileBatch) {

                $batchNum = $batchIndex + 1;

                $totalBatches = count($fileBatches);

                $this->info("   Batch {$batchNum}/{$totalBatches} (files)...");


                foreach ($fileBatch as $file) {

                    try {

                        $this->syncFile($file, $disk);

                        $processedFiles++;

                    } catch (\Exception $e) {

                        $errors[] = "File {$file}: " . $e->getMessage();

                    }

                }


                // Show progress

                $percent = round(($processedFiles / count($allFiles)) * 100);

                $this->info("   Progress: {$processedFiles}/" . count($allFiles) . " files ({$percent}%)");

            }


            $this->newLine();


            // Show any errors

            if (count($errors) > 0) {

                $this->warn('⚠️  Some items had errors:');

                foreach (array_slice($errors, 0, 10) as $error) {

                    $this->warn("   {$error}");

                }

                if (count($errors) > 10) {

                    $this->warn("   ... and " . (count($errors) - 10) . " more errors");

                }

            }


            // Get final counts from database

            $fileCount = ProtectedFile::where('type', 'file')->count();

            $folderCount = ProtectedFile::where('type', 'folder')->count();

            $totalCount = ProtectedFile::count();


            $this->info("✅ Sync summary:");

            $this->info("   Directories processed: {$processedDirs}");

            $this->info("   Files processed: {$processedFiles}");

            $this->info("   Total in database: {$totalCount}");


            return [

                'files' => $fileCount,

                'folders' => $folderCount,

                'total' => $totalCount,

            ];


        } catch (\Exception $e) {

            $this->error('❌ Failed to sync protected storage: ' . $e->getMessage());

            $this->error('Stack trace: ' . $e->getTraceAsString());


            return [

                'files' => 0,

                'folders' => 0,

                'total' => 0,

            ];

        }

    }


    /**
     * Sync a directory to the database
     */

    private function syncDirectory($path, $disk)

    {

        $name = basename($path);

        $parentPath = dirname($path);

        if ($parentPath === '.') {

            $parentPath = null;

        }


        $resource = explode('/', $path)[0] ?? null;


        ProtectedFile::create([

            'name' => $name,

            'path' => $path,

            'parent_path' => $parentPath,

            'type' => 'folder',

            'resource' => $resource,

            'file_modified_at' => now(),

        ]);

    }


    /**
     * Sync a file to the database
     */

    private function syncFile($path, $disk)

    {

        $name = basename($path);

        $parentPath = dirname($path);

        if ($parentPath === '.') {

            $parentPath = null;

        }


        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));

        $size = $disk->size($path);

        $resource = explode('/', $path)[0] ?? null;


        $mimeTypes = ProtectedFile::mimeTypes();

        $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';


        ProtectedFile::create([

            'name' => $name,

            'path' => $path,

            'parent_path' => $parentPath,

            'type' => 'file',

            'extension' => $extension,

            'mime_type' => $mimeType,

            'size' => $size,

            'resource' => $resource,

            'file_modified_at' => \Carbon\Carbon::createFromTimestamp($disk->lastModified($path)),

        ]);

    }

    private function rebuildDocuments()
    {
        $folder = storage_path('app/public/assets');

        if (!is_dir($folder)) {
            FileFacade::makeDirectory($folder, 0755, true);
            $this->info("Folder created: {$folder}");
        }

        $filesInFolder = array_filter(
            scandir($folder),
            fn($f) => !in_array($f, ['.', '..']) && is_file($folder . DIRECTORY_SEPARATOR . $f)
        );

        $this->info("📂 Found " . count($filesInFolder) . " files in assets folder");
        $this->newLine();

        // STEP 1: Remember which files were soft-deleted BEFORE clearing
        $this->info("📋 Checking for soft-deleted documents...");
        $softDeletedFiles = Document::onlyTrashed()->pluck('name')->toArray();
        $softDeletedCount = count($softDeletedFiles);

        if ($softDeletedCount > 0) {
            $this->warn("   Found {$softDeletedCount} soft-deleted documents that will be preserved");
        } else {
            $this->info("   No soft-deleted documents found");
        }
        $this->newLine();

        // Get current counts
        $activeCount = Document::count();
        $trashedCount = Document::onlyTrashed()->count();
        $totalCount = Document::withTrashed()->count();

        $this->warn("Current database state:");
        $this->warn("  Active documents: {$activeCount}");
        $this->warn("  Soft-deleted documents: {$trashedCount}");
        $this->warn("  Total in database: {$totalCount}");
        $this->newLine();

        // STEP 2: Complete wipe of table - USE RAW DB QUERY
        $this->warn("🗑️  Clearing documents table completely...");

        // THE FIX: Use raw DB truncate which bypasses soft deletes entirely
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('documents')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->info("✅ Documents table cleared");

        // Verify it's truly empty
        $remaining = DB::table('documents')->count();
        $this->info("   Verified - remaining records: {$remaining}");
        $this->newLine();

        if (empty($filesInFolder)) {
            $this->warn('⚠️  The assets folder is empty. No documents to rebuild.');
            return 0;
        }

        // Track used shortnames to ensure uniqueness
        $usedShortnames = [];
        $restoredSoftDeletes = 0;
        $newActiveRecords = 0;

        // BATCH PROCESSING for performance
        $batchSize = 100;
        $fileBatches = array_chunk($filesInFolder, $batchSize);
        $countAdded = 0;
        $totalFiles = count($filesInFolder);

        $this->info("📄 Rebuilding from {$totalFiles} physical files...");
        $this->newLine();

        foreach ($fileBatches as $batchIndex => $fileBatch) {
            $batchNum = $batchIndex + 1;
            $totalBatches = count($fileBatches);
            $percent = round(($batchNum / $totalBatches) * 100);
            $this->info("   Batch {$batchNum}/{$totalBatches} ({$percent}%)");

            foreach ($fileBatch as $file) {
                // Generate base shortname
                $baseShortName = substr(
                    preg_replace('/[\(\[].*?[\)\]]/', '', str_replace(' ', '', $file)),
                    0,
                    30
                );

                // Make shortname unique
                $shortName = $baseShortName;
                $counter = 1;
                while (in_array($shortName, $usedShortnames)) {
                    $shortName = substr($baseShortName, 0, 27) . '_' . $counter;
                    $counter++;
                }
                $usedShortnames[] = $shortName;

                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

                // STEP 3: Check if this file was soft-deleted before
                $wasSoftDeleted = in_array($file, $softDeletedFiles);

                // Create the record
                $document = Document::create([
                    'name' => $file,
                    'shortname' => $shortName,
                    'path' => 'storage/assets/' . $file,
                    'description' => $shortName,
                    'extension' => $ext,
                ]);

                // STEP 4: If it was soft-deleted before, soft-delete it again
                if ($wasSoftDeleted) {
                    $document->delete(); // Soft delete
                    $restoredSoftDeletes++;
                } else {
                    $newActiveRecords++;
                }

                $countAdded++;
            }
        }

        $this->newLine();
        $this->info("✅ Rebuild complete!");
        $this->info("   Total documents processed: {$countAdded}");
        $this->info("   Active documents: {$newActiveRecords}");
        $this->info("   Soft-deleted documents (preserved): {$restoredSoftDeletes}");

        return $countAdded;
    }

    private function rebuildImages()

    {
        $folder = storage_path('app/public/images');

        if (!is_dir($folder)) {
            FileFacade::makeDirectory($folder, 0755, true);
            $this->info("Folder created: {$folder}");
        }

        $filesInFolder = array_filter(scandir($folder), fn($f) => !in_array($f, ['.', '..']) && is_file($folder . DIRECTORY_SEPARATOR . $f));

        if (empty($filesInFolder)) {
            $this->warn('Warning: The images folder is empty. No images to rebuild.');
            return 0;
        }

        Image::truncate();
        $this->warn('Images table cleared.');
        $this->newLine();

        // BATCH PROCESSING for performance
        $batchSize = 100;
        $fileBatches = array_chunk($filesInFolder, $batchSize);
        $countAdded = 0;
        $totalFiles = count($filesInFolder);

        $this->info("🖼️ Processing {$totalFiles} images in batches...");
        $this->newLine();

        foreach ($fileBatches as $batchIndex => $fileBatch) {
            $batchNum = $batchIndex + 1;
            $totalBatches = count($fileBatches);
            $percent = round(($batchNum / $totalBatches) * 100);
            $this->info("   Batch {$batchNum}/{$totalBatches} ({$percent}%)...");

            foreach ($fileBatch as $file) {
                $shortName = substr(
                    preg_replace('/[\(\[].*?[\)\]]/', '', str_replace(' ', '', $file)),
                    0,
                    255
                );

                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

                Image::create([
                    'name' => $file,
                    'shortname' => $shortName,
                    'path' => 'images/' . $file,
                    'description' => $shortName,
                    'extension' => $ext,
                ]);

                $countAdded++;
            }
        }

        $this->newLine();
        $this->info("✅ Total images added: {$countAdded}");

        return $countAdded;
    }

    private function createUser()

    {

        try {

            // ===================================

            // 🔑 SEED PERMISSIONS FIRST

            // ===================================

            $this->info('🔑 Seeding permissions...');

            $this->safeSeeder('PermissionSeeder');

            $this->info('✅ Permissions seeded.');

            $this->newLine();


            // ===================================

            // 🎭 SETUP ROLES WITH PERMISSIONS

            // ===================================

            $this->info('🎭 Setting up roles...');


            // Super Admin gets ALL permissions

            $superAdminRole = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'Super Admin']);

            $superAdminRole->syncPermissions(\Spatie\Permission\Models\Permission::all());


            // LiveChat gets ONLY "live chat" permission

            $liveChatRole = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'LiveChat']);

            $liveChatPermission = \Spatie\Permission\Models\Permission::where('name', 'live chat')->first();

            if ($liveChatPermission) {

                $liveChatRole->syncPermissions([$liveChatPermission]);

            }


            $this->info('✅ Roles configured.');

            $this->newLine();


            // ===================================

            // 👤 CREATE USERS

            // ===================================

            $avatarToUse = self::ADMIN_AVATAR;


            // CREATE MARK (Super Admin)

            $mark = User::updateOrCreate(
                ['email' => self::ADMIN_EMAIL],
                [
                    'name' => self::ADMIN_NAME,
                    'password' => bcrypt(self::ADMIN_PASSWORD),
                    'avatar' => $avatarToUse,
                    'locale' => 'en',
                    'email_verified_at' => now(),
                ]
            );


            // CREATE JO (LiveChat)

            $jo = User::updateOrCreate(
                ['email' => 'jo@jo.co.za'],
                [
                    'name' => 'Jo',
                    'password' => bcrypt('password123'),
                    'avatar' => 'blogpostnewavatar_no-img-avatar.jpg',
                    'locale' => 'en',
                    'email_verified_at' => now(),
                ]
            );


            // CREATE JANE (Regular user)

            $jane = User::updateOrCreate(
                ['email' => 'jane@jane.co.za'],
                [
                    'name' => 'Jane',
                    'password' => bcrypt('password123'),
                    'avatar' => 'blogpostnewavatar_no-img-avatar.jpg',
                    'locale' => 'en',
                    'email_verified_at' => now(),
                ]
            );


            // ===================================

            // 🎭 ASSIGN ROLES TO USERS

            // ===================================

            $mark->assignRole($superAdminRole);

            $jo->assignRole($liveChatRole);

            // jane gets no role


            $this->info('✅ Users created and roles assigned.');

            $this->newLine();


            // ===================================

            // 📊 DISPLAY RESULTS

            // ===================================

            $users = [

                [

                    $mark->id,

                    $mark->name,

                    $mark->email,

                    $mark->roles->pluck('name')->join(', '),

                    $mark->getAllPermissions()->count() . ' perms',

                    $mark->avatar,

                ],

                [

                    $jo->id,

                    $jo->name,

                    $jo->email,

                    $jo->roles->pluck('name')->join(', '),

                    $jo->getAllPermissions()->count() . ' perms',

                    $jo->avatar,

                ],

                [

                    $jane->id,

                    $jane->name,

                    $jane->email,

                    $jane->roles->pluck('name')->join(', ') ?: 'No role',

                    $jane->getAllPermissions()->count() . ' perms',

                    $jane->avatar,

                ],

            ];


            $this->table(

                ['ID', 'Name', 'Email', 'Roles', 'Permissions', 'Avatar'],

                $users

            );


            $this->newLine();


        } catch (\Exception $e) {

            $this->error('❌ Failed to create users: ' . $e->getMessage());

            $this->error('Stack trace: ' . $e->getTraceAsString());

        }

    }


    /**
     * Safely run a seeder - skip if it doesn't exist
     */

    private function safeSeeder($seederClass, $description = null)

    {

        $description = $description ?? $seederClass;


        try {

            // Check if the seeder class exists

            $fullClassName = "Database\\Seeders\\{$seederClass}";

            if (!class_exists($fullClassName)) {

                $this->warn("⚠️  Seeder not found: {$seederClass} - skipping");

                return false;

            }


            $this->call('db:seed', ['--class' => $seederClass, '--force' => true]);

            return true;

        } catch (\Exception $e) {

            $this->error("❌ Failed to run {$seederClass}: " . $e->getMessage());

            $this->warn("Continuing with next seeder...");

            return false;

        }
    }


    /**
     * Sync Guitar Scores Storage
     */
    private function syncGuitarScores()
    {
        try {
            $this->info('🔍 Starting guitar scores sync...');

            // Check if guitar scores directory exists
            $guitarPath = storage_path('app/protectedGuitar');
            $this->info("📍 Checking path: {$guitarPath}");

            if (!is_dir($guitarPath)) {
                $this->warn('⚠️  Guitar scores directory does not exist. Creating it...');
                FileFacade::makeDirectory($guitarPath, 0755, true);
                $this->info("✅ Created directory: {$guitarPath}");

                return [
                    'files' => 0,
                    'folders' => 0,
                    'total' => 0,
                ];
            }

            $this->info("✅ Directory exists: {$guitarPath}");

            // Clear existing records for fresh sync
            $existingCount = GuitarScore::count();
            if ($existingCount > 0) {
                GuitarScore::truncate();
                $this->info("🗑️  Cleared {$existingCount} existing guitar score records.");
            }

            // Check if 'protectedGuitar' disk is configured
            try {
                $disk = Storage::disk('protectedGuitar');
                $this->info('✅ ProtectedGuitar disk configured');
            } catch (\Exception $e) {
                $this->error('❌ ProtectedGuitar disk not configured: ' . $e->getMessage());
                return [
                    'files' => 0,
                    'folders' => 0,
                    'total' => 0,
                ];
            }

            // Get all files and directories recursively
            $this->info('🔎 Scanning for files and directories...');

            $allFiles = $disk->allFiles();
            $allDirectories = $disk->allDirectories();

            $this->info("📊 Guitar scores scan results:");
            $this->info("   Files found: " . count($allFiles));
            $this->info("   Directories found: " . count($allDirectories));

            if (count($allFiles) === 0 && count($allDirectories) === 0) {
                $this->warn('⚠️  No files or folders found in guitar scores directory.');
                return [
                    'files' => 0,
                    'folders' => 0,
                    'total' => 0,
                ];
            }

            $totalItems = count($allDirectories) + count($allFiles);
            $this->info("📦 Total items to process: {$totalItems}");
            $this->newLine();

            $processedDirs = 0;
            $processedFiles = 0;
            $errors = [];

            // Process directories in batches
            $this->info('📁 Processing directories...');
            $dirBatchSize = 50;
            $dirBatches = array_chunk($allDirectories, $dirBatchSize);

            foreach ($dirBatches as $batchIndex => $dirBatch) {
                $batchNum = $batchIndex + 1;
                $totalBatches = count($dirBatches);
                $this->info("   Batch {$batchNum}/{$totalBatches} (directories)...");

                foreach ($dirBatch as $directory) {
                    try {
                        $this->syncGuitarDirectory($directory, $disk);
                        $processedDirs++;
                    } catch (\Exception $e) {
                        $errors[] = "Directory {$directory}: " . $e->getMessage();
                    }
                }

                // Show progress
                $percent = round(($processedDirs / count($allDirectories)) * 100);
                $this->info("   Progress: {$processedDirs}/" . count($allDirectories) . " directories ({$percent}%)");
            }

            $this->newLine();
            $this->info('📄 Processing files...');

            // Process files in batches
            $fileBatchSize = 100;
            $fileBatches = array_chunk($allFiles, $fileBatchSize);

            foreach ($fileBatches as $batchIndex => $fileBatch) {
                $batchNum = $batchIndex + 1;
                $totalBatches = count($fileBatches);
                $this->info("   Batch {$batchNum}/{$totalBatches} (files)...");

                foreach ($fileBatch as $file) {
                    try {
                        $this->syncGuitarFile($file, $disk);
                        $processedFiles++;
                    } catch (\Exception $e) {
                        $errors[] = "File {$file}: " . $e->getMessage();
                    }
                }

                // Show progress
                $percent = round(($processedFiles / count($allFiles)) * 100);
                $this->info("   Progress: {$processedFiles}/" . count($allFiles) . " files ({$percent}%)");
            }

            $this->newLine();

            // Show any errors
            if (count($errors) > 0) {
                $this->warn('⚠️  Some items had errors:');
                foreach (array_slice($errors, 0, 10) as $error) {
                    $this->warn("   {$error}");
                }
                if (count($errors) > 10) {
                    $this->warn("   ... and " . (count($errors) - 10) . " more errors");
                }
            }

            // Get final counts from database
            $fileCount = GuitarScore::where('type', 'file')->count();
            $folderCount = GuitarScore::where('type', 'folder')->count();
            $totalCount = GuitarScore::count();

            $this->info("✅ Sync summary:");
            $this->info("   Directories processed: {$processedDirs}");
            $this->info("   Files processed: {$processedFiles}");
            $this->info("   Total in database: {$totalCount}");

            return [
                'files' => $fileCount,
                'folders' => $folderCount,
                'total' => $totalCount,
            ];

        } catch (\Exception $e) {
            $this->error('❌ Failed to sync guitar scores: ' . $e->getMessage());
            $this->error('Stack trace: ' . $e->getTraceAsString());

            return [
                'files' => 0,
                'folders' => 0,
                'total' => 0,
            ];
        }
    }

    /**
     * Sync a guitar directory to the database
     */
    private function syncGuitarDirectory($path, $disk)
    {
        $name = basename($path);
        $parentPath = dirname($path);

        // Set parent_path to null only for root-level directories
        if ($parentPath === '.' || $parentPath === '' || $parentPath === $path) {
            $parentPath = null;
        }

        // Use DB::table() to bypass mass assignment protection
        DB::table('guitar_scores')->insert([
            'name' => $name,
            'path' => $path,
            'parent_path' => $parentPath,
            'type' => 'folder',
            'extension' => null,
            'mime_type' => null,
            'size' => null,
            'file_modified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Sync a guitar file to the database
     */
    private function syncGuitarFile($path, $disk)
    {
        $name = basename($path);
        $parentPath = dirname($path);

        // Set parent_path to null only for root-level files
        if ($parentPath === '.' || $parentPath === '' || $parentPath === $path) {
            $parentPath = null;
        }

        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));

        // Skip non-relevant file types
        if (!in_array($extension, ['mp3', 'mp4', 'pdf', 'jpg', 'jpeg', 'png', 'gif', 'gp'])) {
            return;
        }

        $size = $disk->size($path);

        $mimeTypes = [
            'mp3' => 'audio/mpeg',
            'mp4' => 'video/mp4',
            'pdf' => 'application/pdf',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'gp' => 'application/octet-stream',
        ];

        $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';

        // Use DB::table() to bypass mass assignment protection
        DB::table('guitar_scores')->insert([
            'name' => $name,
            'path' => $path,
            'parent_path' => $parentPath,  // ← This will NOW be saved!
            'type' => 'file',
            'extension' => $extension,
            'mime_type' => $mimeType,
            'size' => $size,
            'file_modified_at' => \Carbon\Carbon::createFromTimestamp($disk->lastModified($path)),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}