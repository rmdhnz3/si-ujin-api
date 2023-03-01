<?php

namespace App\Http\Controllers\API;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function index()
    {
        
       $mapel = Mapel::query()
            ->with(['guru'])
            ->withCount(['jumlah_soal'])
            ->get();
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
            'id_guru'=>$request->id_guru,
            'mapel'=>$request->mapel,
            'durasi'=>$request->durasi,
            'kelas_jurusan'=>$request->kelas_jurusan,
            'gambar'=>$request->gambar,
            'jumlah_soal'=>$request->jumlah_soal,
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
        $mapel -> id_guru = $request->id_guru;
        $mapel -> mapel = $request->mapel; 
        $mapel -> durasi = $request->durasi;
        $mapel -> kelas_jurusan = $request->kelas_jurusan;
        $mapel -> gambar = $request->gambar;
        $mapel -> jumlah_soal = $request->jumlah_soal;
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
