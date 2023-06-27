<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\staff_ptk_sp;
use Illuminate\Support\Facades\Validator;

class Staff_PTK_SP_Controller extends Controller
{
    public function index()
    {
        //get data from table staff_ptk_sps
        $staff_ptk_sp = staff_ptk_sp::latest()->get();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data staff_ptk_sp',
            'data' => $staff_ptk_sp
        ], 200);
    }

    public function show($id)
    {
        $staff_ptk_sp = staff_ptk_sp::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data staff',
                'data' => $staff_ptk_sp
            ],
            200
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ID' => 'required',
            'ID_staff' => 'required',
            'Kode_PTK' => 'required',
            'NPSN' => 'required',
            'Mulai_menjabat' => 'required',
            'Akhir_menjabat' => 'required',
            'Status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $staff_ptk_sp = staff_ptk_sp::create([
            'ID' => $request->ID,
            'ID_staff' => $request->ID_staff,
            'Kode_PTK' => $request->Kode_PTK,
            'NPSN' => $request->NPSN,
            'Mulai_menjabat' => $request->Mulai_menjabat,
            'Akhir_menjabat' => $request->Akhir_menjabat,
            'Status' => $request->Status,
        ]);

        //success save
        if ($staff_ptk_sp) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data staff_ptk_sp ditambahkan',
                    'data' => $staff_ptk_sp
                ],
                201
            );

            //failed save
            return response()->json([
                'success' => false,
                'message' => 'Data staff_ptk_sp gagal ditambahkan',
                'data' => $staff_ptk_sp
            ], 409);
        }
    }

    public function update(Request $request, staff_ptk_sp $staff_ptk_sp)
    {
        $validator = Validator::make($request->all(), [
            'ID' => 'required',
            'ID_staff' => 'required',
            'Kode_PTK' => 'required',
            'NPSN' => 'required',
            'Mulai_menjabat' => 'required',
            'Akhir_menjabat' => 'required',
            'Status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $staff_ptk_sp = staff_ptk_sp::findOrFail($staff_ptk_sp->ID);

        if ($staff_ptk_sp) {
            $staff_ptk_sp->update([
                'ID' => $request->ID,
                'ID_staff' => $request->ID_staff,
                'Kode_PTK' => $request->Kode_PTK,
                'NPSN' => $request->NPSN,
                'Mulai_menjabat' => $request->Mulai_menjabat,
                'Akhir_menjabat' => $request->Akhir_menjabat,
                'Status' => $request->Status,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data staff_ptk_sp diupdate',
                'data' => $staff_ptk_sp
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data staff_ptk_sp tidak ditemukan'
        ], 404);
    }

    public function destroy($id)
    {
        $staff_ptk_sp = staff_ptk_sp::findOrFail($id);

        if ($staff_ptk_sp) {
            $staff_ptk_sp->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data staff_ptk_sp dihapus'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data staff_ptk_sp tidak ditemukan'
        ], 404);
    }
}
