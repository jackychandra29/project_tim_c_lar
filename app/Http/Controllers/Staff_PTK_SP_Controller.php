<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\staff_ptk_sp;

class Staff_PTK_SP_Controller extends Controller
{
    public function staff_ptk_sp(){
        $staff_ptk_sp = staff_ptk_sp::latest()->get();
        return response()->json(
            [
                'staff_ptk_sp' => $staff_ptk_sp,
                'message' => 'staff',
                'code' => 200
            ]
        );
    }
}
