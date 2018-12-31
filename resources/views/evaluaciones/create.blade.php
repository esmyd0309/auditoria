
@extends('layouts.app')

@section('content')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
       <center> <p>{{$error}}</p></center>
    @endforeach
</div>
@endif


<div class="container">
  {!! Form::open(['route' => ['evaluacion.proce', 'id' => $namegestion->id]]) !!}
        
               <hr> 
        
            <div class="container-fluid text-center">    
                <div class="row content">
                    <div class="col-sm-3 sidenav">
                        <h6 class="alert alert-info"> Datos Agente</h6>
                    <hr>
                    <p>Agente &nbsp;&nbsp;<b> {{ $namegestion->agente }}</b></p>
                    <p>Supervisor &nbsp;&nbsp;<b> {{ $namegestion->supervisor }}</b></p>
                    <p>Producto &nbsp;&nbsp;<b> {{ $namegestion->producto }}</b></p>
                    <p>Gestion &nbsp;&nbsp;<b> {{ $namegestion->resultado_gestion }}</b></p>
                    <p>Fecha &nbsp;&nbsp;<b> {{ $namegestion->fecha }}</b></p>
                    
                    </div>
                    <div class="col-sm-6 text-left"> 
                        <center> <h6 class="alert alert-success"> Seleccinar plantilla</h6></center>
                    <hr>
                    <p>Tiene  que seleccionar una plantilla para que el Agente <b>( {{ $namegestion->agente }} )</b> pueda ser Evaluado.</p><br>
                    <div class="container-fluid text-center">  
                        <select name="plantilla_id" class="browser-default custom-select" class="form-control{{ $errors->has('plantilla_id') ? ' is-invalid' : ''  }}" autofocus>
                                <option value="">-- Plantilla --</option>
                                @foreach ($plantilla as $plantillas)
                                    <option value="{{ $plantillas->id }}">{{ $plantillas->nombre }} {{ $plantillas->id }}</option>
                                @endforeach
                                @if ($errors->has('plantilla_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('plantilla_id') }}</strong>
                                    </span>
                                @endif
                            </select>
                           
                        </div>
                    </div>
                    <div class="col-sm-3 sidenav">
                    <div class="well">
                    <h6 class="alert alert-info">Datos Cliente</h6>
                    <hr>
                    <p>Cliente &nbsp;&nbsp;<b> {{ $namegestion->nombres_cliente }}</b></p>
                    <p>Cedula &nbsp;&nbsp;<b> {{ $namegestion->cedula }}</b></p>
                    <p>Deuda &nbsp;&nbsp;<b> {{ $namegestion->deuda }}</b></p>
                    <p>Pagos &nbsp;&nbsp;<b> {{ $namegestion->pagos }}</b></p>
                    <p>Telefono &nbsp;&nbsp;<b> {{ $namegestion->telefono }}</b></p>
                    </div>
                  
                    </div>
                   
                </div>
                {{ form::submit('Enviar', ['class' => 'btn btn-sm btn-primary']) }}
            </div>

      
   
               
                    
               {!! Form::close() !!}
@endsection