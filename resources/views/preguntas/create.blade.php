@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
       <center> <p>{{$error}}</p></center>
    @endforeach
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading bg-white "><center>Crear Pregunta</center> </div>   

                <div class="panel-body">
                    {!! Form::open(['route' => ['preguntas.store', $plantilla_id]]) !!}

                            @include('preguntas.partials.formpreg')

                    {!! Form::close() !!}
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection