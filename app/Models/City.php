<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_id',
        'city_id',
        'name',
        'type',
        'postal_code',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    // change the property name to match the API response from RajaOngkir
    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['city_id'] = $toArray['id'];
        $toArray['city_name'] = $toArray['name'];
        unset($toArray['id'], $toArray['name']);
        return $toArray;
    }
}
