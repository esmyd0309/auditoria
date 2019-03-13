@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Detalle
                </div> 
                @foreach ($gestiontm as $gestiontms) 
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"><strong>Respuesta</strong></div>
                        <div class="col-md-2">{{ $gestiontms->respuesta }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"><strong>Agente</strong></div>
                        <div class="col-md-2">{{ $gestiontms->agente }}</div>
                        <div class="col-md-1"><strong>Grupo</strong></div>
                        <div class="col-md-2">{{ $gestiontms->grupo }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"><strong>Cliente</strong></div>
                        <div class="col-md-2">{{ $gestiontms->cedula }}</div>
                        <div class="col-md-1"><strong>Nombres</strong></div>
                        <div class="col-md-4">{{ $gestiontms->nombre }}</div>
                        <div class="col-md-2"><strong>Telefono</strong></div>
                        <div class="col-md-2">{{ $gestiontms->telefono }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-2"><strong>Duracion de la llamada</strong></div>
                        <div class="col-md-2">{{ $gestiontms->seg }} <i>segundos</i> </div>
                        <div class="col-md-1"><strong>Estado</strong></div>
                        <div class="col-md-2">{{ $gestiontms->estado }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"><strong>Grabacion</strong></div>
                        <div class="col-md-2"><audio controls="" preload="none"><source src="{{ $gestiontms->grabacion }}" type="audio/mp3">No es compatible con la reproducción de audio del navegador</audio></div>
                    </div>
                    @endforeach
                </div>
            </div> 
           
            <div class="card">
                <div class="card-header">Detalle
                </div> 
                                
                @foreach ($evaluacion as $evaluacions)
                <div class="card-body">
               
                    <div class="row">
                        <div class="col-md-2"><strong>Gestionado</strong></div>
                        <div class="col-md-2">{{ $evaluacions->created_at }}</div>
                        
                        <div class="col-md-2"><strong>Auditor</strong></div>
                        <div class="col-md-2">{{ $evaluacions->users->name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"><strong>Plantillas</strong></div>
                        <div class="col-md-2">{{ $evaluacions->plantillas->nombre }}</div>
                        <div class="col-md-1"><strong>Tarea</strong></div>
                        <div class="col-md-2">{{ $evaluacions->tarea->nombre }}</div>
                        <div class="col-md-3"><strong>Maxima Calificacion</strong></div>
                        <div class="col-md-2">{{ $evaluacions->calificacion }}</div>
                    </div>
                   
                </div>
            </div>  


            @endforeach





        </div>
    </div> 
</div> 
                        
                        <a href=""  class="btn btn-sm btn-default">descargar</a>
               
@endsection