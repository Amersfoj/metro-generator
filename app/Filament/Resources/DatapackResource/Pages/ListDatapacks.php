<?php

namespace App\Filament\Resources\DatapackResource\Pages;

use App\Filament\Resources\DatapackResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDatapacks extends ListRecords
{
    protected static string $resource = DatapackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
