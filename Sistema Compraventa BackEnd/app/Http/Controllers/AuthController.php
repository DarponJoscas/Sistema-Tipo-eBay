<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Registro de un nuevo usuario
    public function register(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'name_usuario' => 'required|string|max:255',
            'contrasena_usuario' => 'required|string|min:8',
        ]);

        // Crear un nuevo usuario
        $user = User::create([
            'name_usuario' => $request->name_usuario,
            'contrasena_usuario' => Hash::make($request->contrasena_usuario),
            'estado' => 1,
            'direccion' => Hash::make($request->direccion),
            'telefono' => Hash::make($request->telefono),
            'id_rol' => 1,
        ]);

        // Generar un token para el nuevo usuario
        $token = JWTAuth::fromUser($user);

        // Devolver el token y los detalles del usuario
        return response()->json(['token' => $token, 'user' => $user], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name_usuario' => 'required',
            'contrasena_usuario' => 'required'
        ]);

        $user = User::where('name_usuario', $credentials['name_usuario'])->first();

        if (!$user || !Hash::check($credentials['contrasena_usuario'], $user->contrasena_usuario)) {
            \Log::error('No se pudo generar el token.', $credentials);
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        $token = JWTAuth::fromUser($user);

        return response()->json(['token' => $token, 'user' => $user]);
    }


    // Método para logout (cerrar sesión)
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Sesión cerrada']);
    }

    // Método para refrescar el token
    public function refresh()
    {
        return response()->json(['token' => JWTAuth::refresh()]);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }
}
