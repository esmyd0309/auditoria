<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Plantilla;
use App\User;
use App\Pregunta;
use Carbon\Carbon;
use Auth;
use Valach;
use Illuminate\Support\Facades\Storage;
use DB;
class PlantillaController extends Controller
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
    public function index(Request $request )

    {
        
        $pregunta = Pregunta::all();
        $plantillas = Plantilla::paginate(5);
        return view('plantillas.index', compact('plantillas','pregunta'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plantillas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
      //recuperar el id del usuario logueado
        $usuario = auth()->id();
       
        $now=Carbon::now();
        $plantilla = new Plantilla;
        $plantilla->users_id = $usuario;
        $plantilla->nombre = $request->nombre;
        
        $plantilla->descripcion = $request->descripcion;
        $plantilla->gestion = $request->gestion;
        $plantilla->ciudad = $request->ciudad;
        $plantilla->maxima_calificacion = $request->maxima_calificacion;


        $plantilla->save();


        return redirect()->route('plantillas.show', $plantilla->id)
        ->with('info', 'Plantilla Guardada con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plantilla  $plantilla
     * @return \Illuminate\Http\Response
     */
    public function show(Plantilla $plantilla)
    {

       //$plantilla = Plantilla::findOrFail(2);
        //entro al metodo de la relacion con las preguntas
       $pregunta = $plantilla->preguntas;

        return view('plantillas.show', compact('plantilla','pregunta'));
    }


      //////ver  las preguntas de las plantilla
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plantilla  $plantilla
     * @return \Illuminate\Http\Response
     */
    public function edit(Plantilla $plantilla)
    {
        $pregunta = new Pregunta;
        
        return view('plantillas.edit', compact('plantilla','pregunta'));

        
    }
    

   //////Agregar las preguntas a la plantillas
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plantilla  $plantilla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plantilla $plantilla)
    {
       
        $now=Carbon::now();
        $usuario = auth()->id();
   
        $plantilla->update($request->all());
        
     


        return redirect()->route('plantillas.show', $plantilla->id)
        ->with('info', 'Pregunta  Agregada  con Éxito');

    }


    ////vmostrar la plantilla
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plantilla  $plantilla
     * @return \Illuminate\Http\Response
     */
    public function editplantilla(Plantilla $plantilla)
    {
        
        
        return view('plantillas.editplantilla', compact('plantilla'));

        
    }

    ////actualizar las plantillas

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plantilla  $plantilla
     * @return \Illuminate\Http\Response
     */
    public function updateplantilla(Request $request, Plantilla $plantilla)
    {
       
        $now=Carbon::now();
        $usuario = auth()->id();
   
        $plantilla->update($request->all());
     


        return redirect()->route('plantillas.show', $plantilla->id)
        ->with('info', 'Plantilla Actualizada con Éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plantilla  $plantilla
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plantilla $plantilla)
    {
        $plantilla->delete();
        return redirect()->route('plantillas.index')->with('info', 'Eliminado Correctamente');
    }

   
    public function subir()
    {
        return view('media');
    }

       
    public function ingresa(Request $request)
    {
       //dd($request);
        $usuario = auth()->id();
       
      
        $plantilla = new Plantilla;
        $plantilla->filenames = request()->file->storeAs('uploads', request()->file->getClientOriginalName());


        $plantilla->users_id = $usuario;
        $plantilla->save();
        request()->file->storeAs('uploads', request()->file->getClientOriginalName());
        return view('media')->with('info', 'archivo subida con Éxito');
    }


    public function ver($id)
    {
        
        $plantilla = Plantilla::select('filenames')->where('id','=',$id)->get();
        foreach($plantilla as $plantillas){
       $plantilla=$plantillas->filenames;
        }
        return Storage::download("$plantilla");
        
    }
  


}
