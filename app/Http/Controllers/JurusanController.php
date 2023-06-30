<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jurusan;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    public function index()
    {
        //get data from table jurusan_sp$jurusan_sps
        $jrs = jurusan::latest()->get();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data jurusan_sp',
            'data' => $jrs
        ], 200);
    }

    public function show($id)
    {
        $jrs = jurusan::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data jenis ruang',
                'data' => $jrs
            ],
            200
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Kode_jurusan' => 'required',
            'Nama_jurusan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $jurusan = jurusan::create([
            'Kode_jurusan' => $request->Kode_jurusan,
            'Nama_jurusan' => $request->Nama_jurusan,
        ]);

        //success save
        if ($jurusan) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data jurusan ditambahkan',
                    'data' => $jurusan
                ],
                201
            );

            //failed save
            return response()->json([
                'success' => false,
                'message' => 'Data jurusan gagal ditambahkan',
                'data' => $jurusan
            ], 409);
        }
    }
    public function update(Request $request, jurusan $jurusan)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'Kode_jurusan' => 'required',
            'Nama_jurusan' => 'required',

        ]);
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        //find jurusan by ID
        $jurusan = jurusan::findOrFail($jurusan->Kode_jurusan);
        if ($jurusan) {
            //update jurusan
            $jurusan->update([
                'Kode_jurusan' => $request->Kode_jurusan,
                'Nama_jurusan' => $request->Nama_jurusan,

            ]);
            return response()->json([
                'success' => true,
                'message' => 'jurusan Updated',
                'data' => $jurusan
            ], 200);
        }
        //data jurusan not found
        return response()->json([
            'success' => false,
            'message' => 'jurusan Not Found',
        ], 404);
    }
}
