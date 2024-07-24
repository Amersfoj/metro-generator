<?php

namespace App\Filament\Resources\FuncResource\Pages;

use App\Filament\Resources\FuncResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFuncs extends ListRecords
{
    protected static string $resource = FuncResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
