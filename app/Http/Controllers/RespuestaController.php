<?php

namespace App\Http\Controllers;
use App\Plantilla;
use App\User;
use App\Pregunta;
use Carbon\Carbon;
use Auth;
use App\Respuesta;
use Illuminate\Http\Request;

class RespuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pregunta_id=$id;
        $pregunta = Pregunta::where('id',$pregunta_id)->get();//traigo las preguntas relacionadas con el id de la plantilla antes seleccionada
 
     
        return view('respuestas.create',compact('pregunta_id','pregunta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $pregunta_id=$id;  
       
        //$pregunta = $plantilla->preguntas;
             //if($request->ajax()){
                // dd($pregunta);    
                 
        /*$validatedData = $request->validate([
            'comentario' => 'required',
        
        ]);*/
                 $now=Carbon::now();
 
             $respuesta = new Respuesta;
             $respuesta->preguntas_id =$pregunta_id;
             $respuesta->respuesta = $request->input('respuesta');
             $respuesta->comentario = $request->input('comentario');
             $respuesta->valor_1 = $request->input('valor_1');
             $respuesta->fecha = $now->format('Y-m-d');

             $respuesta->save();

             return redirect()->route('preguntas.show', $pregunta_id)
             ->with('info', 'Respuesta Guardada con Éxito');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function show(Respuesta $respuesta)
    {
        return view('respuestas.show', compact('respuesta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(Respuesta $respuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Respuesta $respuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Respuesta $respuestas, $id)
    {

        //obtengo el id de la plantilla 
        $pregunta_id=$id; 
        $respuestas->delete();
       
        return redirect()->route('preguntas.show', $pregunta_id)
        ->with('info', ' Respuesta Eliminada Correctamente');
    }
}
