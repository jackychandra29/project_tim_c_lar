<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jurusan;

class JurusanController extends Controller
{
    public function index(){
        //get data from table jurusan_sp$jurusan_sps
        $jrs = jurusan::latest()->get();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data jurusan_sp',
            'data' => $jrs
        ], 200);
    }

    public function show($id)
    {
        $jrs = jurusan::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data jenis ruang',
                'data' => $jrs
            ],
            200
        );
    }
}
