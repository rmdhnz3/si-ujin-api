<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    private siswa $siswa;
    
    public function __construct()
    {
        $this->siswa = new Siswa();
    }
    
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
    {
        $siswa = $this->siswa->query();
        $siswa->when($request->filled('kelas'), function ($query) use ($request) {
            return $query->where('kelas', 'LIKE','%' . $request->kelas.'%');
        });

        $data = $siswa->get();

        return response()->json([
            'data'=> $data
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
        Siswa::create([
            'kelas'=>$request->kelas,
            'absen'=>$request->absen,
            'nis'=>$request->nis,
            'nama'=>$request->nama,
            'jenis_kelamin'=>$request->jenis_kelamin,
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        return response()->json([
            'data'=>$siswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $siswa->kelas = $request->kelas;
        $siswa->absen = $request->absen;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->save();
        return response()->json([
            'Message' => 'Data Succesfully Updated'
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return response()->json([
            'message'=>'Siswa Deleted'
        ]);
    }
}
