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
        $datajr = jenis_ruang::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data jenis ruang',
                'data' => $datajr
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

        $datajr = jenis_ruang::create([
            'Kode_jenis_ruang' => $request->Kode_jenis_ruang,
            'Jenis_ruang' => $request->Jenis_ruang
        ]);

        //success save
        if ($datajr) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data jenis ruang ditambahkan',
                    'data' => $datajr
                ],
                201
            );

            //failed save
            return response()->json([
                'success' => false,
                'message' => 'Data jenis ruang gagal ditambahkan',
                'data' => $datajr
            ], 409);
        }
    }

    public function update(Request $request, jenis_ruang $datajr)
    {
        $validator = Validator::make($request->all(), [
            'Kode_jenis_ruang' => 'required',
            'Jenis_ruang' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $datajr = jenis_ruang::findOrFail($datajr->id);

        if ($datajr) {
            $datajr->update([
                'Kode_jenis_ruang' => $request->Kode_jenis_ruang,
                'Jenis_ruang' => $request->Jenis_ruang
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data jenis ruang diupdate',
                'data' => $datajr
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data jenis ruang tidak ditemukan'
        ], 404);
    }

    public function destroy($id)
    {
        $datajr = jenis_ruang::findOrFail($id);

        if ($datajr) {
            $datajr->delete();

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
