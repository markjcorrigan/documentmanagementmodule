
php artisan queue:restart
php artisan route:clear
php artisan view:clear
php artisan optimize:clear
php artisan cache:clear
php artisan config:cache
php artisan livewire:discover
php artisan optimize
composer dump-autoload -o

/**
* My Clean Laravel Code
*/


Here are a few ways to trigger the cache rebuild:

1. Access your application: Simply access your application in the browser. Laravel will rebuild the cache files as needed.
2. Run the cache commands again: You can run the cache commands again to rebuild the cache structure:
bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
These commands will rebuild the cache files for the configuration, routes, and views.
3. Run the optimize command: You can also run the optimize command to rebuild the cache structure:
bash
php artisan optimize


blog_posts table
Schema::create('blog_posts', function (Blueprint $table) {
$table->id();
$table->foreignId('user_id')->constrained()->onDelete('cascade'); OK
$table->string('post_title');
$table->longText('post_description');
$table->string('post_slug'); OK
$table->string('photo')->nullable(); OK
$table->string('post_tags'); OK
$table->boolean('approved')->default(false); OK
$table->timestamps();
});


posts table
Schema::create('posts', function (Blueprint $table) {
$table->id();
$table->string('title');
$table->longText('body');
$table->string('post_slug'); OK
$table->string('photo')->nullable(); OK
$table->string('post_tags'); OK
$table->boolean('approved')->default(false); OK
$table->foreignId('user_id')->constrained()->onDelete('cascade'); OK
$table->timestamps();

{{ vite('resources/css/app.css') }}
{{ vite('resources/js/app.js') }}
