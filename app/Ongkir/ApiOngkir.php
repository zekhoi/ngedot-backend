<?php

namespace App\Ongkir;

use App\Contracts\Ongkir;
use App\Services\RajaOngkirService;

class ApiOngkir implements Ongkir
{
  protected $client;

  public function __construct()
  {
    $this->client = new RajaOngkirService;
  }

  public function getProvinces($id)
  {
    if($id){
      $response = $this->client->fetch('/province?id=' . $id);
    }else{
      $response = $this->client->fetch('/province');
    }
    return $response['rajaongkir']['results'];
  }

  public function getCities($id)
  {
    if($id){
      $response = $this->client->fetch('/city?id=' . $id);
    }else{
      $response = $this->client->fetch('/city');
    }
    return $response['rajaongkir']['results'];
  }
}