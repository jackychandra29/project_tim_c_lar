<?php

namespace App\Http\Controllers;

use App\Models\bangunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get data from table bangunans
        $bangunan = bangunan::latest()->get();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data bangunan',
            'data' => $bangunan
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'Kode_bangunan' => 'required',
            'Nama_bangunan' => 'required',
            'NPSN' => 'required',
        ]);
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        //save to database
        $bangunan = bangunan::create([
            'Kode_bangunan' => $request->Kode_bangunan,
            'Nama_bangunan' => $request->Nama_bangunan,
            'NPSN' => $request->NPSN,
        ]);
        //success save to database
        if ($bangunan) {
            return response()->json([
                'success' => true,
                'message' => 'bangunan Created',
                'data' => $bangunan
            ], 201);
        }
        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'bangunan Failed to Save',

        ], 409);
    }

    /**
     * Display the specified resource.
     */
    public function show($Kode_bangunan)
    {
        $bangunan = bangunan::where('Kode_bangunan',$Kode_bangunan)->first();
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data bangunan',
            'data' => $bangunan
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bangunan $bangunan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bangunan $bangunan)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'Kode_bangunan' => 'required',
            'Nama_bangunan' => 'required',
            'NPSN' => 'required',
        ]);
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        //find bangunan by ID
        $bangunan = bangunan::findOrFail($bangunan->Kode_bangunan);
        if ($bangunan) {
            //update bangunan
            $bangunan->update([
                'Kode_bangunan' => $request->Kode_bangunan,
                'Nama_bangunan' => $request->Nama_bangunan,
                'NPSN' => $request->NPSN,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'bangunan Updated',
                'data' => $bangunan
            ], 200);
        }
        //data bangunan not found
        return response()->json([
            'success' => false,
            'message' => 'bangunan Not Found',
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bangunan $Kode_bangunan)
    {
        //find bangunan by ID
        $bangunan = bangunan::findOrfail($Kode_bangunan);
        if ($bangunan) {
            //delete bangunan
            $bangunan->delete();
            return response()->json([
                'success' => true,
                'message' => 'bangunan Deleted',
            ], 200);
        }
        //data bangunan not found
        return response()->json([
            'success' => false,
            'message' => 'bangunan Not Found',
        ], 404);
    }
}
