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

class DetalleTareaExport implements FromQuery,WithHeadings
{
    
    use Exportable;

   

    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'IdGestion',
            'Tarea',
            'Plantilla',
            'Preguntas',
            'Peso',
            'Respuesta',
            'Descalificación',
            'Calificacion Final',
            'Comentario',
            'Agente',
            'Grupo',
            'Estado',
            'Cedula',
            'Duracion de llamada',
            'Grabacion',
            'Auditor',
            
            
        ];
    }


    public function __construct(int $id)
    {
        $this->id = $id;

        return $this;
    }



    public function query()
    {
        
        return PreguntaRespuesta::query()->select(
        'evaluacions.gestions_id as IdGestion',
        'tareas.nombre as Tarea',
        'plantillas.nombre as Plantilla',
        'preguntas.pregunta as Preguntas',
        'preguntas.peso as Peso',
        'respuestas.respuesta',
        'pregunts_respuests.calificacion as descalificacion',
        'evaluacions.calificacion as calificacion',
        'pregunts_respuests.comentario',
        'pregunts_respuests.agente',
        'pregunts_respuests.grupo',
        'pregunts_respuests.estado',
        'pregunts_respuests.cedula AS cliente',
        'pregunts_respuests.seg',
        'pregunts_respuests.grabacion',
        'users.name as Auditor')
        ->from('pregunts_respuests')
        ->join('preguntas', 'pregunts_respuests.preguntas_id', '=', 'preguntas.id')
        ->join('respuestas', 'pregunts_respuests.respuestas_id', '=', 'respuestas.id')
        ->join('evaluacions', 'pregunts_respuests.evaluacions_id', '=', 'evaluacions.id')
        ->join('users', 'evaluacions.users_id', '=', 'users.id')
        ->join('plantillas', 'evaluacions.plantillas_id', '=', 'plantillas.id')
        ->join('tareas', 'evaluacions.tarea_id', '=', 'tareas.id')
        ->where('pregunts_respuests.tarea_id',$this->id);
       

       
    }
    


}
