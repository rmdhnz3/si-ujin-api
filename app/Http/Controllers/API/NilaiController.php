<?php

namespace App\Http\Controllers\API;

use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private nilai $nilai;
    public function __construct()
    {
        $this->nilai = new Nilai();
    }
    public function index(Request $request)
    {
        $nilai = $this->nilai->query()
        ->with(['mapel'])
        ->with(['siswa'])
        ->when($request->filled('id_siswa'), function ($query) use ($request) {
            return $query->where('id_siswa', 'LIKE','%' . $request->id_siswa.'%');
        });

        $data = $nilai->get();
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
        Nilai::create([
            'id_siswa'=>$request->id_siswa,
            'id_mapel'=>$request->id_mapel,
            'nilai'=>$request->nilai,
        ]);
        return response()->json([
            'message'=>"Data Succesfully Inserted"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Nilai $nilai)
    {
        return response()->json([
            'data'=>$nilai
        ]);
    }

    /**
     * Deleted Show the form for editing the specified resource.
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nilai $nilai)
    {
        $nilai->id_siswa = $request->id_siswa;
        $nilai->id_mapel = $request->id_mapel;
        $nilai->nilai = $request->nilai;
        $nilai->save();
        return response()->json([
            'message'=>"Data Succesfully Updated"
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return response()->json([
            'message'=>'Nilai Deleted'
        ]);
    }
}
