<?php

namespace Glorax\FilamentRedirect\Filament\Resources\RedirectResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Glorax\FilamentRedirect\Filament\Resources\RedirectResource;

class EditRedirect extends EditRecord
{
    protected static string $resource = RedirectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}