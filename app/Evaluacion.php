<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table = 'evaluacions';

    
    protected $fillable = ['users_id', 'gestions_id','plantillas_id', 'hora','fecha','grabacion', 'comentario', 'cantidad_evaluar','calificacion',];
   

  
    /**
     * Get the evaluacion that owns the gestion.
     */
    public function gestion()
    {
        return $this->belongsTo('App\Gestion');
    }

    /**
     * Get the plantilla that owns the users.
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function plantillas()
    {
        return $this->hasMany('App\Plantilla','plantillas_id');
    }


    public function plantilla()
    {
        return $this->belongsTo('App\Plantilla');
    }
}
