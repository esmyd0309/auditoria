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
                <th  class='text-center'>Status</th>
                <th  class='text-center'>Campaña</th>
                <th  class='text-center'>Agente</th>
                <th class='text-center'>Grupo</th>
                <th class='text-center'>Nombres Del Cliente</th>
                <th class='text-center'>Cedula del cliente</th>
                <th class='text-center'>Fecha De Llamada</th>
                <th class='text-center'>Tiempo De Llamada</th>

             
               
                <center><th  class='text-center'>Accion</th></center>
                </thead>
                <tbody>
              
                @foreach ($gestiontm as $gestiontms)
          
             
                <tr >
          
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->lead_id }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->status }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->campaign_id }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->user }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->user_group }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->cabecera->last_name }}</small></td>
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->cabecera->first_name }}</small></td>
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->call_date }}</small></td>
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->length_in_sec }}</small></td>
                    
                    <td class='text-center'>
              

                  <a href="{{ route('evaluacion.proce', [$gestiontms->lead_id,$idtarea,$gestiontms->length_in_sec]) }}" class="btn btn-success btn-xs">Evaluar</a>
                </tr>
             
   




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