<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Reportedetalle;
use App\Evaluacion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class ReportedetalleExport implements FromQuery,WithHeadings
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
        ];
    }


    public function __construct(int $id)
    {
        $this->id = $id;

        return $this;
    }



    public function query()
    {
        return Evaluacion::query()
        ->select('evaluacions.id','pregunts_respuests.created_at', 'evaluacions.grupo','evaluacions.agente','evaluacions.estado','evaluacions.cedula','evaluacions.nombre','evaluacions.telefono','evaluacions.grabacion','evaluacions.calificacion'
        ,'preguntas.pregunta','respuestas.respuesta','preguntas.peso','pregunts_respuests.comentario')
        ->from('evaluacions')
        ->join('pregunts_respuests', 'pregunts_respuests.evaluacions_id', '=', 'evaluacions.id')
        ->join('preguntas', 'pregunts_respuests.preguntas_id', '=', 'preguntas.id')
        ->join('respuestas', 'pregunts_respuests.respuestas_id', '=', 'respuestas.id')
        ->where('evaluacions.id',$this->id);

       
    }


}
