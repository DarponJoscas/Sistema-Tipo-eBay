<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'name_usuario',
        'contrasena_usuario',
        'id_rol',
        'estado',
        'imagen_perfil',
        'direccion',
        'telefono',
    ];

    protected $hidden = ['contrasena_usuario'];

    public function getAuthPassword()
    {
        return $this->contrasena_usuario;
    }

    public function getJWTIdentifier()
    {
        return (string) $this->id_usuario;
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
