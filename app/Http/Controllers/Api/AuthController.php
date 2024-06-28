<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
           
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6'
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
    
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            return response()->json([
                "message" => 'Usuario registrado satisfactoriamente',
                "status" => Response::HTTP_CREATED
            ], Response::HTTP_CREATED);

        } catch (\Throwable $th) {
           return response()->json([
                "message" => $th->getMessage(),
                "status" => Response::HTTP_INTERNAL_SERVER_ERROR
           ]);
        }
    }

    public function login(Request $request)
    {
        
        try {

            $credentials = $request->only('email', 'password');

            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Credenciales no validas'], 401);
            }
            
            return response()->json(['token' => $token], 200);

        } catch (JWTException $e) {
            return response()->json([
                'error' => 'No se pudo crear el token. ' . $e->getMessage()
            
            ], 500);
        }

    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $existingUser = User::where('email', $user->email)->first();

            if ($existingUser) {
                $token = JWTAuth::fromUser($existingUser);
                return response()->json(['token' => $token]);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => bcrypt('password')
                ]);

                $token = JWTAuth::fromUser($newUser);
                return response()->json(['token' => $token]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}

