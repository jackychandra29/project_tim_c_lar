<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\staff;

class StaffController extends Controller
{
    public function index(){
        //get data from table staffs
        $staff = staff::latest()->get();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data staff',
            'data' => $staff
        ], 200);
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
