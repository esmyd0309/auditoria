<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    protected $table = 'gestions';
    public $timestamps = false;
    
    protected $fillable = [
        'fecha', 'hora','agente', 'supervisor','producto','nombres_cliente', 'telefono', 'deuda','pagos','resultado_gestion', 'duracion_llamada',
    ];
   

    /**
     * Get the evalucion for the blog gestion.
     */
    public function evaluaciones()
    {
        return $this->hasMany('App\Evaluacion','gestions_id');
    }

    public function tempgestiones()
    {
        return $this->hasMany('App\Tempgestione','gestions_id');
    }

    public function scopeAgente($query, $agente)
    {
        if($agente)
        return $query->where('agente', 'LIKE', "%$agente%"); 
    }
    
    public function scopeSupervisor($query, $supervisor)
    {
        if($supervisor)
        return $query->where('supervisor', 'LIKE', "%$supervisor%"); 
    }


    public function scopeNombres_cliente($query, $nombres_cliente)
    {
        if($nombres_cliente)
        return $query->where('nombres_cliente', 'LIKE', "%$nombres_cliente%"); 
    }

    public function plantillas()
    {
        return $this->belongsTo('App\Plantilla');
    }
}
