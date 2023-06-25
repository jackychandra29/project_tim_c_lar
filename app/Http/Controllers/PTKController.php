<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ptk;

class PTKController extends Controller
{
    public function index()
    {
        $ptk = ptk::latest()->get();
        return response()->json(
            [
                'success' => true,
                'message' => 'List data PTK',
                'data' => $ptk
            ],
            200
        );
    }

    public function show($id)
    {
        $ptk = ptk::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data PTK',
                'data' => $ptk
            ],
            200
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Kode_PTK' => 'required',
            'Jenis_PTK' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $ptk = ptk::create([
            'Kode_PTK' => $request->Kode_PTK,
            'Jenis_PTK' => $request->Jenis_PTK
        ]);

        //success save
        if ($ptk) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data PTK ditambahkan',
                    'data' => $ptk
                ],
                201
            );

            //failed save
            return response()->json([
                'success' => false,
                'message' => 'Data PTK gagal ditambahkan',
                'data' => $ptk
            ], 409);
        }
    }

    public function update(Request $request, ptk $ptk)
    {
        $validator = Validator::make($request->all(), [
            'Kode_PTK' => 'required',
            'Jenis_PTK' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $ptk = ptk::findOrFail($ptk->Kode_PTK);

        if ($ptk) {
            $ptk->update([
                'Kode_PTK' => $request->Kode_PTK,
                'Jenis_PTK' => $request->Jenis_PTK
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data PTK diupdate',
                'data' => $ptk
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data PTK tidak ditemukan'
        ], 404);
    }

    public function destroy($id)
    {
        $ptk = ptk::findOrFail($id);

        if ($ptk) {
            $ptk->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data PTK dihapus'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data PTK tidak ditemukan'
        ], 404);
    }
}
