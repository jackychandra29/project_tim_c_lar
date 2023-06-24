<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\registrasi;

class RegistrasiController extends Controller
{
    public function index()
    {
        $registrasi = registrasi::latest()->get();
        return response()->json(
            [
                'success' => true,
                'message' => 'List data registrasi',
                'data' => $registrasi
            ],
            200
        );
    }

    public function show($id)
    {
        $registrasi = registrasi::where('ID_siswa',$id)->first();
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data registrasi',
                'data' => $registrasi
            ],
            200
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ID_siswa' => 'required',
            'Kode_rombel' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $registrasi = registrasi::create([
            'ID_siswa' => $request->ID_siswa,
            'Kode_rombel' => $request->Kode_rombel
        ]);

        //success save
        if ($registrasi) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data registrasi ditambahkan',
                    'data' => $registrasi
                ],
                201
            );

            //failed save
            return response()->json([
                'success' => false,
                'message' => 'Data registrasi gagal ditambahkan',
                'data' => $registrasi
            ], 409);
        }
    }

    public function update(Request $request, registrasi $registrasi)
    {
        $validator = Validator::make($request->all(), [
            'ID_siswa' => 'required',
            'Kode_rombel' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $registrasi = registrasi::findOrFail($registrasi->ID_siswa);

        if ($registrasi) {
            $registrasi->update([
                'ID_siswa' => $request->ID_siswa,
                'Kode_rombel' => $request->Kode_rombel
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data registrasi diupdate',
                'data' => $registrasi
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data registrasi tidak ditemukan'
        ], 404);
    }

    // public function destroy($id)
    // {
    //     $registrasi = registrasi::findOrFail($id);

    //     if ($registrasi) {
    //         $registrasi->delete();

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Data registrasi dihapus'
    //         ], 200);
    //     }

    //     return response()->json([
    //         'success' => false,
    //         'message' => 'Data registrasi tidak ditemukan'
    //     ], 404);
    // }
}
