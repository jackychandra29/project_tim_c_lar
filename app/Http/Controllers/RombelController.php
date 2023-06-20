<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rombel;

class RombelController extends Controller
{
    public function index(){
        //get data from table rombels
        $rombel = rombel::latest()->get();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data rombel',
            'data' => $rombel
        ], 200);
    }
    
    public function show($id)
    {
        $rombel = rombel::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data rombel',
                'data' => $rombel
            ],
            200
        );
    }

    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'ID_siswa' => 'required',
    //         'Kode_rombel' => 'required'
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json($validator->errors(), 400);
    //     }

    //     $registrasi = registrasi::create([
    //         'ID_siswa' => $request->ID_siswa,
    //         'Kode_rombel' => $request->Kode_rombel
    //     ]);

    //     //success save
    //     if ($registrasi) {
    //         return response()->json(
    //             [
    //                 'success' => true,
    //                 'message' => 'Data registrasi ditambahkan',
    //                 'data' => $registrasi
    //             ],
    //             201
    //         );

    //         //failed save
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Data registrasi gagal ditambahkan',
    //             'data' => $registrasi
    //         ], 409);
    //     }
    // }

    // public function update(Request $request, registrasi $registrasi)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'ID_siswa' => 'required',
    //         'Kode_rombel' => 'required'
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json($validator->errors(), 400);
    //     }

    //     $registrasi = registrasi::findOrFail($registrasi->id);

    //     if ($registrasi) {
    //         $registrasi->update([
    //             'ID_siswa' => $request->ID_siswa,
    //         'Kode_rombel' => $request->Kode_rombel
    //         ]);
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Data registrasi diupdate',
    //             'data' => $registrasi
    //         ], 200);
    //     }

    //     return response()->json([
    //         'success' => false,
    //         'message' => 'Data registrasi tidak ditemukan'
    //     ], 404);
    // }

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
