@extends('layouts.app')


@section('content')

<div class="container">
<div class="page-header">
    <div class="row">
    <div class="col-md-1">
        
        </div>



<div class="col-md-2">
      
        </div>
<div class="col-md-2">
      
        </div>
    </div>
</div>
<hr>
    <div class="row justify-content-center">
    
        <div class="col-md-12">
            <div class="card">
            
                <div class="alert alert-success" class="card-header"  >Listado de gestiontmes a Trabajar</div>
                
             <table >
                <thead class="thead-dark">
                <th  class='text-center'>ID</th>
                <th  class='text-center'>Agente</th>
                <th class='text-center'>Supervisor</th>
                <th class='text-center'>Nombres Del Cliente</th>
                <th class='text-center'>Cedula del cliente</th>
                <th class='text-center'>Fecha De Ingreso</th>

             
               
                <center><th  class='text-center'>Accion</th></center>
                </thead>
                <tbody>
              
                @foreach ($gestiontm as $gestiontms)
          
                    @if($evaluaciones!=$gestiontms->id)
                <tr >
                <!--
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->id }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->agente }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->supervisor }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->nombres_cliente }}</small></td>
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->cedula }}</small></td>
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->fecha }}</small></td>
                -->
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->id }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->agente }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->supervisor }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->nombres_cliente }}</small></td>
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->cedula }}</small></td>
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->fecha }}</small></td>
                
                
                    <td class='text-center'>
              

                  <a href="{{ route('evaluacion.proce', [$gestiontms->id,$idtarea]) }}" class="btn btn-success btn-xs">Evaluar</a>
                </tr>
             
                           
                @endif




                <span class="fi-icon-name" title="icon name" aria-hidden="true"></span>
               
                </tbody> 
 
                @endforeach
                
               
             </table>

          
               
                </div>
               
            </div>
            <a href="{{ route('tarea') }}" class="btn btn-primary btn-xs">Volver</a>
        </div>
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