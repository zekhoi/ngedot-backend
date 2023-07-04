<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function search()
    {
        $search = request()->input('id');

        if(!$search){
            $cities = City::all();

            return response()->json([
                'status' => 'success',
                'data' => $cities
            ]);
        }

        $city = City::where('id', $search)->first();

        if(!$city){
            return response()->json([
                'status' => 'error',
                'message' => 'City not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $city
        ]);
    }
}
