@extends('layouts.app')


@section('content')

<div class="container">
<div class="page-header">
    <div class="row">
    <div class="col-md-1">
        <label>Busqueda Avanzada</label> 
        </div>
     <!--   <div class="d-inline-block align-top" class="col-md-6" > 
             
              
-->
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
            
                <div class="alert alert-success" class="card-header"  >Listado de gestiontmes</div>
                
             <table >
                <thead class="thead-dark">
                    
                <th  class='text-center'>Usuario</th>
                <th class='text-center'>Plantilla</th>
                <th class='text-center'>Tarea</th>
                <th class='text-center'>Gestion</th>
                <th class='text-center'>Calificacion</th>
                <th class='text-center'>Grabaciones</th>
             
               
                <center><th  class='text-center'>Accion</th></center>
                </thead>
                <tbody>
              
                @foreach ($gestiontm as $gestiontms)
                <tr >

                
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->users->name }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->plantillas->nombre }}</small></td>
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->tarea->nombre }}</small></td>
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->gestions_id }}</small></td> 
                    
                    <td class='text-center'><small class="text-muted">{{ $gestiontms->calificacion }}</small></td>
                    <td class='text-center'><small class="text-muted">
                        <audio controls="" preload="none"> 
                                    <source src="{{ $gestiontms->grabacion }}" type="audio/mp3">
                                        No es compatible con la reproducción de audio del navegador
                        </audio>
                    </small></td>
                    <td class='text-center'><small class="text-muted"></small></td>
                    
                    
                    <td class='text-center'><a href="{{ route('actualicions.detalle',$gestiontms->id) }}" class="btn btn-success btn-xs">Detalle</a>
                   
                    <a href="#"  class="btn btn-default btn-xs">Descargar</a></td>
                </tr>
                <span class="fi-icon-name" title="icon name" aria-hidden="true"></spa
                @endforeach
                </tbody> 
          
             </table>

               
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

