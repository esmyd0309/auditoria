@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Respuesta</div>  
                <div class="card-body">
                    <p><strong>Respuesta: </strong> {{ $respuesta->respuesta }}</p>
                    <p><strong>Descripcion: </strong> {{ $respuesta->comentario }}</p>
                    <p><strong>Valor: </strong> {{ $respuesta->valor_1 }}</p>
                    <p><strong>Fecha: </strong> {{ $respuesta->fecha }}</p>
                
                </div>
            </div>

            
        </div>
    </div>
</div>
@endsection