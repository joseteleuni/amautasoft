<?php

namespace App\Filament\Resources\MikrotikResource\Pages;

use App\Filament\Resources\MikrotikResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMikrotiks extends ListRecords
{
    protected static string $resource = MikrotikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Crear registro'),
        ];
    }
}
