<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        //get data from table siswas
        $siswa = siswa::latest()->get();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data siswa',
            'data' => $siswa
        ], 200);
    }

    public function show($id)
    {
        $siswa = siswa::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data siswa',
                'data' => $siswa
            ],
            200
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ID' => 'required',
            'NISN' => 'required',
            'NIK' => 'required',
            'Nama_lengkap' => 'required',
            'Jenis_kelamin' => 'required',
            'Tanggal_lahir' => 'required',
            'Nama_ibuKandung' => 'required',
            'NPSN' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $siswa = siswa::create([
            'ID' => $request->ID,
            'NISN' => $request->NISN,
            'NIK' => $request->NIK,
            'Nama_lengkap' => $request->Nama_lengkap,
            'Jenis_kelamin' => $request->Jenis_kelamin,
            'Tanggal_lahir' => $request->Tanggal_lahir,
            'Nama_ibuKandung' => $request->Nama_ibuKandung,
            'NPSN' => $request->NPSN,
        ]);

        //success save
        if ($siswa) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data siswa ditambahkan',
                    'data' => $siswa
                ],
                201
            );

            //failed save
            return response()->json([
                'success' => false,
                'message' => 'Data siswa gagal ditambahkan',
                'data' => $siswa
            ], 409);
        }
    }

    public function update(Request $request, siswa $siswa)
    {
        $validator = Validator::make($request->all(), [
            'ID' => 'required',
            'NISN' => 'required',
            'NIK' => 'required',
            'Nama_lengkap' => 'required',
            'Jenis_kelamin' => 'required',
            'Tanggal_lahir' => 'required',
            'Nama_ibuKandung' => 'required',
            'NPSN' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $siswa = siswa::findOrFail($siswa->ID);

        if ($siswa) {
            $siswa->update([
                'ID' => $request->ID,
                'NISN' => $request->NISN,
                'NIK' => $request->NIK,
                'Nama_lengkap' => $request->Nama_lengkap,
                'Jenis_kelamin' => $request->Jenis_kelamin,
                'Tanggal_lahir' => $request->Tanggal_lahir,
                'Nama_ibuKandung' => $request->Nama_ibuKandung,
                'NPSN' => $request->NPSN,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data siswa diupdate',
                'data' => $siswa
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data siswa tidak ditemukan'
        ], 404);
    }

    public function destroy($id)
    {
        $siswa = siswa::findOrFail($id);

        if ($siswa) {
            $siswa->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data siswa dihapus'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data siswa tidak ditemukan'
        ], 404);
    }
}
