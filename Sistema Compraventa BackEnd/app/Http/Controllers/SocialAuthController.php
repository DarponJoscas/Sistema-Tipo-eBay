<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

class SocialAuthController extends Controller
{
    // Redirigir a Google para la autenticación
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            // Obtener la información del usuario desde Google
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Buscar o crear un usuario con el correo electrónico obtenido de Google
            $user = User::firstOrCreate(
                ['email_usuario' => $googleUser->getEmail()],
                [
                    'name_usuario' => $googleUser->getName(),
                    'contrasena_usuario' => Hash::make(str_random(24)), 
                    'id_rol' => 2,
                    'estado' => 1,
                    'fecha_creacion' => now(),
                    'imagen_perfil' => $googleUser->getAvatar(),
                ]
            );

            // Generar el token JWT para el usuario autenticado
            $token = JWTAuth::fromUser($user);

            return response()->json(['token' => $token, 'user' => $user]);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al autenticar con Google', 'error' => $e->getMessage()], 500);
        }
    }
}
