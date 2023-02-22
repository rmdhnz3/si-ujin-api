<?php

namespace App\Http\Controllers\API;

use App\Models\User_mapel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class UserMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_mapel = User_mapel::all();
        return response()->json([
            'data'=>$user_mapel
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
        $var = User_mapel::create([
            'id_mapel'=>$request->id_mapel,
            'id_siswa'=>$request->id_siswa,
            'status'=>$request->status,
        ]);

        return response()->json([
            'message'=>'User mapel created'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User_mapel $user_mapel)
    {
        return response()->json([
          'data'=>$user_mapel  
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User_mapel $user_mapel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User_mapel $user_mapel)
    {
        $user_mapel->id_mapel = $request->id_mapel;
        $user_mapel->id_siswa = $request->id_siswa;
        $user_mapel->status = $request->status;
        $user_mapel->save();
        return response()->json([
            'message'=>'User Mapel '.$user_mapel->id_mapel.' updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User_mapel $user_mapel)
    {
        $user_mapel->delete();
        return response()->json([
            'message' => 'User mapel'.$user_mapel->id_mapel.' deleted'
        ]);
    }
}
