/*
|--------------------------------------------------------------------------
| DOCUMENTS MODULE - Filesystem Configuration
|--------------------------------------------------------------------------
| Add this configuration to your config/filesystems.php file
| Place it inside the 'disks' array
|--------------------------------------------------------------------------
*/

'public_assets' => [
    'driver' => 'local',
    'root' => storage_path('app/public/assets'),
    'url' => env('APP_URL').'/storage/assets',
    'visibility' => 'public',
    'throw' => false,
],

/*
|--------------------------------------------------------------------------
| USAGE EXAMPLE:
|--------------------------------------------------------------------------
| 
| Your config/filesystems.php should look like this:
|
| 'disks' => [
|     'local' => [
|         'driver' => 'local',
|         'root' => storage_path('app'),
|     ],
|
|     'public' => [
|         'driver' => 'local',
|         'root' => storage_path('app/public'),
|         'url' => env('APP_URL').'/storage',
|         'visibility' => 'public',
|     ],
|
|     'public_assets' => [
|         'driver' => 'local',
|         'root' => storage_path('app/public/assets'),
|         'url' => env('APP_URL').'/storage/assets',
|         'visibility' => 'public',
|         'throw' => false,
|     ],
|
|     // ... other disks ...
| ],
|
|--------------------------------------------------------------------------
*/
