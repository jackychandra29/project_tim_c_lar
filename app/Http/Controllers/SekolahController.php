<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\satuan_pendidikan;

class SekolahController extends Controller
{
    public function index(){
        //get data from table sekolahs
        $sekolah = satuan_pendidikan::latest()->get();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data sekolah',
            'data' => $sekolah
        ], 200);
    }

    public function show($id)
    {
        $sekolah = satuan_pendidikan::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data sekolah',
                'data' => $sekolah
            ],
            200
        );
    }
    
}
