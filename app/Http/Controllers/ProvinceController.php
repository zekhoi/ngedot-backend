<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ongkir\ApiOngkir;
use App\Ongkir\DbOngkir;

class ProvinceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function search(Request $request)
    {
        $source = config('ongkir.default');

        $search = $request->input('id');

        if($source == 'api'){
            $ongkir = new ApiOngkir;
        }else{
            $ongkir = new DbOngkir;
        }

        $provinces = $ongkir->getProvinces($search);

        return response()->json([
            'status' => 'success',
            'source' => $source, // add this line to see the source of the data, 'api' or 'db
            'data' => $provinces
        ]);
    }
}
