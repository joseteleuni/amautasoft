<?php

namespace App\Filament\Resources\MikrotikResource\Pages;

use App\Filament\Resources\MikrotikResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditMikrotik extends EditRecord
{
    protected static string $resource = MikrotikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }


    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $obj = new ConfigMikrotik($data);
        $obj->configuracion();

        $data['puerto_winbox']=$obj->puerto_winbox;
        $data['puerto_pbx']   =$obj->puerto_pbx;
        $data['dominio']      =$obj->dominio;
        
        $record->update($data);
    
        return $record;
    }
}
