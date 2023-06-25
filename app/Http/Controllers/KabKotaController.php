<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\kabkota;

class KabKotaController extends Controller
{
    public function index()
    {
        $kabkota = kabkota::latest()->get();
        return response()->json(
            [
                'success' => true,
                'message' => 'List data kabupaten kota',
                'data' => $kabkota
            ],
            200
        );
    }

    public function show($id)
    {
        $kabkota = kabkota::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data kabupaten kota',
                'data' => $kabkota
            ],
            200
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Kode_kabKota' => 'required',
            'Nama_kabKota' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $kabkota = kabkota::create([
            'Kode_kabKota' => $request->Kode_kabKota,
            'Nama_kabKota' => $request->Nama_kabKota
        ]);

        //success save
        if ($kabkota) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data kabupaten kota ditambahkan',
                    'data' => $kabkota
                ],
                201
            );

            //failed save
            return response()->json([
                'success' => false,
                'message' => 'Data kabupaten kota gagal ditambahkan',
                'data' => $kabkota
            ], 409);
        }
    }

    public function update(Request $request, kabkota $kabkota)
    {
        $validator = Validator::make($request->all(), [
            'Kode_kabKota' => 'required',
            'Nama_kabKota' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $kabkota = kabkota::findOrFail($kabkota->Kode_kabKota);

        if ($kabkota) {
            $kabkota->update([
                'Kode_kabKota' => $request->Kode_kabKota,
                'Nama_kabKota' => $request->Nama_kabKota
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data kabupaten kota diupdate',
                'data' => $kabkota
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data kabupaten kota tidak ditemukan'
        ], 404);
    }

    public function destroy($id)
    {
        $kabkota = kabkota::findOrFail($id);

        if ($kabkota) {
            $kabkota->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data kabupaten kota dihapus'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data kabupaten kota tidak ditemukan'
        ], 404);
    }
}
