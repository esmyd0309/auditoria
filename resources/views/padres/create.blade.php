@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header" style="background-color: #e6ffff;">Subir Archivo</div>   
                <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'padres.store','enctype' => 'multipart/form-data']) !!}
                    {{ csrf_field() }}
                            @include('padres.partials.formpreg')

                    {!! Form::close() !!}
                 </div>
                 </div>  
            </div>
        </div>
    </div>
</div>
@endsection