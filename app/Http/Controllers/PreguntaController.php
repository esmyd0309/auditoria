<?php

namespace App\Http\Controllers;

use App\Plantilla;
use App\User;
use App\Pregunta;
use App\Respuesta;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;
class PreguntaController extends Controller
{



    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return response()->json([
                ['id' =>1,'name' => 'gregunta1'],
                ['id' =>2,'name' => 'gregunta2'],
                ['id' =>3,'name' => 'gregunta3'],
                ['id' =>4,'name' => 'gregunta4']
            ]);
        }
        return view('plantillas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $plantilla_id=$id;  
       
        return view('preguntas.create',compact('plantilla_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $plantilla_id=$id;  
       
       //$pregunta = $plantilla->preguntas;
            //if($request->ajax()){
               // dd($pregunta);   

        $validatedData = $request->validate([
            'pregunta' => 'required',
            
            'tipo' => 'required',
         
        ]);
               
            $now=Carbon::now();

            $pregunta = new Pregunta;
            $pregunta->plantillas_id =$plantilla_id;
            $pregunta->pregunta = $request->input('pregunta');
            $pregunta->peso = $request->input('peso');
            $pregunta->tipo = $request->input('tipo');
            $pregunta->descripcion = $request->input('descripcion');
            $pregunta->fecha = $now->format('Y-m-d');

            $pregunta->save();

           
            if ($pregunta->tipo == 'cerrada') {//SI LA PREGUNTA ES CERRADA GUARDO AUTOMATICAMENTE EL SI Y EL NO. COMO RESPUESTAS A ESA PREGUNTA

                $respuestas = new Respuesta;
                    $respuestas->preguntas_id = $pregunta->id;
                    $respuestas->respuesta = 'SI';
                    $respuestas->save();
                
            }
           /* if ($pregunta->tipo == 'cerrada') {
                $respuestas = new Respuesta;
                    $respuestas->preguntas_id = $pregunta->id;
                    $respuestas->respuesta = 'NO';
                    $respuestas->save();
            }*/
            
           
           


            return redirect()->route('plantillas.show', $plantilla_id)
            ->with('info', 'Pregunta Guardada con Éxito');
        }
    
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $preguntas)
    {
        //dd($preguntas);

        $respuesta = $preguntas->respuestas;
        //dd($respuesta);
        return view('preguntas.show', compact('preguntas','respuesta'));

  
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregunta $pregunta)

    {
        return view('preguntas.edit', compact('pregunta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pregunta $pregunta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $preguntas, $id)
    {

        //obtengo el id de la plantilla 
        $plantilla_id=$id; 
        $preguntas->delete();
       
        return redirect()->route('plantillas.show', $plantilla_id)
        ->with('info', ' Pregunta Eliminada Correctamente');
    }

    public function destroypregunta(Request $request, $id){
        if ($request->ajax()) {
            $pregunta = Pregunta::find($id);
            $pregunta->delete();
            $pregunta_total = Pregunta::all()->count();

            return \Response::json([
                'total' => $pregunta_total,
                'message' => $pregunta->pregunta . ' Fue eliminada correctamente' 
            ]);
        }
    }
}
