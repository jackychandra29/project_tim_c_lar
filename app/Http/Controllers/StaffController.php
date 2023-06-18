<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\staff;

class StaffController extends Controller
{
    public function staff(){
        $staff = staff::latest()->get();
        return response()->json(
            [
                'staff' => $staff,
                'message' => 'staff',
                'code' => 200
            ]
        );
    }
}
