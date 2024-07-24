<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DatapackResource\Pages;
use App\Filament\Resources\DatapackResource\RelationManagers;
use App\Models\Datapack;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DatapackResource extends Resource
{
    protected static ?string $model = Datapack::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListDatapacks::route('/'),
            'create' => Pages\CreateDatapack::route('/create'),
            'edit' => Pages\EditDatapack::route('/{record}/edit'),
        ];
    }
}
