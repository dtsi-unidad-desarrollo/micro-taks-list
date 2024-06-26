<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /*
    getJWTIdentifier(): Implementa el método de la interfaz JWTSubject para obtener el identificador que será almacenado en el claim sub del JWT.
    En este caso, retorna la clave primaria del usuario.
    getJWTCustomClaims(): Implementa el método de la interfaz JWTSubject para añadir claims personalizados al JWT. Aquí se retorna un array vacío, pero podrías añadir claims adicionales según tus necesidades.
    isAdmin(): Método personalizado que verifica si el usuario tiene el rol de administrador (role === 'admin'). Este método es utilizado por el middleware 
    AdminMiddleware para autorizar a usuarios con privilegios de administrador en ciertas rutas.    

     */
    protected $fillable = [
        'name', 'email', 'password', 'google_id', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Verificar si el usuario esadmin
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
