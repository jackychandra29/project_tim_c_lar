<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;

class SiswaController extends Controller
{
    public function siswa(){
        $siswa = siswa::latest()->get();
        return response()->json(
            [
                'siswa' => $siswa,
                'message' => 'siswa',
                'code' => 200
            ]
        );
    }
}
