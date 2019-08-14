<?php

namespace App\Http\Controllers;
use App\Gestion;
use App\Evaluacion;
use App\Plantilla;
use App\Pregunta;
use App\Respuesta;
use App\User;
use App\Tempgestione;
use App\Tarea;
use App\Vicidial_log;
use App\PreguntaRespuesta;
use App\Recording_log;
use App\Temporal;
use Illuminate\Http\Request;
use PDO;
use lists;
use DB;
use Lang;
use DateTime;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

use App\Exports\ReportedetalleExport;
use App\Exports\TareaExport;
use App\Exports\DetalleTareaExport;
use Maatwebsite\Excel\Facades\Excel;

class CalidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      

        $plantilla_grupos = DB::select(" 
         SELECT DISTINCT  d.nombre,d.id FROM evaluacions AS a,  plantillas AS d 
        WHERE a.plantillas_id=d.id ORDER BY a.created_at desc
        ");
        $departamento = DB::select(" 
        SELECT DISTINCT id,departamento,equipo FROM departamentos ORDER BY departamento DESC 
       ");

       $departamento = DB::connection('asterisk')->select("SELECT user_group,group_name FROM vicidial_user_groups order by user_group asc");

        return view('calidad.reporteagentes',compact('plantilla_grupos','departamento'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    { 
      
       
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function consulta(Request $request)
    {
        //dd($request);
        $plantilla = $request->plantilla;
        $grupo = $request->grupo;
        $fechadesde = $request->fechadesde;
        $fechahasta = $request->fechahasta;
      $results = DB::select(" 
      SELECT AVG(a.calificacion) AS promedio, a.agente,b.nombre FROM evaluacions a, plantillas AS b
      WHERE a.plantillas_id=$plantilla 
      AND grupo='$grupo'
      AND a.fecha  >=  '$fechadesde'
      AND a.fecha  <= '$fechahasta'
      AND a.plantillas_id=b.id
      GROUP BY a.agente,b.nombre 
      ORDER BY a.agente ASC 

    ");
    
    return response()->json($results);

    }
   
    public function pdf(){
        $pdf = \PDF::loadView('calidad.pdf');
        return $pdf->download('ejemplo.pdf');
   }

   

    /**
     * Display the specified resource.
     *
     * @param  \App\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluacion $evaluacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluacion $evaluacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluacion $evaluacion)
    {
        //
    }


    public function calidad()
    {
        
        $grupo = DB::select(" 
        SELECT DISTINCT * FROM departamentos
        ");
        $plantilla =  DB::table('plantillas')
            ->select('id','nombre','descripcion')
            ->distinct()
            ->get();

           // dd($grupo);
        return view('calidad.reporteagentes',compact('plantilla','grupo'));
    }

    
}
