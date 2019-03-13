<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{

    protected $connection = 'asterisk';
    protected $table = 'vicidial_user_groups';

    public function tarea()
    {
        return $this->hasMany('App\Tarea','tareas_id');
    }

}
