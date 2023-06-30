<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\staff_ptk_sp;

class Staff_PTK_SP_Controller extends Controller
{
    public function index(){
        //get data from table staff_ptk_sps
        $staff_ptk_sp = staff_ptk_sp::latest()->get();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data staff_ptk_sp',
            'data' => $staff_ptk_sp
        ], 200);
    }

    public function show($id)
    {
        $staff_ps = staff_ptk_sp::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data staff',
                'data' => $staff_ps
            ],
            200
        );
    }
}