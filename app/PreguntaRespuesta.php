<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaRespuesta extends Model
{
    protected $table = 'pregunts_respuests';
    protected $primaryKey = 'id';

    protected $fillable = [
        'preguntas_id', 'respuestas_id','evaluacions_id','calificacion', 'fecha','comentario',
    ];
}
