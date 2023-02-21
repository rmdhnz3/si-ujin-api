<?php

namespace App\Http\Controllers;

use App\Models\Soal_jawaban;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SoalJawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Soal_jawaban::all();
        return response()->json([
            'data'=>$data
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
        $soal = Soal_jawaban::create([
            'id_mapel'=>$request->id_mapel,
            'id_kelas'=>$request->id_kelas,
            'no_soal'=>$request->no_soal,
            'soal'=>$request->soal,
            'gambar'=>$request->gambar,
            'pilihan_A'=>$request->pilihan_A,
            'pilihan_B'=>$request->pilihan_B,
            'pilihan_C'=>$request->pilihan_C,
            'pilihan_D'=>$request->pilihan_D,
            'pilihan_E'=>$request->pilihan_E,
            'skor_benar'=>$request->skor_benar,
            'skor_salah'=>$request->skor_salah,
        ]);
        return response()->jsonn([
            'message'=>'Soal '.$soal->no_soal.'Created'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Soal_jawaban $soal_jawaban)
    {
        return response()->json([
            'data'=>$soal_jawaban
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Soal_jawaban $soal_jawaban)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Soal_jawaban $soal_jawaban)
    {
        $soal_jawaban->id_mapel = $request->id_mapel;
        $soal_jawaban->id_kelas = $request->id_kelas;
        $soal_jawaban->no_soal = $request->no_soal;
        $soal_jawaban->soal = $request->soal;
        $soal_jawaban->gambar = $request->gambar;
        $soal_jawaban->pilihan_A = $request->pilihan_A;
        $soal_jawaban->pilihan_B = $request->pilihan_B;
        $soal_jawaban->pilihan_C = $request->pilihan_C;
        $soal_jawaban->pilihan_D = $request->pilihan_D;
        $soal_jawaban->pilihan_E = $request->pilihan_E;
        $soal_jawaban->skor_benar = $request->skor_benar;
        $soal_jawaban->skor_salah = $request->skor_salah;
        $soal_jawaban->save();
        return response()->json([
            'message'=>'Soal '.$soal_jawaban->no_soal.' updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Soal_jawaban $soal_jawaban)
    {   
        $soal_jawaban->delete();
        return response()->json([
            'message' => 'Soal '.$soal_jawaban->no_soal.' deleted'
        ]);
    }
}
