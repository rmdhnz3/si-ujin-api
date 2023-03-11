<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
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
        $siswa = $this->siswa->query()
        ->with(['kelas'])
        ->when($request->filled('kelas_id'), function ($query) use ($request) {
            return $query->where('kelas_id', 'LIKE','%' . $request->kelas_id.'%');
        })
        ->when($request->filled('search'), function ($query) use ($request) {
           return $query->where(function($query) use ($request){
                    $query->where('nama', 'LIKE','%' . $request->search.'%')
                         ->orWhere('nis', 'LIKE','%' . $request->search.'%');
           });
        },function($query){
            return $query->whereNotNull('kelas_id');
        }
     );
       

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
    public function store(Request $request,Kelas $kelas)
    {
        Siswa::create([
            'kelas_id'=>$request->kelas_id,
            'absen'=>$request->absen,
            'nis'=>$request->nis,
            'nama'=>$request->nama,
            'jenis_kelamin'=>$request->jenis_kelamin,
        ]);
        return response()->json([
            'message'=>'Siswa created'
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
        $siswa->kelas_id = $request->kelas_id;
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
