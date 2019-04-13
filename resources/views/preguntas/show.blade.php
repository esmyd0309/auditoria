@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Preguntas</div>  
                <div class="card-body">
                    <p><strong>Pregunta: </strong> {{ $preguntas->pregunta }}</p>
                    <p><strong>Peso: </strong> {{ $preguntas->peso }}</p>
                    <p><strong>tipo de Pregunta: </strong> {{ $preguntas->tipo }}</p>
                
                </div>
            </div>

                <div class="card-body">
                   <table class="table table-scriped table-hover">
                       <thead>
                           <tr>
                               <th WIDTH="10px">
                                   ID
                               </th>
                               <th>Respuesta</th>
                         
                               <th>Valor</th>
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($respuesta as $respuestas)
                                <tr>
                                    <td>{{ $respuestas->id }}</td>
                                    <td>{{ $respuestas->respuesta }}</td>
                          
                                    <td>{{ $respuestas->valor_1 }}</td>
                                    
                                    <td WIDTH="5px">
                                        @can('respuesta.show')

                                        <a href="{{ route('respuestas.show', $respuestas->id) }}" 
                                            class="btn btn-sm btn-default">Detalle</a>
                                        @endcan
                                    </td>
                                    
                                    <td WIDTH="5px">
                               
                                    </td>
                                    <td WIDTH="5px">
                               
                               @can('preguntas.destroy')
                                   {!! Form::open(['route' => ['respuestas.destroy', $respuestas->id, $preguntas->id],
                                       'method' => 'DELETE']) !!}

                                       <button class="btn btn-sm btn-danger" onclick="return confirm('¿ ESTAS SEGURO QUE DESEAS ELIMINAR ?')">Eliminar
                                          
                                       </button>
                                   {!! Form::close() !!}
                       
                               @endcan
                           </td>

                                </tr>
                           @endforeach
                           
                       </tbody>
                       <a href="{{ route('respuestas.create', $preguntas->id) }}" 
                            class="btn btn-sm btn-primary float-right">
                             Nueva Respuesta
                        </a>
                   </table>
                 
                </div>
                <a class="btn btn-sm btn-success" href="{{ route('plantillas.index') }}">Plantillas</a>
        </div>
    </div>
</div>
@endsection