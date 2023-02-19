<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelasss = Kelas::all();
        return response()->json([
            'data' => $kelasss
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
        Kelas::create([
            'kelas' =>$request->kelas,
            'jurusan' =>$request->jurusan,
            'jumlah_siswa'=>0,
        ]);
        return response()->json([
            'message'=>'Data Created'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kela)
    {
        return response()->json([
            'data' => $kela
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kela)
    {
        $kela->kelas = $request->kelas;
        $kela->jurusan = $request->jurusan;
        $kela->jumlah_siswa= $request->jumlah_siswa;
        $kela->save();
        return response()->json([
            'message'=>'Data updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Kelas $kela)
    {
        $kela->delete();
        return response()->json([
            'message'=>'Class Deleted'
        ]);
    }
}
