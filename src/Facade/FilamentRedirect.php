<?php

namespace Glorax\FilamentRedirect\Facade;

use Illuminate\Support\Facades\Facade;

class FilamentRedirect extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-redirect';
    }
}
