<?php

namespace Glorax\FilamentRedirect\Filament\Resources\RedirectResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Glorax\FilamentRedirect\Filament\Resources\RedirectResource;

class ViewRedirect extends ViewRecord
{
    protected static string $resource = RedirectResource::class;

    public function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make()
        ];
    }
}