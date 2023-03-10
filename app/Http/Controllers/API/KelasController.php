<?php

namespace App\Http\Controllers\API;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\QueryException;
use App\Http\Requests\KelasStoreRequest;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private kelas $kelas;
    public function __construct()
    {
        $this->kelas = new Kelas();
    }
    public function index()
    {
        $kelasss = $this->kelas->query()
            ->orderBy('jurusan','ASC')
            ->withCount('siswa')
            ->get();
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
    public function store(KelasStoreRequest $request)
    {
        Kelas::create($request->validated());
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
        $kela->save();
        return response()->json([
            'message'=>'Data updated',
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
