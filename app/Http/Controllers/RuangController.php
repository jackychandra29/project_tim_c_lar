<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruang;

class RuangController extends Controller
{
    public function ruang(){
        $ruang = ruang::latest()->get();
        return response()->json(
            [
                'ruang' => $ruang,
                'message' => 'ruang',
                'code' => 200
            ]
        );
    }
}
