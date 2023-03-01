<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->validated();

        if(auth()->attempt($credentials)) {
            $user = auth()->user();

            return response()->json([
                'success' => 'true',
                'message' => 'Login berhasil',
                'data' => $user = auth()->user(),
                'token' => $user->createToken(today())->plainTextToken,
            ]);
        }
        return $this->error('Login gagal');
    }
}