<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('id');

        if(!$search){
            $provinces = Province::all();

            return response()->json([
                'status' => 'success',
                'data' => $provinces
            ]);
        }

        $province = Province::where('id', $search)->first();

        if(!$province){
            return response()->json([
                'status' => 'error',
                'message' => 'Province not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $province
        ]);
    }
}
