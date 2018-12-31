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
use App\PreguntaRespuesta;
use Illuminate\Http\Request;
use lists;
use DB;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\ServiceProvider;
class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $agente = $request->get('agente');
        $supervisor = $request->get('supervisor');
        $nombres_cliente = $request->get('nombres_cliente');
      //  dd($request);
        $gestion=Gestion::orderBy('id', 'DESC')
        ->agente($agente)
        ->supervisor($supervisor)
        ->nombres_cliente($nombres_cliente)
        ->paginate(5);
        
        $plantilla = Plantilla::all();
      
        //dd($plantilla);
        return view('gestion.index', compact('gestion','plantilla','plantillas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    { 
      
        $plantilla = Plantilla::all(); //relacion entre plantilla y plantilla.

   //dd($plantilla);
        //$pregunta = Pregunta::find($idpreguntas)->respuestas; //relacion entre pregunta y respuesta.


       

        $namegestion = Gestion::findOrFail($id); //traigo los datos del la gestion  seleccionado por el id traido del controlador. de getion. 
        //dd($namegestion->agente);
      
       

        return view('evaluaciones.create', compact('namegestion','plantilla'));
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function procesarcreate($id,$idplantilla)
    { 
 
       

        return view('evaluaciones.create', compact('namegestion','pregunta'));
    }

    public function proce(Request $request,$id,$tarea)
    { 
      
       
        $gestion_id = $id;//id de la gestion
      
      $plantillaALL = Tempgestione::where('gestions_id',$gestion_id)->get();///consultar datos de la gestion
        foreach ($plantillaALL as  $plantilla) {
            
            $plantillas = Plantilla::where('id',$plantilla->plantillas_id)->get();//obtener la plantilla
           
           
        }
        
        foreach ($plantillas as  $plantillaIDS) {//obtener las preguntas segun el id de la plantilla
          
           
            $plantilla_id = $plantillaIDS->id;//id de la plantilla

            $preguntas = Pregunta::where('plantillas_id',$plantilla_id)->get();//traigo las preguntas relacionadas con el id de la plantilla antes seleccionada
      
        }


        foreach ($preguntas as  $preguntasIDS) {//obtener las respuestas segun el id de la pregunta
          
           
            $preguntas_id = $plantillaIDS->id;//id de la plantilla

            $repuestas = Respuesta::where('preguntas_id',$preguntas_id)->get();//obtengo las respuesta de la preguntas
  
        }
  
    
   
      return view('evaluaciones.respuestas',compact('plantilla_id','gestion_id','tarea','preguntas_id','repuestas','preguntas','plantillas'));
      
   


      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*$validatedData = $request->validate([
            'comentario' => 'required',
        
        ]);*/
        $pregunta_id                = $request->input('pregunta_id');//al igual de la plantilla 
        $respuesta_id               = $request->input('respuesta_id');//guardo lo que me viene del array del select
        $plantilla_id               = $request->input('plantilla_id');//obtengo el id de la plantilla pasado desde el controlador creeate a la vista y mediante la misma la paso aqui con la etiqueta input <input name="plantilla_id" type="hidden" value="{{$plantilla_id}}">
        $gestion_id                 = $request->input('gestion_id');//al igual de la plantilla 
        $tareas_id                  = $request->input('tareas_id');
        $comentario                 = $request->input('comentario');
        $maxima_calificacion        = $request->input('maxima_calificacion');

         $user = \Auth::user()->id;
         $evaluacion = new Evaluacion();
         $evaluacion->users_id = $user;
         $evaluacion->gestions_id = $gestion_id;
         $evaluacion->plantillas_id = $plantilla_id;
         $evaluacion->tarea_id = $tareas_id;
         $evaluacion->save();
         

        for ($i=0;$i<count($respuesta_id);$i++) //recorro el array que me viene del select de respuesta
            {  
                
                for ($i=0;$i<count($pregunta_id);$i++)   //recorro el array que me viene del select de pregunta 
                {     
                    for ($i=0;$i<count($comentario);$i++)   //recorro el array que me viene del select de pregunta 
                    {
                        $preguntarespuesta = new PreguntaRespuesta();//instancio la propiedad para almacenar los datos
                        
                        $preguntarespuesta->preguntas_id    =   $pregunta_id[$i];
                        $preguntarespuesta->respuestas_id   =   $respuesta_id[$i];    
                        $preguntarespuesta->evaluacions_id  =   $evaluacion->id;
                        $preguntarespuesta->comentario = $comentario[$i];
                        $valor = Pregunta::where('id',$pregunta_id[$i])->get();

                            /**
                            * si la respuesta viene en null no aplico el guardado con la operacion arismetica
                            */
                        if ($respuesta_id[$i]) 
                        {
                                foreach ( $valor  as   $valors ) 
                                {
                            
                                     $preguntarespuesta->calificacion    =  $valors->peso;
                                }
                        }
                    
                        $preguntarespuesta->save();
                    }
                    
                }
            } 

           /** 
            * guardar el calculo de la de las respuestas seleccionadas en la columna calificacion de la tabla evaluacion
           */
            $calificacion = DB::table('pregunts_respuests')->where('evaluacions_id',$evaluacion->id)->sum('calificacion');
            
            DB::table('evaluacions')
                ->where('id', $evaluacion->id)
                ->update(['calificacion' => $maxima_calificacion  - $calificacion]);
            
            /**
             * cambiar estatus de la tabla temgestiones por el registro gestionado.
             */
           
            $gestiontm=Tempgestione::where('gestions_id',$evaluacion->gestions_id)
                                    ->where('tareas_id',$evaluacion->tarea_id)
                                    ->update(['status' => 'of']);


            /**
             * Cambiar el estatus de la tarea siempre y cuando se cumplan los registros solicitados para gestionar en dicha tarea
             */


            $canTemp    =   Tempgestione::Where('status','of')->Where('tareas_id',$evaluacion->tarea_id)->count();  //consulto la cantidad de registros q tengo con el estatus of
      
            $canTarea   =   Tarea::select('cantidad_registros')->Where('id',$evaluacion->tarea_id)->get();//consulto la cantidad de registro que fueron ingresado al crear la tarea
       
            foreach ($canTarea  as  $canTareax ) {//realizo el bucle para obtener el campo solicitado
                $cantidadregistros = $canTareax->cantidad_registros;

                if($cantidadregistros == $canTemp ){//valido si la cantidad de registros que esta actualmente en mi tarea es igual a la gestiones cerradas en mi tabla temporal
                    $gestiontm=Tarea::where('id',$evaluacion->tarea_id)
                                    ->update(['cerrada' => 'of']);//si se cumple realizo un update a mi campo cerrada de la tabla tareas.
                }


            }

            $cerrada   =   Tarea::select('cerrada')->Where('id',$evaluacion->tarea_id)->get();//consulto el estatus de la tarea si esta cerrada
           
            foreach ($cerrada  as  $cerradax ) {//realizo el bucle para obtener el campo solicitado
                $cerrada = $cerradax->cerrada;

                if($cerrada == 'of' ){//valido si la el campo cerrada esta en estatus of o no.
                    return redirect()->route('tarea')->with([ 
                        'info' => 'Tarea Culminada'
                    ]);//direcciono al usuario al index de tarea
                }


            }//si no se cumple solo lo dejo gestionar 

            return redirect()->route('temp.index', $evaluacion->tarea_id)->with([
                'info' => 'La Gestion fue guardada Correctamente!!'
            ]);
    }
   

   

    /**
     * Display the specified resource.
     *
     * @param  \App\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluacion $evaluacion)
    {
        //
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


    
}
