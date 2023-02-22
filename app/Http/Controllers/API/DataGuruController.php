<?php

namespace App\Http\Controllers\API;

use App\Models\Data_guru;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class DataGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_guru = Data_guru::All();
        return response()->json([
            'data'=>$data_guru
        ]);
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
         Data_guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'guru_mapel' => $request->guru_mapel,
        ]);

        return response()->json([
            'Message'=>"Succesfully Insert Data"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Data_guru $data_guru)
    {
        return response()->json([
            'data' => $data_guru
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Data_guru $data_guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Data_guru $data_guru)
    {
        $data_guru->nip = $request->nip;
        $data_guru->nama = $request->nama;
        $data_guru->guru_mapel= $request->guru_mapel;
        $data_guru->save();
        return response()->json([
            'data' => $data_guru
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Data_guru $data_guru)
    {
        $data_guru->delete();
        return response()->json([
            'message' => 'Admin Deleted'
        ]);
    }
}
