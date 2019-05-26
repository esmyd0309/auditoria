@extends('layouts.app')


@section('content')

<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tarea Numero &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Creado: {{ $id }} &nbsp;&nbsp;</div>

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            
                        </div>
                </div>
                <center>
                        <div class="form-group">
                            
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{ route('tarea') }}" class="btn btn-success btn-sm">Volver</a>
                        </div>
                </center>
            </div>
                        
        </div>
    </div>

</div>



@endsection