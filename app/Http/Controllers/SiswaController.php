<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;

class SiswaController extends Controller
{
    public function index(){
        //get data from table siswas
        $siswa = siswa::latest()->get();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data siswa',
            'data' => $siswa
        ], 200);
    }

    public function show($id)
    {
        $siswa = siswa::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data siswa',
                'data' => $siswa
            ],
            200
        );
    }
}