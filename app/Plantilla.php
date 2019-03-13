<?php

namespace App;
use App\Pregunta;
use Illuminate\Database\Eloquent\Model;

class Plantilla extends Model
{
    protected $table = 'plantillas';
   
    protected $fillable = [
        'users_id', 'nombre','descripcion', 'gestion','status','ciudad', 'maxima_calificacion','filenames',
    ];
   
    public function preguntas()
    {
        return $this->hasMany('App\Pregunta','plantillas_id');
    }

    public function tareas()
    {
        return $this->hasMany('App\Tarea','plantillas_id');
    }

    public function evaluaciones()
    {
        return $this->belongsTo('App\Evaluacion');
    }

   
    public function users()
    {
        return $this->belongsTo('App\User');
    }

   

}
