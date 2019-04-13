<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tempgestione;
use DB;
use PDO;
use App\Evaluacion;
use App\Asterisk;
use App\Vicidial_list;
use App\Recording_log;
use App\Vicidial_log;
use App\Temporal;
use Datetime;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


use Illuminate\Database\Query\Builder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
class TempgestioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
       $idtarea = $id;

       $evaluaciones = DB::table('evaluacions')->select('gestions_id')->where('tarea_id',$idtarea)->first();
       $evaluacionesx = DB::table('evaluacions')->select('gestions_id')->where('tarea_id',$idtarea)->get();
   


     //sacar el grupo
     
     $grupos = DB::table('tareas')->select('departamentos_id')->where('id',$idtarea)->get();
     foreach ($grupos as  $grupo) {
       $grupos =$grupo->departamentos_id;
     }

      //sacar el estatus
     $estados = DB::table('tareas')->select('estados')->where('id',$idtarea)->get();
     foreach ($estados as  $estado) {
       $estados =$estado->estados;
     }
  

     
 
    
    /**traer los id_gestion que ya se encuentran trabajados */
        $gestionados = DB::table('evaluacions')
                     ->select(DB::raw('gestions_id'))
                     ->where('tarea_id',$idtarea)
                     ->get();

                     foreach ($gestionados as  $gestionadoss) {
                      $gestions_id =$gestionadoss->gestions_id;
                    }

                    /**no traer los id que ya se estan trabajando por los auditores */
                    $temporal = DB::table('temporals')
                    ->select(DB::raw('gestion_id'))
                    ->where('tarea_id',$idtarea)
                    ->get();

                    foreach ($temporal as  $temporals) {
                     $gestion_id =$temporals->gestion_id;
                     
                   }


                   
$date = new DateTime(); // Por defecto la hora actual
$call_date = $date->modify('-20 minutes');
//dd($evaluaciones);

/***traemos los datos del predictivo segun el id de la plantilla y sacamos los que ya trabajamos.  */
      if ($evaluaciones==null){

        
        $gestiontm = Vicidial_log::where('user_group',$grupos)->where('status',$estados)->where('call_date','<',$call_date)->orderBy('uniqueid', 'desc')
        ->limit(20)
        ->get();
         
        



       
     return view('temp.index', compact('gestiontm','idtarea','evaluaciones','audiox'));
     
      }

      


        $gestiontm = Vicidial_log::where('user_group',$grupos)
        ->where('status',$estados)
        ->where('lead_id','!=',$gestions_id)
        ->where('lead_id','!=',$gestion_id)
        ->where('call_date','<',$call_date)
        ->orderBy('uniqueid', 'desc')
        ->limit(20)
        ->get();
        // dd($gestiontm);

               /**
    * traer los datos de la grabacion
    */
 
    
    foreach ($gestiontm as  $gestiontms) {
        
      $location=$gestiontms->uniqueid;
      $audiox = DB::connection('asterisk')->select("SELECT location,start_time FROM recording_log WHERE vicidial_id='$location' and lead_id='$gestion_id'");
      
}


        /*$gestiontm = Vicidial_log::join('recording_log', 'vicidial_log.uniqueid', '=', 'recording_log.vicidial_id')
        ->select('vicidial_log.*', 'recording_log.vicidial_id','recording_log.location')->where('status',$estados)->where('recording_log.location','<>','')->orderBy('uniqueid', 'desc')
        ->limit(15)
        ->get();*/

        //dd($gestiontm);


     return view('temp.index', compact('gestiontm','idtarea','evaluaciones','gestionados','audiox'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
