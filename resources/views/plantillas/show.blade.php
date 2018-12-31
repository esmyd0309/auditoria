@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Plantilla
                
                     <a href="{{ route('plantillass.edit', $plantilla->id) }}" 
                        class="btn btn-sm btn-success float-right ">
                        Editar Plantilla
                    </a>
                    @can('plantillas.destroy')
                            {!! Form::open(['route' => ['plantillas.destroy', $plantilla->id],
                            'method' => 'DELETE']) !!}

                                <button class="btn btn-sm btn-danger">
                                    Eliminar
                                </button>
                            {!! Form::close() !!}
                            
                    @endcan
                </div>  
                <div class="card-body">
                    <p><strong>Nombre</strong> {{ $plantilla->nombre }}</p>
                    <p><strong>Descripción</strong> {{ $plantilla->descripcion }}</p>
                    <p><strong>Gestion</strong> {{ $plantilla->gestion }}</p>
                    <p><strong>Ciudad</strong> {{ $plantilla->ciudad }}</p>
                    <p><strong>Maxima Calificacion</strong> {{ $plantilla->maxima_calificacion }}</p>
                </div>
            </div>
            <div class="card-body">
                   <table class="table table-scriped table-hover">
                       <thead>
                           <tr>
                               <th WIDTH="10px">
                                   ID
                               </th>
                               <th>pregunta</th>
                               <th>descripcion</th>
                               <th>peso</th>
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($pregunta as $preguntas)
                                <tr>
                                    <td>{{ $preguntas->id }}</td>
                                    <td>{{ $preguntas->pregunta }}</td>
                                    <td>{{ $preguntas->descripcion }}</td>
                                    <td>{{ $preguntas->peso }}</td>
                                    
                                    <td WIDTH="5px">
                                        @can('pregunta.show')

                                        <a href="{{ route('preguntas.show', $preguntas->id) }}" 
                                            class="btn btn-sm btn-default">Detalle</a>
                                        @endcan
                                    </td>
                                    
                                    <td WIDTH="5px">
                               
                                        @can('preguntas.destroy')
                                            {!! Form::open(['route' => ['preguntas.destroy', $preguntas->id, $plantilla->id],
                                                'method' => 'DELETE']) !!}

                                                <button class="btn btn-sm btn-danger">
                                                    Eliminar
                                                </button>
                                            {!! Form::close() !!}
                                
                                        @endcan
                                    </td>
                                    <td WIDTH="5px">
                                        @can('pregunta.show')

                                        <a href="{{ route('respuestas.create', $preguntas->id) }}" 
                                            class="btn btn-sm btn-default">+Resupestas</a>
                                        @endcan
                                    </td>

                                </tr>
                           @endforeach
                           
                       </tbody>
                       <a href="{{ route('preguntas.create', $plantilla->id) }}" 
                            class="btn btn-sm btn-primary float-right ">
                             Crear Pregunta
                        </a>
                   </table>
                 
                </div>
        </div>
    </div>
</div>
@endsection