<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\staff;

class StaffController extends Controller
{
    public function index(){
        $staff = staff::latest()->get();
        return response()->json(
            [
                'staff' => $staff,
                'message' => 'staff',
                'code' => 200
            ]
        );
    }

    public function show($id)
    {
        $staff = staff::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data staff',
                'data' => $staff
            ],
            200
        );
    }
}
