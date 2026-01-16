# Cache Clear Commands

## Daily Use (Safe)
php artisan optimize:clear && php artisan optimize

## Nuclear (Safe - Keeps Sessions)
rm -rf bootstrap/cache/*.php storage/framework/cache/data/* storage/framework/views/* && php artisan optimize:clear && php artisan optimize

## Full Nuclear (Includes Sessions - Use Sparingly)
rm -rf bootstrap/cache/*.php storage/framework/cache/data/* storage/framework/views/* storage/framework/sessions/* && php artisan optimize:clear && php artisan optimize

## XAMPP Restart Required After:
- Any cache changes that seem stuck
- After deleting bootstrap/cache files
- When PHP opcache is involved