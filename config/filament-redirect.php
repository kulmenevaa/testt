<?php

return [
    'model' => env('FILAMENT_MODEL', \Glorax\FilamentRedirect\Models\Redirect::class),
    
    'default_storage_disk' => env('FILAMENT_REDIRECT_DISK', 'local'),
];