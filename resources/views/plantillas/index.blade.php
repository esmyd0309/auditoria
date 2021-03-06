@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Plantillas
                    @can('plantillas.create')<!-- verificar si tiene permisos. -->
                    <p> 
                        <span id="plantilla-total">{{ $plantillas->total() }} registros | 
                            página {{ $plantillas->currentPage() }}
                            de {{ $plantillas->lastPage() }}
                        </span>
                    </p>
                    <a href="{{ route('plantillas.create') }}" 
                        class="btn btn-sm btn-primary float-right ">
                        Crear 
                    </a>
                    @endcan
                </div>
                <div id="alert" class="alert alert-info"></div>
                <div class="card-body">
                   <table class="table table-scriped table-hover">
                       <thead>
                           <tr>
                               <th WIDTH="10px">
                                   ID
                               </th>
                               <th>Descripcion</th>
                               <th>Auditor</th>
                               <th>Gestion</th>
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($plantillas as $plantillass)
                                <tr>
                                    <td>{{ $plantillass->id }}</td>
                                    <td>{{ $plantillass->nombre }}</td>
                                    <td>{{ $plantillass->users->name }}</td>
                                    <td>{{ $plantillass->gestion }}</td>
                                    
                                    <td WIDTH="5px">
                                        @can('plantillas.show')

                                        <a href="{{ route('plantillas.show', $plantillass->id) }}" 
                                            class="btn btn-sm btn-info">Detalle</a>
                                        @endcan
                                    </td>

                                    
                                    <td WIDTH="5px">
                                        @can('plantillas.edit')

                                        <a href="{{ route('preguntas.create', $plantillass->id) }}" 
                                            class="btn btn-sm btn-success">+Preguntas {{ count($plantillass->preguntas) }}</a>
                                        @endcan
                                    </td>
                                    @can('plantillas.destroy')
                                    <td WIDTH="20px">
                                    {!! Form::open(['route' => ['destroyplantilla', $plantillass->id],
                                       'method' => 'DELETE']) !!}
                                            <a href="#" class="btn-delete">Eliminar</a>
                                       
                                   {!! Form::close() !!}
                                    </td>
                                    @endcan
                                </tr>
                           @endforeach
                       </tbody>

                   </table>
                   {{ $plantillas->render() }}
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/jquery-3.4.0.min.js') }}" ></script>
<!-- Scripts -->
<script src="{{ asset('js/script.js') }}" ></script>

@endsection