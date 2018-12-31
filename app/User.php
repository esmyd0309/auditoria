<?php

namespace App;
use Caffeinated\Shinobi\Traits\ShinobiTrait; 
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Get the preguntas for the blog plantilla.
     */
    public function plantillas()
    {
        return $this->hasMany('App\Plantilla');
    }

    /**
     * Get the preguntas for the blog plantilla.
     */
    public function evaluaciones()
    {
        return $this->hasMany('App\Evaluacion');
    }
}
