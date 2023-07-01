<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruang;
use Illuminate\Support\Facades\Validator;

class RuangController extends Controller
{
    public function index(){
        //get data from table ruangs
        $ruang = ruang::latest()->get();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data ruang',
            'data' => $ruang
        ], 200);
    }

    public function show($id)
    {
        $ruang = ruang::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data ruang',
                'data' => $ruang
            ],
            200
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Kode_ruang' => 'required',
            'Nama_ruang' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'lantai' => 'required',
            'Kode_bangunan' => 'required',
            'Kode_jenis_ruang' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $ruang = ruang::create([
            'Kode_ruang' => $request->Kode_ruang,
            'Nama_ruang' => $request->Nama_ruang,
            'panjang' => $request->panjang,
            'lebar' => $request->lebar,
            'lantai' => $request->lantai,
            'Kode_bangunan' => $request->Kode_bangunan,
            'Kode_jenis_ruang' => $request->Kode_jenis_ruang,

        ]);

        //success save
        if ($ruang) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data ruang ditambahkan',
                    'data' => $ruang
                ],
                201
            );

            //failed save
            return response()->json([
                'success' => false,
                'message' => 'Data ruang gagal ditambahkan',
                'data' => $ruang
            ], 409);
        }
    }

    public function update(Request $request, ruang $ruang)
    {
        $validator = Validator::make($request->all(), [
            'Kode_ruang' => 'required',
            'Nama_ruang' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'lantai' => 'required',
            'Kode_bangunan' => 'required',
            'Kode_jenis_ruang' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $ruang = ruang::findOrFail($ruang->Kode_ruang);

        if ($ruang) {
            $ruang->update([
                'Kode_ruang' => $request->Kode_ruang,
                'Nama_ruang' => $request->Nama_ruang,
                'panjang' => $request->panjang,
                'lebar' => $request->lebar,
                'lantai' => $request->lantai,
                'Kode_bangunan' => $request->Kode_bangunan,
                'Kode_jenis_ruang' => $request->Kode_jenis_ruang,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data ruang diupdate',
                'data' => $ruang
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data ruang tidak ditemukan'
        ], 404);
    }

    public function destroy($id)
    {
        $ruang = ruang::findOrFail($id);

        if ($ruang) {
            $ruang->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data ruang dihapus'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data ruang tidak ditemukan'
        ], 404);
    }
}
