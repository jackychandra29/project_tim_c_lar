<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\jenis_ruang;

class JenisRuangController extends Controller
{
    public function index()
    {
        $jenisruang = jenis_ruang::latest()->get();
        return response()->json(
            [
                'success' => true,
                'message' => 'List data jenis ruang',
                'data' => $jenisruang
            ],
            200
        );
    }

    public function show($id)
    {
        $jenis_ruang = jenis_ruang::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data jenis ruang',
                'data' => $jenis_ruang
            ],
            200
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Kode_jenis_ruang' => 'required',
            'Jenis_ruang' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $jenis_ruang = jenis_ruang::create([
            'Kode_jenis_ruang' => $request->Kode_jenis_ruang,
            'Jenis_ruang' => $request->Jenis_ruang
        ]);

        //success save
        if ($jenis_ruang) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data jenis ruang ditambahkan',
                    'data' => $jenis_ruang
                ],
                201
            );

            //failed save

        }
        return response()->json([
            'success' => false,
            'message' => 'Data jenis ruang gagal ditambahkan',
            'data' => $jenis_ruang
        ], 409);
    }

    public function update(Request $request, jenis_ruang $jenis_ruang)
    {
        $validator = Validator::make($request->all(), [
            'Kode_jenis_ruang' => 'required',
            'Jenis_ruang' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $jenis_ruang = jenis_ruang::findOrFail($jenis_ruang->Kode_jenis_ruang);

        if ($jenis_ruang) {
            $jenis_ruang->update([
                'Kode_jenis_ruang' => $request->Kode_jenis_ruang,
                'Jenis_ruang' => $request->Jenis_ruang
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data jenis ruang diupdate',
                'data' => $jenis_ruang
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data jenis ruang tidak ditemukan'
        ], 404);
    }

    public function destroy($id)
    {
        $jenis_ruang = jenis_ruang::findOrFail($id);

        if ($jenis_ruang) {
            $jenis_ruang->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data jenis ruang dihapus'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data jenis ruang tidak ditemukan'
        ], 404);
    }
}
