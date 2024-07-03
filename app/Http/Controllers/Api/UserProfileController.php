<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'phone' => 'sometimes|string|max:20',
            'address' => 'sometimes|string|max:255',
            'profile_photo' => 'sometimes|image|max:1024'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Actualización del perfil
        $user = Auth::user();
        $updatedData = []; // Array para almacenar los datos actualizados

        if ($request->has('name')) {
            $user->name = $request->name;
            $updatedData['name'] = $request->name;
        }
        if ($request->has('phone')) {
            $user->phone = $request->phone;
            $updatedData['phone'] = $request->phone;
        }
        if ($request->has('address')) {
            $user->address = $request->address;
            $updatedData['address'] = $request->address;
        }
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
            $updatedData['profile_photo'] = $path; // Puede ser la ruta o el nombre del archivo
        }

        $user->save();

        return response()->json([
            'message' => 'Perfil actualizado correctamente',
            'data' => $updatedData,
        ], 200);
    }
}