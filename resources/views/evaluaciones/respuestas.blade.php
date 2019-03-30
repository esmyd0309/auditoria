@extends('layouts.app')


@section('content')


@if ($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
       <center> <p>{{$error}}</p></center>
    @endforeach
</div>
@endif


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header  p-3 mb-2 bg-primary text-white">Plantilla : 
                @foreach ($plantillas as $plantilla) 
                {{ $plantilla->nombre}} 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class=" justify-content-right">Calificacion maxima: </b><small>{{ $plantilla->maxima_calificacion }}</small> 
                </div> 
                
                @endforeach 
              
                         {!!Form::open(['route' => 'evaluacion.store','method' => 'POST','enctype'=> 'multipart/form-data'])!!}
                    @csrf
                    {{csrf_field()}}
              

                    <div class="card-body ">
                            @foreach ($preguntas as $pregunta)
                                    
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                        
                                            <label for="inputState"><strong>{{ $pregunta->pregunta }}</strong></label>
                                            <input name="pregunta_id[]" type="hidden" value="{{$pregunta->id}}">

                                        
                                            @if($pregunta->tipo == 'abierta')    <!-- VALIDO SI el tipo de pregunta es abierta o cerrada-->
                                                <select name="respuesta_id[]"  class="form-control">
                                                        <option value="">No Aplica...</option>
                                                    @foreach ($pregunta->respuestas as $repuestass)
                                                        <option value="{{ $repuestass->id }}"  {{ (isset($repuestass->id) || old('id'))? :"" }}>{{ $repuestass->respuesta }} <b>{{ ' --> Valor: '.$repuestass->pregunta->peso }}</b></option>
                                                    @endforeach 
                                                </select>
                                            @else <!-- si no es abierta busca las respuestas cerradas-->
                                                <select name="respuesta_id[]"  class="form-control">    
                                                        <option value="">No Aplica...</option>
                                                    @foreach ($pregunta->respuestas as $repuestass)
                                                    <option value="{{ $repuestass->id }}"  {{ (isset($repuestass->id) || old('id'))? :"" }}>{{ $repuestass->respuesta }} <b>{{ ' --> Valor: '.$repuestass->pregunta->peso }}</b></option>
                                                    @endforeach 
                                                </select>

                                            @endif

                                        </div>
                                        <div class="col-md-8">
                                            <label for="exampleFormControlFile1"><strong>Comentario</strong></label>
                                                <textarea name="comentario[]" rows="2" cols="10" class="form-control{{ $errors->has('comentario') ? ' is-invalid' : ''  }}" autofocus required></textarea>
                                                @if ($errors->has('comentario'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('comentario') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                               
                                
                                  
                            @endforeach 
                           
                       

  
  
                            
                        <!--- varibles escondidas para enviar al controladr-->
                            <input name="maxima_calificacion" type="hidden" value="{{ $plantilla->maxima_calificacion }}">
                            <input name="plantilla_id" type="hidden" value="{{$plantilla_id}}">
                            <input name="gestion_id" type="hidden" value="{{$gestion_id}}">
                            <input name="plantillas_id" type="hidden" value="{{$plantilla_id}}">
                            <input name="tareas_id" type="hidden" value="{{$tarea}}">
                            <input name="seg" type="hidden" value="{{ $seg }}">
                        <!--- fin de las varibles escondidas para enviar al controladr-->

                           

                        @foreach ($audiox as $audioxs)
                            <audio controls="" preload="none"> 
                                <source src="{{ $audioxs->location }}" type="audio/mp3">
                                    No es compatible con la reproducción de audio del navegador
                                 
                            </audio><br>
                           <label for="" class="btn btn-sm">{{ $audioxs->start_time }}</label> 
                            
                    
                            <input name="file" type="hidden" value=" {{ $audioxs->location }} " >
                    @endforeach 
                    <div class="row justify-content-center">
                  
                           
                   
                    {{ form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
                    |||
                
    <a class="btn btn-sm btn-success" href="{{ URL::previous() }}">Volver</a>
                        </div>
                        
    
    
                </div>
            </div>
        </div>
    </div>
</div>

   

 
{!!Form::close()!!}



@endsection