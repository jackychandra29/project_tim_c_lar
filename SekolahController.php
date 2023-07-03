<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\satuan_pendidikan;
use Illuminate\Support\Facades\Validator;

class SekolahController extends Controller
{
    public function index()
    {
        //get data from table sekolahs
        $sekolah = satuan_pendidikan::latest()->get();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data sekolah',
            'data' => $sekolah
        ], 200);
    }

    public function show($id)
    {
        $sekolah = satuan_pendidikan::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data sekolah',
                'data' => $sekolah
            ],
            200
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'NPSN' => 'required',
            'Nama_SP' => 'required',
            'Bentuk_pendidikan' => 'required',
            'Status_sekolah' => 'required',
            'Kode_kecamatan' => 'required',
            'Kode_kabKota' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $sekolah = satuan_pendidikan::create([
            'NPSN' => $request->NPSN,
            'Nama_SP' => $request->Nama_SP,
            'Bentuk_pendidikan' => $request->Bentuk_pendidikan,
            'Status_sekolah' => $request->Status_sekolah,
            'Kode_kecamatan' => $request->Kode_kecamatan,
            'Kode_kabKota' => $request->Kode_kabKota,
        ]);

        //success save
        if ($sekolah) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data sekolah ditambahkan',
                    'data' => $sekolah
                ],
                201
            );

            //failed save
            return response()->json([
                'success' => false,
                'message' => 'Data sekolah gagal ditambahkan',
                'data' => $sekolah
            ], 409);
        }
    }

    public function update(Request $request, satuan_pendidikan $sekolah)
    {
        $validator = Validator::make($request->all(), [
            'NPSN' => 'required',
            'Nama_SP' => 'required',
            'Bentuk_pendidikan' => 'required',
            'Status_sekolah' => 'required',
            'Kode_kecamatan' => 'required',
            'Kode_kabKota' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $sekolah = satuan_pendidikan::findOrFail($sekolah->NPSN);

        if ($sekolah) {
            $sekolah->update([
                'NPSN' => $request->NPSN,
                'Nama_SP' => $request->Nama_SP,
                'Bentuk_pendidikan' => $request->Bentuk_pendidikan,
                'Status_sekolah' => $request->Status_sekolah,
                'Kode_kecamatan' => $request->Kode_kecamatan,
                'Kode_kabKota' => $request->Kode_kabKota,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data sekolah diupdate',
                'data' => $sekolah
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data sekolah tidak ditemukan'
        ], 404);
    }

    public function destroy($id)
    {
        $sekolah = satuan_pendidikan::findOrFail($id);

        if ($sekolah) {
            $sekolah->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data sekolah dihapus'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data sekolah tidak ditemukan'
        ], 404);
    }
}
