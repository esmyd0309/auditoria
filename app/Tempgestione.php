<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempgestione extends Model
{
    
    protected $table = 'tempgestiones';

    protected $fillable = ['gestions_id', 'tareas_id','status','departamentos_id',];
   
    
 
    public function tarea()
    {
        return $this->belongsTo('App\Tarea', 'tareas_id');
    }

    public function gestion()
    {
        return $this->belongsTo('App\Gestion', 'gestions_id');
    }
}
