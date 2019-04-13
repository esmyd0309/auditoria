@extends('layouts.app')


@section('content')

<div class="container">
<div class="page-header">
    <div class="row">
    <div class="col-md-1">
        <label>Busqueda Avanzada</label> 
        </div>
        <div class="d-inline-block align-top" class="col-md-6" > 
             
                {!! Form::open(['route'=> 'tarea', 'method' => 'GET', 'class' => 'form-inline pull-right']) !!}
                
                {{ Form::text('tarea', null, ['class' => 'form-control', 'placeholder' => 'Tarea']) }}
            
                {{ Form::text('departamento', null, ['class' => 'form-control', 'placeholder' => 'Departamento']) }}
                
                {{ Form::text('status', null, ['class' => 'form-control', 'placeholder' => 'Estatus']) }}

              
                
                    <button type='submit' class='btn btn-default'>
                    <span class="glyphicon glyphicon-search">BUSCAR</span>
                    </button>
      

{!! Form::close() !!}

</div>
<div class="col-md-2">
<a href="{{ route('tarea.create') }}" ><img src="http://192.168.1.107/auditoria/public/iconos/create.png"></a>
        </div>
<div class="col-md-2">
      
        </div>
    </div>
</div>
<hr>

    <div class="row justify-content-center">
    
        <div class="col-md-12">
            <div class="card">
            
                <div class="alert alert-success" class="card-header"  >Listado de tareaes</div>
                
             <table >
                <thead class="thead-dark">
                <th class='text-center'>ID</th>   
                <th class='text-center'><img src="http://192.168.1.107/auditoria/public/iconos/fecha.png"></th>   
                <th  class='text-center'><img src="http://192.168.1.107/auditoria/public/iconos/trabajo.png"></th>
                <th class='text-center'><img src="http://192.168.1.107/auditoria/public/iconos/departamento.png"></th>
                <th class='text-center'>Estado </th>
                <th class='text-center'><img src="http://192.168.1.107/auditoria/public/iconos/restante.png"> </th>

                <th class='text-center'><img src="http://192.168.1.107/auditoria/public/iconos/status.png"></th>
                <center><th  class='text-center'>Accion</th></center>
                </thead>
                <tbody>
              
                @foreach ($tarea as $tareas)
                
                <tr >
                    <td class='text-center'><small class="text-muted">{{ $tareas->id }}</small></td>
                    <td class='text-center'><small class="text-muted">{{ $tareas->fecha }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $tareas->nombre }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $tareas->departamentos_id }}  </small></td> 
                    <td class='text-center'><small class="text-muted">{{ $tareas->estados }}  </small></td> 
                    <td class='text-center'><small class="text-muted ">{{ $tareas->cantidad_registros }}</small></td> 
              
          
                    <td class='text-center'>
                    @if($tareas->cerrada == 'on')
                    <button type="button" class="btn btn-light">
                   
                        
                    <a href="{{ route('temp.index', $tareas->id) }}"> <img src="http://192.168.1.107/auditoria/public/iconos/trabajar.png" width="30" height="30">  <span class="badge badge-light">@foreach ($gestionestem->where('tarea_id',$tareas->id) as $gestionestems) {{ $gestionestems->gestion }}@endforeach</span></a> 
                    </button>
                
                    @else
                  
                    <span class="badge badge-danger">Culminada</span>@foreach ($gestionestem->where('tarea_id',$tareas->id) as $gestionestems) {{ $gestionestems->gestion }}@endforeach
                    @endif
                    </td> <td class='text-center'> <a href="{{ route('evaluacion.show', $tareas->id) }}"><img src="http://192.168.1.107/auditoria/public/iconos/edit.png" width="30" height="30"></a>
                    </td>
                    <td class='text-center'> 
                        
                        @can('plantillas.destroy')
                            {!! Form::open(['route' => ['tarea.destroy', $tareas->id], 'method' => 'DELETE']) !!}

                                <button type="submit" onclick="return confirm('¿ ESTAS SEGURO QUE DESEAS ELIMINAR ?')">  <img src="http://192.168.1.107/auditoria/public/iconos/delete.png" width="30" height="30"></button>
                            {!! Form::close() !!}
  
                        @endcan
                </td>
                </tr>
              
                           





                <span class="fi-icon-name" title="icon name" aria-hidden="true"></span>
               
                </tbody> 
 
                @endforeach
                
               
             </table>

              {!! $tarea->render() !!}
               
                </div>
            </div>
        </div><br>
        <a class="btn btn-sm btn-success" href="{{ route('home') }}">Volver</a>
    </div>
  
</div>

@endsection


@section('scripts')



  <script>
  
  $(function(){
    $('#select-plantilla').ON('change', onSelect);
});

function onSelect(){
    var plantilla_id = $(this).val();
    alert(plantilla_id);
}
  
  </script>
@endsection