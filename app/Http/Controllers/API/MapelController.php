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
            ->with(['kelas'])
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
            'id_kelas'=>$request->id_kelas,
            'mapel'=>$request->mapel,
            'durasi'=>$request->durasi,
            'gambar'=>$request->gambar,
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
        $mapel -> id_kelas = $request->id_kelas;
        $mapel -> mapel = $request->mapel; 
        $mapel -> durasi = $request->durasi;
        $mapel -> gambar = $request->gambar;
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
