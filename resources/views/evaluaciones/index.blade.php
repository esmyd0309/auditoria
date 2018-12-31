@extends('layouts.app')


@section('content')

<div class="container">
<div class="page-header">
    <div class="row">
    <div class="col-md-1">
        <label>Busqueda Avanzada</label> 
        </div>
        <div class="d-inline-block align-top" class="col-md-6" > 
             
                {!! Form::open(['route'=> 'gestion', 'method' => 'GET', 'class' => 'form-inline pull-right']) !!}
                
                {{ Form::text('agente', null, ['class' => 'form-control', 'placeholder' => 'Agente']) }}
            
                {{ Form::text('supervisor', null, ['class' => 'form-control', 'placeholder' => 'Supervisor']) }}
                
                {{ Form::text('nombres_cliente', null, ['class' => 'form-control', 'placeholder' => 'Nombres Cliente']) }}

              
                
                    <button type='submit' class='btn btn-default'>
                    <span class="glyphicon glyphicon-search">BUSCAR</span>
                    </button>
      

{!! Form::close() !!}

</div>
<div class="col-md-2">
             <a href="" class="btn btn-primary"></a>
        </div>
<div class="col-md-2">
      
        </div>
    </div>
</div>
<hr>
    <div class="row justify-content-center">
    
        <div class="col-md-12">
            <div class="card">
            
                <div class="alert alert-success" class="card-header"  >Listado de Gestiones</div>
                
             <table >
                <thead class="thead-dark">
                    
                <th  class='text-center'>Agente</th>
                <th class='text-center'>Supervisor</th>
                <th class='text-center'>Nombres Del Cliente</th>
                <th class='text-center'>Cedula del cliente</th>
                <th class='text-center'>Fecha De Ingreso</th>
             
               
                <center><th  class='text-center'>Accion</th></center>
                </thead>
                <tbody>
              
                @foreach ($gestion as $gestions)
                <tr >
                    <td class='text-center'><small class="text-muted">{{ $gestions->agente }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $gestions->supervisor }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $gestions->nombres_cliente }}</small></td>
                    <td class='text-center'><small class="text-muted"></small></td>
                    <td class='text-center'><small class="text-muted">{{ $gestions->fecha }}</small></td>
                    
                    
                    <td class='text-center'><a href="{{ route('gestion.show', $gestions->id) }}" class="btn btn-success btn-xs">Detalle</a>
                    <a href="{{ route('evaluacion.show', $gestions->id) }}"  class="btn btn-danger btn-xs">Evaluar</a>
                    <a href="#"  class="btn btn-default btn-xs">Descargar</a></td>
                </tr>
                <span class="fi-icon-name" title="icon name" aria-hidden="true"></spa
                @endforeach
                </tbody> 
          
             </table>

              {!! $gestion->render() !!}
               
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

