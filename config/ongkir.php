<?php

use App\Ongkir\ApiOngkir;
use App\Ongkir\DbOngkir;

return [
    'default' => env('RAJAONGKIR_SOURCE', 'db'),

    'api' => [
        'class' => ApiOngkir::class,
    ],

    'db' => [
        'class' => DbOngkir::class,
    ],
];