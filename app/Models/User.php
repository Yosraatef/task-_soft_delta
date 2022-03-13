<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{

    use HasApiTokens, HasFactory, Notifiable, HasRoles , HasTranslations;


    protected
        $fillable = [
        'name',
        'phone',
        'status',
        'email',
        'password',
    ];


    protected
        $casts = [
        'name' => 'array'
    ];



    public $translatable = ['name'];


    protected
        $hidden = [
        'password',
        'remember_token',
    ];



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


    public function tasks() {
        return $this->hasMany(Task::class, 'user_id', 'id');
    }
}
