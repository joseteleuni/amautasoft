<?php

namespace App\Filament\Resources\MikrotikResource\Pages;

use App\Filament\Resources\MikrotikResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;
use RouterOS\Config;
use RouterOS\Query;
use RouterOS\Client;
use Illuminate\Database\Eloquent\Model;



class CreateMikrotik extends CreateRecord
{
    protected static string $resource = MikrotikResource::class;

    protected function afterFill(): void
    {
        Log::info('Creando registros');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function beforeCreate(): void
    {
        // Runs before the form fields are saved to the database.
        
        //Log::info($data);
    }
 
    
    protected function afterCreate(): void
    {
        // Runs after the form fields are saved to the database.
        //Log::info('Creando registros post-create');
    }
    

    protected function handleRecordCreation(array $data): Model
    {   
      
        
        $obj = new ConfigMikrotik($data);
        $obj->configuracion();

        $data['puerto_winbox']=$obj->puerto_winbox;
        $data['puerto_pbx']   =$obj->puerto_pbx;
        $data['dominio']      =$obj->dominio;

        return static::getModel()::create($data);
        
    }
}
