<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tempgestione;
use DB;
use App\Evaluacion;
use App\Asterisk;
use doesntExist;
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
      // $evaluaciones = Evaluacion::where('tarea_id',$idtarea)->get();//obtengo las gestiones que actualmente estan con esta tarea
       $evaluaciones = DB::table('evaluacions')->select('gestions_id')->where('tarea_id',$idtarea)->get();
     foreach ($evaluaciones as  $evaluacione) {
       $evaluaciones =$evaluacione->gestions_id;
     }
 
        /* 
        *$gestiontm=Tempgestione::orderBy('id', 'DESC')->where('status','on')->where('tareas_id',$idtarea)
        */
        
        /**
         * Lllamar datos de otro servidor
         */

        //Instancio el modelo de mi base de datos
            $death = new Asterisk;
            //seteo mi conecion, ya con mi peticion del modelo
            $death->setConnection('asterisk');
            //defino el rango de mi consulta 
            $gestiontm = $death->all();//muestros las gestiones las cuales no han sido tocadas en mi tarea.

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
