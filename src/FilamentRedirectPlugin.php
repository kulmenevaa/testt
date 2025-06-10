<?php

namespace Glorax\FilamentRedirect;

use Filament\Panel;
use Filament\Contracts\Plugin;
use Glorax\FilamentRedirect\Filament\Resources\RedirectResource;

class FilamentRedirectPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-redirect';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            RedirectResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return new static();
    }
}
