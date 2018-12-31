<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre', 'status', ];

    public function tarea()
    {
        return $this->belongsTo('App\Tarea', 'departamentos_id');
    }

}
