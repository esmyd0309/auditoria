<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaRespuesta extends Model
{
    protected $table = 'pregunts_respuests';


    protected $fillable = [
        'preguntas_id', 'respuestas_id','evaluacions_id','calificacion', 'fecha','comentario','agente','telefono', 'grupo','estado','seg',
    ];

   
    public function evaluaciones()
    {
        return $this->belongsTo('App\Evaluacion');
    }

    public function pregunta()
    {
        return $this->hasOne('App\Pregunta');
    }
}
