<?php

namespace App\Filament\Resources\MapPoolResource\Pages;

use App\Filament\Resources\MapPoolResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMapPools extends ListRecords
{
    protected static string $resource = MapPoolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
