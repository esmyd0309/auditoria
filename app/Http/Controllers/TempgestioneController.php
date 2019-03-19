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
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
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

       $evaluaciones = DB::table('evaluacions')->select('gestions_id')->where('tarea_id',$idtarea)->get();
   


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
  
    //** verificar si ya esta la ruta del audio */
       
   /* foreach ($evaluaciones as  $evaluacionesx) {
        $gestions_id =$evaluacionesx->gestions_id;
        $location = DB::connection('asterisk')->select("SELECT uniqueid FROM vicidial_log WHERE lead_id='$gestions_id'");
      
      }
     
      foreach ($location as  $locationx) {
       
        
        $audiox = DB::connection('asterisk')->select("SELECT location FROM recording_log WHERE vicidial_id=$locationx->uniqueid");
       
   
        dd($audiox);
      }
      */
    


      if ($evaluaciones!=''){
        $gestiontm = Vicidial_log::where('user_group',$grupos)->where('status',$estados)->orderBy('uniqueid', 'desc')
        ->limit(20)
        ->get();
         //dd($gestiontm);

        /*$gestiontm = Vicidial_log::join('recording_log', 'vicidial_log.uniqueid', '=', 'recording_log.vicidial_id')
        ->select('vicidial_log.*', 'recording_log.vicidial_id','recording_log.location')->where('status',$estados)->where('recording_log.location','<>','')->orderBy('uniqueid', 'desc')
        ->limit(15)
        ->get();*/

        //dd($gestiontm);


     return view('temp.index', compact('gestiontm','idtarea','evaluaciones'));
      }

      
           $gestiontm = Vicidial_log::where('user_group',$grupos)->where('status',$estados)->orderBy('uniqueid', 'desc')
           ->limit(20)
           ->get();
            
          // dd($gestiontm);
          
        return view('temp.index', compact('gestiontm','idtarea','evaluaciones'));
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
