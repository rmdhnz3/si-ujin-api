<?php

namespace App\Http\Controllers\API;

use App\Models\Soal_jawaban;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class SoalJawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private soal_jawaban $soal_jawaban;
    public function __construct()
    {
        $this->soal_jawaban = new Soal_jawaban();
    }

    public function index(Request $request)
    {
        $soljab = $this->soal_jawaban->query()
        ->orderBy('no_soal','ASC')
        ->with(['kelas'])
        ->with(['mapel']);
        $soljab->when($request->filled('mapel'), function ($query) use ($request){
        $query->whereHas('mapel', function ($query) use ($request){
                return $query->where('mapel','LIKE','%'.$request->mapel.'%');
        });
        });
        $data = $soljab->get();
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
        $rawsoal = $request->soal;
        $rawjawabana = $request->pilihan_A;
        $rawjawabanb = $request->pilihan_B;
        $rawjawabanc = $request->pilihan_C;
        $rawjawaband = $request->pilihan_D;
        $rawjawabane = $request->pilihan_E;
        $soalfix = nl2br($rawsoal);
        $jawabana = nl2br($rawjawabana);
        $jawabanb = nl2br($rawjawabanb);
        $jawabanc = nl2br($rawjawabanc);
        $jawaband = nl2br($rawjawaband);
        $jawabane = nl2br($rawjawabane);
        $soal = Soal_jawaban::create([
            'id_mapel'=>$request->id_mapel,
            'id_kelas'=>$request->id_kelas,
            'no_soal'=>$request->no_soal,
            'soal'=>$soalfix,
            'gambar'=>$request->gambar,
            'pilihan_A'=>$jawabana,
            'pilihan_B'=>$jawabanb,
            'pilihan_C'=>$jawabanc,
            'pilihan_D'=>$jawaband,
            'pilihan_E'=>$jawabane,
            'jawaban_benar'=>$request->jawaban_benar,
        ]);
        return response()->json([
            'message'=>'Soal '.$soal->no_soal.' Created',
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
        $soal_jawaban->jawaban_benar = $request->jawaban_benar;
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
