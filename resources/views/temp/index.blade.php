@extends('layouts.app')


@section('content')

<div class="container">
        <div class="row">

            <div class="col-md-2">
                <div class="row justify-content-center">
                    <div class="card">
                            <div class="alert alert-success" class="card-header"  >Agentes Gestionados</div>
                            <table >
                                <thead class="thead-dark">
                                    <th  class='text-center'>Agente</th>
                                    <th  class='text-center'>Cantidad</th>
                                </thead>
                                    <tbody>
                                        @foreach ($results as $resultss)
                                        <tr >
                                            <td class='text-center'><small class="text-muted">{{ $resultss->agente }}</small></td> 
                                            <td class='text-center'><small class="text-muted">{{ $resultss->cantidad }}</small></td>
                                        </tr>
                                    </tbody> 
                                        @endforeach
                            </table>
                    </div>
                    <br/><br/>
                    <a href="{{ route('tarea') }}" class="btn btn-sm btn-primary">Atras</a>
                </div>
            </div>
<hr>
    
        <div class="col-md-10">
           
            <div class="card">
                <div class="alert alert-warning" class="card-header"  >Listado de gestiontmes a Trabajar</div>
                <table  >
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
                            <td class='text-center'><small class="text-muted">{{ $gestiontms->last_name }}</small></td>
                            <td class='text-center'><small class="text-muted">{{ $gestiontms->first_name }}</small></td>
                            <td class='text-center'><small class="text-muted">{{ $gestiontms->call_date }}</small></td>
                            <td class='text-center'><small class="text-muted">{{ $gestiontms->length_in_sec }}</small></td>
                            </td>
                            <td class='text-center'><a href="{{ route('evaluacion.proce', [$gestiontms->lead_id,$idtarea,$gestiontms->length_in_sec,$gestiontms->uniqueid]) }}" class="btn btn-success btn-sm">Evaluar </a>
                        </tr>
                        @endforeach
                    </tbody> 
                </table>
            </div>
   
        </div>    
         <br>
           
    </div>
</div>


@endsection


@section('scripts')



<script src="{{ asset('js/cantidad.js') }}" defer></script>

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