<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{

    protected $table = 'respuestas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'preguntas_id', 'respuesta','comentario','valor_1', 'fecha', 'status',
    ];


      //relacion   muchos a uno

      public function pregunta(){
        return $this->belongsTo('App\Pregunta', 'preguntas_id');//un cometario puede ser creada  solo por un usuario
    }
   
}

