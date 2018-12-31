@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gestion id: {{ $gestion->id}}
                
                     <a href="{{ route('gestion') }}" 
                        class="btn btn-sm btn-success float-right ">
                        Volver 
                    </a>
        
                </div>  
                <div class="card-body">
                    <p><strong>Agente               </strong> {{ $gestion->agente }}</p>
                    <p><strong>Supervisor           </strong> {{ $gestion->supervisor }}</p>
                    <p><strong>Nombres Del Cliente  </strong> {{ $gestion->nombres_cliente }}</p>
                    <p><strong>Cedula del cliente   </strong>{{ $gestion->cedula }} </p>
                    <p><strong>Telefono del cliente  </strong>{{ $gestion->telefono }} </p>
                    <p><strong>Estatus de la Gestion </strong> </p>
                    <p><strong>Fecha De Ingreso     </strong> {{ $gestion->fecha }}</p>
                </div>
            </div>                    
                    
             
         
        </div>
    </div>
</div>
@endsection