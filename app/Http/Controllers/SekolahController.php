<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\satuan_pendidikan;

class SekolahController extends Controller
{
    public function sekolah(){
        $sekolah = satuan_pendidikan::latest()->get();
        return response()->json(
            [
                'sekolah' => $sekolah,
                'message' => 'satuan_pendidikan',
                'code' => 200
            ]
        );
    }
}
