<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Imports\PadresImport;
use Illuminate\Http\Request;
use App\Imports;
use App\Padres;
use DateTime;
use Excel;
use  DB;

class padresController extends Controller
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
    public function index()
    {

        
       return view('padres.create');
    }

    public function listas()
    {
        $lista = Padres::all();

 
       return response()->json($lista->toArray());
    }

    public function lista()
    {

        $lista = Padres::paginate(5);
       return view('padres.lista',compact('lista'));
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('padres.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createpublic()
    {
        return view('padrespublic.create');
    }
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Excel::import(new PadresImport,request()->file('file'));
        $cantidad = Padres::all()->count();

        return redirect()->route('padres')
        ->with('info', 'Registros Guardados con Éxito. Actualmente en la tabla:  '. $cantidad);
    }
    


}
