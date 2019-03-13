<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tareas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre', 'descripcion','cantidad_registros','registros_agentes', 'fecha', 'status','departamentos_id','estados','fechadesde','fechahasta','plantillas_id',
    ];


    public function tempgestiones()
    {
        return $this->hasMany('App\Tempgestione','tareas_id');
    }

    public function grupos()
    {
        return $this->belongsTo('App\Departamento','user_group');
    }

    public function estados()
    {
        return $this->belongsTo('App\Estados', 'status');
    }

    
    public function plantilla()
    {
        return $this->belongsTo('App\Plantilla','plantillas_id');
    }

    public function evaluacion()
    {
        return $this->hasMany('App\Evaluacion');
    }


    //query scope

    public function scopeTarea($query, $tarea)
    {
        if($tarea)
        return $query->where('nombre', 'LIKE', "%$tarea%"); 
    }
    
    
    public function scopeDepartamento($query, $departamento)
    {
        if($departamento)
        return $query->where('departamento', 'LIKE', "%$departamento%"); 
    }


    public function scopeStatus($query, $status)
    {
        if($status)
        return $query->where('status', 'LIKE', "%$status%"); 
    }


}
