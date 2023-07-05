<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_id',
        'name',
    ];

    protected $casts = [
        'province_id' => 'string',
        'name' => 'string',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    // change the property name to match the API response from RajaOngkir
    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['province_id'] = $toArray['id'];
        $toArray['province'] = $toArray['name'];
        unset($toArray['id'], $toArray['name']);
        return $toArray;
    }
}
