<?php

namespace App\Filament\Resources\DatapackResource\Pages;

use App\Filament\Resources\DatapackResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDatapack extends EditRecord
{
    protected static string $resource = DatapackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
