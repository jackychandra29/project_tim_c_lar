<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Kode_rombel' => 'required',
            'Nama_rombel' => 'required',
            'Tingkat' => 'required',
            'Semester' => 'required',
            'Tahun_pelajaran' => 'required',
            'Kurikulum' => 'required',
            'Kode_ruang' => 'required',
            'ID_staff' => 'required',
            'Jurusan_SP_ID' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $rombel = rombel::create([
            'Kode_rombel' => $request->Kode_rombel,
            'Nama_rombel' => $request->Nama_rombel,
            'Tingkat' => $request->Tingkat,
            'Semester' => $request->Semester,
            'Tahun_pelajaran' => $request->Tahun_pelajaran,
            'Kurikulum' => $request->Kurikulum,
            'Kode_ruang' => $request->Kode_ruang,
            'ID_staff' => $request->ID_staff,
            'Jurusan_SP_ID' => $request->Jurusan_SP_ID
        ]);

        //success save
        if ($rombel) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data registrasi ditambahkan',
                    'data' => $rombel
                ],
                201
            );

            //failed save
            return response()->json([
                'success' => false,
                'message' => 'Data registrasi gagal ditambahkan',
                'data' => $rombel
            ], 409);
        }
    }

    public function update(Request $request, rombel $rombel)
    {
        $validator = Validator::make($request->all(), [
            'Kode_rombel' => 'required',
            'Nama_rombel' => 'required',
            'Tingkat' => 'required',
            'Semester' => 'required',
            'Tahun_pelajaran' => 'required',
            'Kurikulum' => 'required',
            'Kode_ruang' => 'required',
            'ID_staff' => 'required',
            'Jurusan_SP_ID' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $rombel = rombel::findOrFail($rombel->Kode_rombel);

        if ($rombel) {
            $rombel->update([
            'Kode_rombel' => $request->Kode_rombel,
            'Nama_rombel' => $request->Nama_rombel,
            'Tingkat' => $request->Tingkat,
            'Semester' => $request->Semester,
            'Tahun_pelajaran' => $request->Tahun_pelajaran,
            'Kurikulum' => $request->Kurikulum,
            'Kode_ruang' => $request->Kode_ruang,
            'ID_staff' => $request->ID_staff,
            'Jurusan_SP_ID' => $request->Jurusan_SP_ID
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data rombel diupdate',
                'data' => $rombel
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data rombel tidak ditemukan'
        ], 404);
    }

    public function destroy($id)
    {
        $rombel = rombel::findOrFail($id);

        if ($rombel) {
            $rombel->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data rombel dihapus'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data rombel tidak ditemukan'
        ], 404);
    }
}
