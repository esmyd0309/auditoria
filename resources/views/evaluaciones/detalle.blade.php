@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Detalle
                </div> 
                @foreach ($evaluacion as $evaluacions) 
                <div class="card-body">
                    <div class="row">
                        
                    </div>
                    <div class="row">
                        <div class="col-md-1"><strong>Agente</strong></div>
                        <div class="col-md-2">{{ $evaluacions->agente }}</div>
                        <div class="col-md-1"><strong>Grupo</strong></div>
                        <div class="col-md-2">{{ $evaluacions->grupo }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"><strong>Cliente</strong></div>
                        <div class="col-md-2">{{ $evaluacions->cedula }}</div>
                        <div class="col-md-1"><strong>Nombres</strong></div>
                        <div class="col-md-4">{{ $evaluacions->nombre }}</div>
                        <div class="col-md-2"><strong>Telefono</strong></div>
                        <div class="col-md-2">{{ $evaluacions->telefono }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-2"><strong>Duracion de la llamada</strong></div>
                        <div class="col-md-2">{{ $evaluacions->seg }} <i>segundos</i> </div>
                        <div class="col-md-1"><strong>Estado</strong></div>
                        <div class="col-md-2">{{ $evaluacions->estado }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"><strong>Grabacion</strong></div>
                        <div class="col-md-2"><audio controls="" preload="none"><source src="{{ $evaluacions->grabacion }}" type="audio/mp3">No es compatible con la reproducción de audio del navegador</audio></div>
                    </div>
                    @endforeach
                </div>
            </div> 
           
            <div class="card">
                <div class="card-header">Detalle Evaluacion 
                </div> 
                                
                @foreach ($evaluacion as $evaluacions)
                <div class="card-body">
               
                    <div class="row">
                        <div class="col-md-2"><strong>Gestionado</strong></div>
                        <div class="col-md-2">{{ $evaluacions->created_at }}</div>
                    </div>
                    <div class="row">
                        @foreach ($gestiontm as $gestiontms) 
                        <div class="col-md-2"><strong>Pregunta</strong></div>
                        <div class="col-md-2">{{ $gestiontms->pregunta }}</div>
                        <div class="col-md-2"><strong>Respuesta</strong></div>
                        <div class="col-md-2">{{ $gestiontms->respuesta }}</div>

                        <div class="col-md-2"><strong>Comentarios</strong></div>
                        <div class="col-md-2">{{ $gestiontms->comentario }}</div>
                        @endforeach
                        
                    </div>
                    <div class="row">
                        <div class="col-md-2"><strong>Auditor</strong></div>
                        <div class="col-md-2">{{ $evaluacions->users->name }}</div>
                        <div class="col-md-1"><strong>Plantillas</strong></div>
                        <div class="col-md-2">{{ $evaluacions->plantillas->nombre }}</div>
                        <div class="col-md-1"><strong>Tarea</strong></div>
                        <div class="col-md-2">{{ $evaluacions->tarea->nombre }}</div>
                        <div class="col-md-3"><strong>Maxima Calificacion</strong></div>
                        <div class="col-md-2">{{ $evaluacions->calificacion }}</div>
                    </div>
                  
                </div>
                             
            </div>  
           <center><a href="{{ URL::previous() }}">Volver</a></center> 

            @endforeach





        </div>
    </div> 
</div> 
                        
                      
               
@endsection