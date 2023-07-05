<?php

namespace App\Ongkir;

use App\Contracts\Ongkir;
use App\Models\City;
use App\Models\Province;

class DbOngkir implements Ongkir
{
  public function getProvinces($id)
  {
    if($id){
      return Province::where('id', $id)->get();
    }else{
      return Province::all();
    }
  }

  public function getCities($id)
  {
    if($id){
      return City::where('id', $id)->get();
    }else{
      return City::all();
    }
  }
}

