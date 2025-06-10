<?php

namespace Glorax\FilamentRedirect\Filament\Resources;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Glorax\FilamentRedirect\Filament\Resources\RedirectResource\Pages;

class RedirectResource extends Resource
{
    protected static bool $isScopedToTenant = false;

    protected static ?string $title = 'Редирект';

    public static function getModel(): string
    {
        return config('filament-redirect::model');
    }

    public static function getNavigationLabel(): string
    {
        return trans('filament-redirect::messages.interface.title');
    }

    public static function getLabel(): ?string
    {
        return trans('filament-redirect::messages.interface.single');
    }

    public static function getPluralModelLabel(): string
    {
        return trans('filament-redirect::messages.interface.plural');
    }

    public static function getNavigationGroup(): ?string
    {
        return trans('filament-redirect::messages.interface.group');
    }

    public static function getNavigationIcon(): ?string
    {
        return trans('filament-redirect::messages.interface.icon');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

            ])
            ->defaultPaginationPageOption(12)
            ->paginationPageOptions([
                "12",
                "24",
                "48",
                "96",
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRedirects::route('/'),
            'create' => Pages\CreateRedirect::route('/create'),
            'edit' => Pages\EditRedirect::route('/{record}/edit'),
            'view' => Pages\ViewRedirect::route('/{record}'),
        ];
    }
}