@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Respuesta</div>  
                <div class="card-body">
                    <p><strong>Respuesta: </strong> {{ $respuesta->respuesta }}</p>
                
                    <p><strong>Valor: </strong> {{ $respuesta->valor_1 }}</p>
                    <p><strong>Fecha: </strong> {{ $respuesta->fecha }}</p>
                
                </div>
            </div>
            <a class="btn btn-sm btn-success" href="{{ URL::previous() }}">Volver</a>
            
        </div>
    </div>
</div>
@endsection