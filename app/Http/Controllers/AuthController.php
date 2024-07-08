<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class AuthController extends Controller
{
    public function register(UserRequest $request){

        $user = User::query()->create($request->validated());
          $token = $user->createToken('authToken')->plainTextToken;
          return response()
              ->json(['data'=>$user,'access_token'=>$token]);
    }

    
    public function login(AuthRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['msg' => 'Clave incorrecta'], Response::HTTP_UNAUTHORIZED);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'Hi ' . $user->name,
            'accessToken' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ], Response::HTTP_OK);
    }

    public function user(){

        return 'Authenticated user';
    }
}
