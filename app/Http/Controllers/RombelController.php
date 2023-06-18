<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rombel;

class RombelController extends Controller
{
    public function index(){
        //get data from table rombels
        $rombel = rombel::latest()->get();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data rombel',
            'data' => $rombel
        ], 200);
    }
    
}
