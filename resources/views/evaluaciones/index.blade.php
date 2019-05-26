@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="alert alert-success" class="card-header"  >Listado de gestiontmes</div>
                <table >
                    <thead class="thead-dark">
                        <th class='text-center'>id</th>   
                        <th  class='text-center'>Usuario</th>
                        <th class='text-center'>Plantilla</th>
                        <th class='text-center'>Tarea</th>
                        <th class='text-center'>Gestion</th>
                        <th class='text-center'>Agente</th>
                        <th class='text-center'>Calificacion</th>
                        <th class='text-center'>Grabaciones</th>
                        <center><th  class='text-center'>Accion</th></center>
                    </thead>
                    <tbody>
                        @foreach ($gestiontm as $gestiontms)
                        <tr >
                            <td class='text-center'><small class="text-muted">{{ $gestiontms->id }}</small></td> 
                            <td class='text-center'><small class="text-muted">{{ $gestiontms->users->name }}</small></td> 
                            <td class='text-center'><small class="text-muted">{{ $gestiontms->plantillas->nombre }}</small></td>
                            <td class='text-center'><small class="text-muted">{{ $gestiontms->tarea->nombre }}</small></td>
                            <td class='text-center'><small class="text-muted">{{ $gestiontms->gestions_id }}</small></td> 
                            <td class='text-center'><small class="text-muted">{{ $gestiontms->agente }}</small></td> 
                            <td class='text-center'><small class="text-muted">{{ $gestiontms->calificacion }}</small></td>
                            <td class='text-center'><small class="text-muted"><audio controls="" preload="none"><source src="{{ $gestiontms->grabacion }}" type="audio/mp3">No es compatible con la reproducción de audio del navegador</audio></small></td>
                            <td class='text-center'><a href="{{ route('actualicions.detalle',$gestiontms->id) }}" > <img src="{{ asset('icono/svg/eye.svg') }}  " style='width: 20px; height: 20px;'></a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('gestion.descargar',$gestiontms->id) }}"  ><img src="{{ asset('icono/svg/cloud-download.svg') }}  " style='width: 20px; height: 20px;'></a></td>
                        </tr>
                        @endforeach
                    </tbody> 
                </table>
                {{ $gestiontm->render() }}
                
            
            </div>
            <a href="{{ route('tarea') }}"  class="btn btn-primary btn-xs">Volver</a>
        </div>
    </div>
</div>

@endsection

@section('script')





@endsection