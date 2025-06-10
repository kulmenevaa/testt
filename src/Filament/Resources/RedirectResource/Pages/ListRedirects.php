<?php 

namespace Glorax\FilamentRedirect\Filament\Resources\RedirectResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Glorax\FilamentRedirect\Filament\Resources\RedirectResource;

class ListRedirects extends ListRecords
{
    protected static string $resource = RedirectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}