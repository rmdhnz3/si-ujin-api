<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jawaban = Jawaban::all();
        return response()->json([
            'data'=>$jawaban
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
        $jawaban = Jawaban::create([
            'id_soal_jawaban'=>$request->id_soal_jawaban,
            'id_siswa'=>$request->id_siswa,
            'jawaban'=>$request->jawaban
        ]);
        return response()->json([
            'message'=>"Succesfully created jawaban ".$jawaban->jawaban
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jawaban $jawaban)
    {
        return response()->json([
            'data' => $jawaban
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jawaban $jawaban)
    {
    //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jawaban $jawaban)
    {
        $jawaban -> id_soal_jawaban = $request -> id_soal_jawaban;
        $jawaban -> id_siswa = $request -> id_siswa;
        $jawaban -> jawaban = $request -> jawaban;
        $jawaban->save();
        return response()->json([
            'message'=>'Jawaban '.$jawaban->jawaban.' updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jawaban $jawaban)
    {
        $jawaban->delete();
        return response()->json([
            'message'=>'Jawaban '.$jawaban->jawaban.' deleted'
        ]);

    }
}
