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

use Yajra\DataTables\QueryDataTable;
use Yajra\DataTables\DataTables;
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

  
        $evaluaciones = DB::select("SELECT gestions_id FROM evaluacions WHERE tarea_id= $idtarea");
       //$evaluaciones = DB::table('evaluacions')->select('gestions_id')->where('tarea_id',$idtarea)->first();
       //$evaluacionesx = DB::table('evaluacions')->select('gestions_id')->where('tarea_id',$idtarea)->get();
      //dd($evaluaciones);

     $grupos = DB::table('tareas')->select('departamentos_id','estados','campaign_id','fechadesde','fechahasta')->where('id',$idtarea)->get();
    
     foreach ($grupos as  $grupo) {
       $grupos =$grupo->departamentos_id;
       $estados =$grupo->estados;
       $campaign_id =$grupo->campaign_id;
       $fechadesde =$grupo->fechadesde;
       $fechahasta =$grupo->fechahasta;
     }
    //dd($fechahasta);
     
     
   
    
    /**traer los id_gestion que ya se encuentran trabajados */
        $gestionados = DB::table('evaluacions')
                     ->select(DB::raw('gestions_id'))
                     ->where('tarea_id',$idtarea)
                     ->get();
                     $gestions_idx[]="";
                     foreach ($gestionados as  $gestionadoss) {
                      $gestions_idx[] =$gestionadoss->gestions_id;
                    }
                    //dd($gestions_idx);

                  
                    /**no traer los id que ya se estan trabajando por los auditores */
                    $temporal = DB::table('temporals')
                    ->select(DB::raw('gestion_id'))
                    ->where('tarea_id',$idtarea)
                    ->get();

                    foreach ($temporal as  $temporals) {
                     $gestion_id = $temporals->gestion_id;
                     
                   }

                   $results = DB::select(" 
                   SELECT COUNT(agente) AS cantidad, agente FROM evaluacions WHERE tarea_id=$idtarea 
                    GROUP BY agente 
                   
                   ");
                   
$date = new DateTime(); // Por defecto la hora actual
$call_date = $date->modify('-10 minutes');
$ds= $call_date->format('Y-m-d');
//dd($fechadesde);

$gestiontm = DB::connection('asterisk')->table('vicidial_list')
            ->join('vicidial_log', 'vicidial_list.lead_id', '=', 'vicidial_log.lead_id')
        
            ->select('vicidial_list.lead_id',
                      'vicidial_log.uniqueid',
                      'vicidial_log.status',
                      'vicidial_log.campaign_id',
                      'vicidial_log.user',
                      'vicidial_log.user_group',
                      'vicidial_log.call_date',
                      'vicidial_log.length_in_sec',
                      'vicidial_list.last_name',
                      'vicidial_list.first_name')
            
            
            ->where('vicidial_log.status',$estados)
            ->where('vicidial_log.campaign_id','=',$campaign_id)
            ->whereNotIn('vicidial_log.lead_id',$gestions_idx)
            ->where('vicidial_log.call_date','>=',$fechadesde)
             //sacar por fechas desde
            ->where('vicidial_log.call_date','<=',$fechahasta) //sacar por fechas desde  
           //
           // ->orderBy('vicidial_log.uniqueid', 'desc')
            ->take(350)->get();
            //->paginate(10);

/*
$gestiontm = DB::connection('asterisk')->select("

SELECT a.*,b.*
FROM vicidial_list as b
INNER JOIN vicidial_log as a
ON a.lead_id = b.lead_id
AND   a.user_group='$grupos '
AND   a.status ='$estados'
AND   a.campaign_id='$campaign_id'
AND   a.call_date < '$ds'
AND   a.lead_id not in  ('$gestion_id')
LIMIT 100
")->paginate(15); 
*/


/***traemos los datos del predictivo segun el id de la plantilla y sacamos los que ya trabajamos. 
 * 
 * SELECT * FROM vicidial_log as a , vicidial_list as b
where b.lead_id= a.lead_id
AND   a.user_group='$grupos '
AND   a.status ='$estados'
AND   a.campaign_id='$campaign_id'
AND   a.call_date < '$ds'
AND   a.lead_id not in  ('$gestion_id')
LIMIT 10
 * 
 * 
 * 
 */
    
/**verificamos si ya hay registros o no en nuestra base de auditoria */
//dd($gestions_id);
/*if ($gestionados=''){

  $gestiontm = Vicidial_log::where('user_group',$grupos)
  ->where('status',$estados)
  ->where('campaign_id','=',$campaign_id)
  ->where('lead_id','!=',$gestions_id)
  ->where('call_date','<',$call_date)
  ->orderBy('uniqueid', 'desc')
  ->take(30)
  ->offset(30)
  ->paginate(5);
        */
         
       // dd($gestiontm);

/*
       return response()->json($gestiontm);
       
     return view('temp.index', compact('gestiontm','idtarea','evaluaciones','audiox','results'));
     
      }

      

      
      $gestiontm = Vicidial_log::where('user_group',$grupos)
        ->where('status',$estados)
        ->where('campaign_id','=',$campaign_id)
        ->where('call_date','<',$call_date)
        ->orderBy('uniqueid', 'desc')
        ->take(30)
        ->offset(30)
        ->paginate(5);
       */

    /**
    * traer los datos de la grabacion
    */
      
    
   /* foreach ($gestiontm as  $gestiontms) {
        
      $location=$gestiontms->uniqueid;
      $audiox = DB::connection('asterisk')->select("SELECT location,start_time FROM recording_log WHERE vicidial_id='$location' and lead_id='$gestion_id'");
      
    }*/


        /*$gestiontm = Vicidial_log::join('recording_log', 'vicidial_log.uniqueid', '=', 'recording_log.vicidial_id')
        ->select('vicidial_log.*', 'recording_log.vicidial_id','recording_log.location')
        ->where('status',$estados)
        ->where('recording_log.location','<>','')
        ->orderBy('uniqueid', 'desc')
        ->limit(15)
        ->get();*/

        //dd($gestiontm);

        //return response()->json($gestiontm);
     return view('temp.index', compact('gestiontm','idtarea','evaluaciones','gestionados','audiox','results'));

}

}






