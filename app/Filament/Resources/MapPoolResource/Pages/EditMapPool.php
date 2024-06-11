<?php

namespace App\Filament\Resources\MapPoolResource\Pages;

use App\Filament\Resources\MapPoolResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMapPool extends EditRecord
{
    protected static string $resource = MapPoolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
