<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tareas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre', 'descripcion','cantidad_registros','registros_agentes', 'fecha', 'status','departamentos_id','estado','fechadesde','fechahasta','plantillas_id',
    ];


    public function tempgestiones()
    {
        return $this->hasMany('App\Tempgestione','tareas_id');
    }

    public function departamentos()
    {
        return $this->belongsTo('App\Departamento');
    }


    public function estados()
    {
        return $this->belongsTo('App\Estados');
    }

    
    public function plantilla()
    {
        return $this->belongsTo('App\Plantilla','plantillas_id');
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
