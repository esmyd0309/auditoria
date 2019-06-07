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
                  
                </div>  
                <div class="card-body">
                    <p><strong>Nombre</strong> {{ $plantilla->nombre }}</p>
                    <p><strong>Descripción</strong> {{ $plantilla->descripcion }}</p>
                   <!-- <p><strong>Gestion</strong> {{ $plantilla->gestion }}</p>
                    <p><strong>Ciudad</strong> {{ $plantilla->ciudad }}</p>-->
                    <p><strong>Maxima Calificacion</strong> {{ $plantilla->maxima_calificacion }}</p>
                
                    
            </div>
            <div class="card-body">
            <div id="alert" class="alert alert-info"></div>
                   <table class="table table-scriped table-hover">
                       <thead>
                           <tr>
                               <th WIDTH="10px">
                                   ID
                               </th>
                               <th>pregunta</th>
                             
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($pregunta as $preguntas)
                                <tr>
                                    <td>{{ $preguntas->id }}</td>
                                    <td>{{ $preguntas->pregunta }}</td>
                                    
                                    
                                    <td WIDTH="5px">
                                        @can('preguntas.create')

                                        <a href="{{ route('respuestas.create', $preguntas->id) }}" 
                                            class="btn btn-sm btn-primary">+Respuestas</a>
                                        @endcan
                                    </td>
                                    <td WIDTH="5px">
                                        @can('preguntas.show')

                                        <a href="{{ route('preguntas.show', $preguntas->id) }}" 
                                            ><img src="{{ asset('icono/svg/eye.svg') }} "   width="30" height="30" ></a>
                                            
                                        @endcan
                                    </td>
                                    <td WIDTH="5px">
                                        @can('preguntas.edit')

                                        <a href="{{ route('preguntas.edit', $preguntas->id) }}" 
                                            ><img src="{{ asset('icono/svg/brush.svg') }}  " width="30" height="30" onclick="return confirm('¿ ESTAS SEGURO QUE DESEAS ACTUALIZAR ESTA PREGUNTA ?')"></a>
                                            
                                        @endcan
                                    </td>
                                    <td WIDTH="5px">
                               
                                        @can('preguntas.destroy')
                                            {!! Form::open(['route' => ['destroypregunta', $preguntas->id],
                                                'method' => 'DELETE']) !!}
                                                <a href="#" class="btn-delete">Eliminar</a>
                                               
                                            {!! Form::close() !!}
                                
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
                <a class="btn btn-sm btn-success" href="{{ URL::previous() }}">Volver</a>
                </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="{{ asset('js/jquery-3.4.0.min.js') }}" ></script>
<!-- Scripts -->
<script src="{{ asset('js/scriptpreguntas.js') }}" ></script>

@endsection