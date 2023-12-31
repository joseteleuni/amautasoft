<?php

namespace App\Filament\Resources\MikrotikResource\Pages;

use RouterOS\Config;
use RouterOS\Query;
use RouterOS\Client;
use Illuminate\Support\Facades\Log;

class ConfigMikrotik{

    function __construct($data){
     
        $this->data = $data;
    }

    public function configuracion()  {
        
        //
        Log::info("Ejecutando config");
  
        $config = new Config([
            'host' => '191.98.141.155',
            'user' => 'apiinfopyme',
            'pass' => 'wrtd24ety3f',
            'port' => 8728,
        ]);
        
        $client = new Client($config);
        $comment_portserver=$this->data['nombre']."-MK-Winbox";
        $comment_pbxssh=$this->data['nombre']."-PBX-SSH";
    
        //Query 
        $query_portwinbox =(new Query('/ip/firewall/nat/print'))->where('comment', $comment_portserver);
        $query_pbxssh     =(new Query('/ip/firewall/nat/print'))->where('comment', $comment_pbxssh);
    
        //Respuestas queries 
        $response_portwinbox = $client->query($query_portwinbox)->read();
        $response_pbxssh     = $client->query($query_pbxssh)->read();
        
        //Recuperando valores
        Log::info("Cargando valores");
        $this->puerto_winbox = $response_portwinbox[0]["dst-port"];
        $this->puerto_pbx    = $response_pbxssh[0]["dst-port"];
        $this->dominio       = "51-".$this->data['code'].".dyndns.org";
    
    }
    
    

}

