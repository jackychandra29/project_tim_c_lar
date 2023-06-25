<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jurusan_sp;
use Illuminate\Support\Facades\Validator;

class Jurusan_spController extends Controller
{
    public function index(){
        //get data from table jurusan_sp$jurusan_sps
        $jurusan_sp = jurusan_sp::latest()->get();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data jurusan_sp',
            'data' => $jurusan_sp
        ], 200);
    }

    public function show($id)
    {
        $jp = jurusan_sp::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data jenis ruang',
                'data' => $jp
            ],
            200
        );
    }

    public function update(Request $request, jurusan_sp $jurusan_sp)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'ID' => 'required',
            'Kode_jurusan' => 'required',
            'NPSN' => 'required',
        ]);
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        //find jurusan_sp by ID
        $jurusan_sp = jurusan_sp::findOrFail($jurusan_sp->ID);
        if ($jurusan_sp) {
            //update jurusan_sp
            $jurusan_sp->update([
                'ID' => $request->ID,
                'NPSN' => $request->NPSN,
                'Kode_jurusan' => $request->Kode_jurusan,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'jurusan_sp Updated',
                'data' => $jurusan_sp
            ], 200);
        }
        //data jurusan_sp not found
        return response()->json([
            'success' => false,
            'message' => 'jurusan_sp Not Found',
        ], 404);
    }
}