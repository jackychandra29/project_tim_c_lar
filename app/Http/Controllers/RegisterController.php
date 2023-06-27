<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $usr = User::latest()->get();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data users',
            'data' => $usr
        ], 200);
    }

    public function store(Request $request){
        $input = $request->all();

        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => 1,
            'NPSN' => $input['npsn'],
            'status' => 0
        ]);

        return response()->json(['status'=>true,
            'message'=> "Registration Success"
        ]);
    }
}