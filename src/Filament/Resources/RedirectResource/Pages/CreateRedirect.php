<?php

namespace Glorax\FilamentRedirect\Filament\Resources\RedirectResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Glorax\FilamentRedirect\Jobs\GenerateNginxRedirects;
use Glorax\FilamentRedirect\Filament\Resources\RedirectResource;

class CreateRedirect extends CreateRecord
{
    protected static string $resource = RedirectResource::class;

    protected function afterCreate(): void
    {
        dispatch(new GenerateNginxRedirects($this->record))->delay(now()->addSeconds(15));
    }
}