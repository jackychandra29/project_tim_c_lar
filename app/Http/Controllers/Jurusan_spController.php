<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jurusan_sp;

class Jurusan_spController extends Controller
{
    public function index(){
        //get data from table jurusan_sp$jurusan_sps
        $jurusan_sp = jurusan_sp::latest()->get();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data jurusan_sp',
            'data' => $jurusan_sp
        ], 200);
    }

    public function show($id)
    {
        $jp = jurusan_sp::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data jenis ruang',
                'data' => $jp
            ],
            200
        );
    }
}