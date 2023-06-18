<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruang;

class RuangController extends Controller
{
    public function index(){
        //get data from table ruangs
        $ruang = ruang::latest()->get();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data ruang',
            'data' => $ruang
        ], 200);
    }
}