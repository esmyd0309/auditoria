<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Reportedetalle;
use App\PreguntaRespuesta;
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
            'Fecha',
            'Grupo',
            'Agente',
            'Estado',
            'Cedula',
            'Nombres',
            'Telefono',
            'Grabacion',
            'Calificacion',
            'Preguntas',
            'Respuestas',
            'Peso',
            'Comentario',
            'Descacalificacion',
            
        ];
    }


    public function __construct(int $id)
    {
        $this->id = $id;

        return $this;
    }



    public function query()
    {
        
        return PreguntaRespuesta::query()
        ->select('evaluacions.id','pregunts_respuests.created_at', 'evaluacions.grupo','evaluacions.agente','evaluacions.estado','evaluacions.cedula','evaluacions.nombre','evaluacions.telefono','evaluacions.grabacion','evaluacions.calificacion'
        ,'preguntas.pregunta','respuestas.respuesta','preguntas.peso','pregunts_respuests.comentario')
        ->from('pregunts_respuests')
        ->join('evaluacions', 'evaluacions.id', '=', 'pregunts_respuests.evaluacions_id')
        ->join('tareas', 'pregunts_respuests.tarea_id', '=', 'tareas.id')
        ->join('preguntas', 'pregunts_respuests.preguntas_id', '=', 'preguntas.id')
        ->join('respuestas', 'pregunts_respuests.respuestas_id', '=', 'respuestas.id')
        ->where('pregunts_respuests.tarea_id',$this->id);

       
    }


}
