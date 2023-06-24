<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\kecamatan;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatan = kecamatan::latest()->get();
        return response()->json(
            [
                'success' => true,
                'message' => 'List data kecamatan',
                'data' => $kecamatan
            ],
            200
        );
    }

    public function show($id)
    {
        $kecamatan = kecamatan::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data kecamatan',
                'data' => $kecamatan
            ],
            200
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Kode_kecamatan' => 'required',
            'Nama_kecamatan' => 'required',
            'Kode_kabKota' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $kecamatan = kecamatan::create([
            'Kode_kecamatan' => $request->Kode_kecamatan,
            'Nama_kecamatan' => $request->Nama_kecamatan,
            'Kode_kabKota' => $request->Kode_kabKota,
        ]);

        //success save
        if ($kecamatan) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data kecamatan ditambahkan',
                    'data' => $kecamatan
                ],
                201
            );

            //failed save
            return response()->json([
                'success' => false,
                'message' => 'Data kecamatan gagal ditambahkan',
                'data' => $kecamatan
            ], 409);
        }
    }

    public function update(Request $request, kecamatan $kecamatan)
    {
        $validator = Validator::make($request->all(), [
            'Kode_kecamatan' => 'required',
            'Nama_kecamatan' => 'required',
            'Kode_kabKota' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $kecamatan = kecamatan::findOrFail($kecamatan->Kode_kecamatan);

        if ($kecamatan) {
            $kecamatan->update([
                'Kode_kecamatan' => $request->Kode_kecamatan,
                'Nama_kecamatan' => $request->Nama_kecamatan,
                'Kode_kabKota' => $request->Kode_kabKota,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data kecamatan diupdate',
                'data' => $kecamatan
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data kecamatan tidak ditemukan'
        ], 404);
    }

    public function destroy($id)
    {
        $kecamatan = kecamatan::findOrFail($id);

        if ($kecamatan) {
            $kecamatan->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data kecamatan dihapus'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data kecamatan tidak ditemukan'
        ], 404);
    }
}
