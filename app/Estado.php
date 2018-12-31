<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{

    protected $table = 'estados';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre', 'status', ];

    public function tarea()
    {
        return $this->belongsTo('App\Tarea', 'departamentos_id');
    }
}
