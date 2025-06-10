<?php

namespace Glorax\FilamentRedirect\Filament\Resources;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Glorax\FilamentRedirect\Enums\CodeEnum;
use Glorax\FilamentRedirect\Filament\Resources\RedirectResource\Pages;

class RedirectResource extends Resource
{
    protected static bool $isScopedToTenant = false;

    public static function getModel(): string
    {
        return config('filament-redirect.model');
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
                Grid::make(['sm' => 1, 'md' => 3])->schema([
                    TextInput::make('from_url')
                        ->label(trans('filament-redirect::messages.interface.columns.from_url'))
                        ->distinct()
                        ->required(),
                    TextInput::make('to_url')
                        ->label(trans('filament-redirect::messages.interface.columns.to_url'))
                        ->required(),
                    Select::make('code')
                        ->label(trans('filament-redirect::messages.interface.columns.code'))
                        ->default(CodeEnum::getDefaultCode())
                        ->options(CodeEnum::getArray())
                        ->searchable()
                        ->preload()
                        ->required(),
                ]),
                Grid::make(['sm' => 1, 'md' => 2])->schema([
                    Toggle::make('active_flg')
                        ->label(trans('filament-redirect::messages.interface.columns.active_flg'))
                        ->inline(false),
                ]),
                Grid::make(['sm' => 1, 'md' => 2])->schema([
                    TagsInput::make('tags')
                        ->label(trans('filament-redirect::messages.interface.columns.tags'))
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('from_url')
                    ->label(trans('filament-redirect::messages.interface.columns.from_url'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('to_url')
                    ->label(trans('filament-redirect::messages.interface.columns.to_url'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('code')
                    ->label(trans('filament-redirect::messages.interface.columns.code'))
                    ->formatStateUsing(fn ($state) => CodeEnum::tryFrom($state)->getTitle())
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tags')
                    ->label(trans('filament-redirect::messages.interface.columns.tags'))
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Дата создания')
                    ->sortable()
                    ->dateTime('d.m.Y H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Дата обновления')
                    ->sortable()
                    ->dateTime('d.m.Y H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultPaginationPageOption(12)
            ->paginationPageOptions([12, 24, 48, 96])
            ->filters([
                Filter::make('active_flg')
                    ->label(trans('filament-redirect::messages.interface.columns.active_flg'))
                    ->query(fn (Builder $query): Builder => $query->where('active_flg', true)),
                SelectFilter::make('code')
                    ->label(trans('filament-redirect::messages.interface.columns.code'))
                    ->options(CodeEnum::getArray())
                    ->query(fn (Builder $query, $data) => $query->when($data['values'], fn ($query) => $query->whereIn('code', $data['values'])))
                    ->multiple()
                    ->searchable(),
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            //'edit' => Pages\EditRedirect::route('/{record}/edit'),
            'view' => Pages\ViewRedirect::route('/{record}'),
        ];
    }
}