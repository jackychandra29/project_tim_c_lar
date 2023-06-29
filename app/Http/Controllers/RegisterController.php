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

    public function update(Request $request, $id)
    {
        
        //find user by ID
        $user = User::findOrFail($id);
        if ($user) {
            //update user
            $user->update([
                'status'=> $request->status,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'status Updated',
                'data' => $user
            ], 200);
        }
        //data user not found
        return response()->json([
            'success' => false,
            'message' => 'user Not Found',
        ], 404);
    }
}
