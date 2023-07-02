<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\staff;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function index()
    {
        //get data from table staffs
        $staff = staff::latest()->get();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data staff',
            'data' => $staff
        ], 200);
    }

    public function show($id)
    {
        $staff = staff::findOrFail($id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Detail data staff',
                'data' => $staff
            ],
            200
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ID_staff' => 'required',
            'NUPTK' => 'required',
            'Nama_lengkap' => 'required',
            'NIK' => 'required',
            'NIP' => 'required',
            'Jenis_kelamin' => 'required',
            'Tanggal_lahir' => 'required',
            'Induk' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $staff = staff::create([
            'ID_staff' => $request->ID_staff,
            'NUPTK' => $request->NUPTK,
            'Nama_lengkap' => $request->Nama_lengkap,
            'NIK' => $request->NIK,
            'NIP' => $request->NIP,
            'Jenis_kelamin' => $request->Jenis_kelamin,
            'Tanggal_lahir' => $request->Tanggal_lahir,
            'Induk' => $request->Induk
        ]);

        //success save
        if ($staff) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data staff ditambahkan',
                    'data' => $staff
                ],
                201
            );

            //failed save
            return response()->json([
                'success' => false,
                'message' => 'Data staff gagal ditambahkan',
                'data' => $staff
            ], 409);
        }
    }

    public function update(Request $request, staff $staff)
    {
        $validator = Validator::make($request->all(), [
            'ID_staff' => 'required',
            'NUPTK' => 'required',
            'Nama_lengkap' => 'required',
            'NIK' => 'required',
            'NIP' => 'required',
            'Jenis_kelamin' => 'required',
            'Tanggal_lahir' => 'required',
            'Induk' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $staff = staff::findOrFail($staff->ID);

        if ($staff) {
            $staff->update([
                'ID_staff' => $request->ID_staff,
                'NUPTK' => $request->NUPTK,
                'Nama_lengkap' => $request->Nama_lengkap,
                'NIK' => $request->NIK,
                'NIP' => $request->NIP,
                'Jenis_kelamin' => $request->Jenis_kelamin,
                'Tanggal_lahir' => $request->Tanggal_lahir,
                'Induk' => $request->Induk
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data staff diupdate',
                'data' => $staff
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data staff tidak ditemukan'
        ], 404);
    }

    public function destroy($id)
    {
        $staff = staff::findOrFail($id);

        if ($staff) {
            $staff->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data staff dihapus'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data staff tidak ditemukan'
        ], 404);
    }
}
