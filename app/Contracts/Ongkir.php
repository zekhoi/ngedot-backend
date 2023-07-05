<?php

namespace App\Contracts;

interface Ongkir
{
  public function getProvinces($id);
  public function getCities($id);
}