<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class RajaOngkirService
{
    protected $client;
    protected $baseUrl;

    public function __construct()
    {   
        $this->client = Http::withHeaders([
            'key' => config('services.rajaongkir.api_key')
        ]);
        $this->baseUrl = config('services.rajaongkir.base_url');
    }

    public function fetch($url)
    {
        if(!$this->baseUrl){
            throw new Exception('RajaOngkir base URL is not set');
        }
        
        return $this->client->get(
            $this->baseUrl . $url
        );
    }

    // public function getProvinces($id)
    // {
    //     if($id){
    //         $response = $this->fetch('/province?id=' . $id);
    //     }else{
    //         $response = $this->fetch('/province');
    //     }
    //     return $response['rajaongkir']['results'];
    // }

    // public function getCities($id)
    // {
    //     if($id){
    //         $response = $this->fetch('/city?id=' . $id);
    //     }else{
    //         $response = $this->fetch('/city');
    //     }
    //     return $response['rajaongkir']['results'];
    // }
}