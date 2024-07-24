<?php

namespace App\Filament\Resources\FuncResource\Pages;

use App\Filament\Resources\FuncResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFunc extends EditRecord
{
    protected static string $resource = FuncResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
