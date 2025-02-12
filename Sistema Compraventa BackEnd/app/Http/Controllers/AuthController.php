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
            'email_usuario' => 'required|string|email|max:255|unique:usuarios',
            'contrasena_usuario' => 'required|string|min:6',
            'id_rol' => 'required|in:2,3',
        ]);

        // Crear un nuevo usuario
        $user = User::create([
            'name_usuario' => $request->name_usuario,
            'email_usuario' => $request->email_usuario,
            'contrasena_usuario' => Hash::make($request->contrasena_usuario),
            'id_rol' => $request->id_rol,
            'estado' => 1,
            'fecha_creacion' => now(),
            'direccion' => Hash::make($request->direccion),
            'telefono' => Hash::make($request->telefono),
        ]);

        // Generar un token para el nuevo usuario
        $token = JWTAuth::fromUser($user);

        // Devolver el token y los detalles del usuario
        return response()->json(['token' => $token, 'user' => $user], 201);
    }

    // Método de login
    public function login(Request $request)
    {
        
        $credentials = $request->validate([
            'email_usuario' => 'required|email',
            'contrasena_usuario' => 'required'
        ]);

        // Buscar al usuario por su correo
        $user = User::where('email_usuario', $credentials['email_usuario'])->first();

        if (!$user || $credentials['contrasena_usuario'] !== $user->contrasena_usuario) {
            \Log::error('No se pudo generar el token.', $credentials); 
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        // Intentamos generar el token
        $token = JWTAuth::fromUser($user);

        // Si la autenticación es exitosa, regresamos el token y el usuario
        return response()->json(['token' => $token, 'user' => $user]);
    }

    // Método para logout (cerrar sesión)
    public function logout()
    {
        // Invalidar el token actual
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Sesión cerrada']);
    }

    // Método para refrescar el token
    public function refresh()
    {
        return response()->json(['token' => JWTAuth::refresh()]);
    }

    // Método para obtener los detalles del usuario autenticado
    public function me()
    {
        return response()->json(auth()->user());
    }
}
