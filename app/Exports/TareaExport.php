<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Reportedetalle;
use App\PreguntaRespuesta;
use App\Evaluacion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class TareaExport implements FromQuery,WithHeadings
{
    
    use Exportable;

   

    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Id',
            'Fecha Evaluacion',
            'Grupo',
            'Lead_id',
            'Estado',
            'Agente',
            'Calificacion',
            'Cedula',
            'Nombres',
            'Telefono',
            'Grabacion',
            'Auditor',
            'Plantilla',
            'Tarea',
            
        ];
    }


    public function __construct(int $id)
    {
        $this->id = $id;

        return $this;
    }



    public function query()
    {
        
        return Evaluacion::query()->select('evaluacions.id','evaluacions.created_at','evaluacions.grupo',
        'evaluacions.gestions_id','evaluacions.estado', 'evaluacions.agente','evaluacions.calificacion','evaluacions.cedula',
        'evaluacions.nombre','evaluacions.telefono','evaluacions.grabacion','users.name','plantillas.nombre AS plantilla','tareas.nombre AS tarea')
        ->from('evaluacions')
        ->join('users', 'evaluacions.users_id', '=', 'users.id')
        ->join('plantillas', 'evaluacions.plantillas_id', '=', 'plantillas.id')
        ->join('tareas', 'evaluacions.tarea_id', '=', 'tareas.id')
        ->where('evaluacions.tarea_id',$this->id);
       

       
    }


}
