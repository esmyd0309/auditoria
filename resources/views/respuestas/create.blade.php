@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Respuesta</div>   

                <div class="panel-body">
                    {!! Form::open(['route' => ['respuestas.store', $pregunta_id]]) !!}

                            @include('respuestas.partials.form')

                    {!! Form::close() !!}
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection