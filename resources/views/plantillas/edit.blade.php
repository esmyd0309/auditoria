@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>   

                <div class="panel-body">

                    {!! Form::model($plantilla, ['route' => ['plantillas.update', $plantilla->id],
                        'method' => 'PUT']) !!}

                            @include('plantillas.partials.formpreg')

                    {!! Form::close() !!}
                 </div>
            </div>
           
        </div>
    </div>
</div>
@endsection