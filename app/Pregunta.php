<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'preguntas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'plantillas_id', 'pregunta','descripcion','peso', 'tipo', 'cantidad','fecha', 'status',
    ];


 
    public function plantilla()
    {
        return $this->belongsTo('App\Plantilla','plantillas_id');
    }

    
    //relacion uno a muchos

    public function respuestas(){
        return $this->hasMany('App\Respuesta', 'preguntas_id');//una image puede tener muchos likes
    }

    public function preguntarespuesta(){
        return $this->hasMany('App\PreguntaRespuesta', 'preguntas_id');//una image puede tener muchos likes
    }

  

  /*  public static function preguntas($id){

        return Pregunta::where('plantillas_id','=', $id)->get();
    }*/

}
