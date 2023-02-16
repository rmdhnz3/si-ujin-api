<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin  = Admin::all();
        return response()->json([
            'data' => $admin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $admin = Admin::create([
            'username' => $request->username,
            'password' => $request->password,
            'nama_admin'=> $request->nama_admin
        ]);
        return response()->json([
            'data' => $admin
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        return response()->json([
            'data' => $admin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $admin->username = $request->username;
        $admin->password = $request->password;
        $admin->nama_admin = $request->nama_admin;
        $admin->save();
        return response()->json([
            'data' => $admin
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return response()->json([
            'message' => 'Admin Deleted'
        ],204);
    }
}
