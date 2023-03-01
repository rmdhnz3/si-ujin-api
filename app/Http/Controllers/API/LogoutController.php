<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->user()->tokens()->delete();

        return responder()
            ->success([
                'message' => "Berhasil keluar dari aplikasi",
            ])
            ->respond();
    }
}