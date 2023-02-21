<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapel = Mapel::all();
        return response()->json([
            'data'=>$mapel
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
        $mapel = Mapel::create([
            'mapel'=>$request->mapel,
            'durasi'=>$request->durasi,
            'kelas_jurusan'=>$request->kelas_jurusan,
            'gambar'=>$request->gambar,
            'jumlah_soal'=>$request->jumlah_soal,
            'waktu_mulai'=>$request->waktu_mulai,
            'waktu_akhir'=>$request->waktu_akhir,
        ]);
        return response()->json([
            'data'=>$mapel
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mapel $mapel)
    {
        return response()->json([
            'data'=>$mapel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mapel $mapel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapel $mapel)
    {
        $mapel -> mapel = $request->mapel;
        $mapel -> durasi = $request->durasi;
        $mapel -> kelas_jurusan = $request->kelas_jurusan;
        $mapel -> gambar = $request->gambar;
        $mapel -> jumlah_soal = $request->jumlah_soal;
        $mapel -> waktu_mulai = $request->waktu_mulai;
        $mapel -> waktu_akhir = $request->waktu_akhir;
        $mapel->save();
        return response()->json([
            'message'=>'Mapel Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapel $mapel)
    {
        $mapel->delete();
        return response()->json([
            'message'=> 'mapel ' .$mapel->mapel . ' deleted' 
        ]);
    }
}