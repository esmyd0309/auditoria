@extends('layouts.app')

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">



<div class="container">
<h4>Bienvenido . {{ auth()->user()->name }} </h4>
<div class="page-header">
    <div class="row">
    <div class="col-md-1">
        <label>Busqueda Avanzada</label> 
        </div>
        <div class="d-inline-block align-top" class="col-md-6" > 
             
                {!! Form::open(['route'=> 'tarea', 'method' => 'GET', 'class' => 'form-inline pull-right']) !!}
                
                {{ Form::text('tarea', null, ['class' => 'form-control', 'placeholder' => 'Tarea']) }}
            
                {{ Form::text('departamento', null, ['class' => 'form-control', 'placeholder' => 'Departamento']) }}
                
                {{ Form::text('status', null, ['class' => 'form-control', 'placeholder' => 'Estatus']) }}

              
                
                    <button type='submit' class='btn btn-default'>
                    <span class="glyphicon glyphicon-search">BUSCAR</span>
                    </button>
      

{!! Form::close() !!}

</div>
<div class="col-md-2">
@can('tarea.create')
<a href="{{ route('tarea.create') }}" ><img src="http://192.168.1.107/auditoria/public/iconos/create.png"></a>
@endcan
        </div>
<div class="col-md-2">
      
        </div>
    </div>
</div>
<hr>

    <div class="row justify-content-center">
    
        <div class="col-md-12">
            <div class="card">
            
                <div class="alert alert-success" class="card-header"  >TAREAS</div>
                
             <table class="table table-hover table-condensed">
                <thead class="thead-dark">
                <th class='text-center' >ID</th>   
                <th class='text-center'>FECHA</th>   
                <th  class='text-center'>TAREA</th>
                <th class='text-center'>GRUPO</th>
                <th class='text-center'>CAMPAÑAS </th>
                <th class='text-center'>ESTADOS </th>
                <th class='text-center'>CANTIDAD</th>

                <th class='text-center'>ESTATUS</th>
                <center><th  class='text-center' COLSPAN="5">Accion</th></center>
                </thead>
                <tbody >
              
                @foreach ($tarea as $tareas)
                
                <tr >
                    <td class='text-center'  ><small class="text-muted">{{ $tareas->id }}</small></td>
                    <td class='text-center'><small class="text-muted">{{ $tareas->fecha }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $tareas->nombre }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $tareas->departamentos_id }}  </small></td> 
                    <td class='text-center'><small class="text-muted">{{ $tareas->campaign_id }}  </small></td> 
                    <td class='text-center'><small class="text-muted">{{ $tareas->estados }}  </small></td> 
                    <td class='text-center'><small class="text-muted ">{{ $tareas->cantidad_registros }}</small></td> 
              
                    @can('temp.index')
                    <td class='text-center'>
                   
                    @if($tareas->cerrada == 'on')
                    <button type="button" class="btn btn-light">
                   
                
                    <a id="tareay" href="{{ route('temp.index', $tareas->id) }}"> <img src="http://192.168.1.107/auditoria/public/iconos/trabajar.png" width="30" height="30">  <span class="badge badge-light">@foreach ($gestionestem->where('tarea_id',$tareas->id) as $gestionestems) {{ $gestionestems->gestion }}@endforeach</span></a> 
                    </button>
                
                    @else
                  
                    <span class="badge badge-danger">Culminada</span>@foreach ($gestionestem->where('tarea_id',$tareas->id) as $gestionestems) {{ $gestionestems->gestion }}@endforeach
                    @endif
                    </td> 
                    @endcan
                    @can('tarea.show')
                    <td > 
                        <a href="{{ route('evaluacion.show', $tareas->id) }}"><img src="{{ asset('icono/svg/eye.svg') }} "   width="30" height="30" ></a>
                    </td>
                    @endcan
                   
                    <td> 
                        <a href="{{ route('tarea.descargar',$tareas->id) }}"  ><img src="{{ asset('icono/svg/cloud-download.svg') }}  " width="30" height="30"></a>            
                    </td>
                    <td> 
                        <a href="{{ route('tareadetalle.descargar',$tareas->id) }}"  ><img src="{{ asset('icono/svg/paperclip.svg') }}  " width="30" height="30"></a>            
                    </td>
                    <td> 
                        <a href="#" class="btnx" ><img src="{{ asset('icono/svg/pie-chart.svg') }}  " width="30" height="30"></a>
            
                    </td>
                  
                    @can('tarea.edit')
                    <td> 
                        <a href="{{ route('tarea.edit',$tareas->id) }}"  ><img src="{{ asset('icono/svg/brush.svg') }}  " width="30" height="30" onclick="return confirm('¿ ESTAS SEGURO QUE DESEAS ACTUALIZAR ESTA TAREA ?')"></a>
            
                    </td>
                    @endcan
                    @can('tarea.destroy')
                 
                     <td > 
                    
                            {!! Form::open(['route' => ['tarea.destroy', $tareas->id], 'method' => 'DELETE']) !!}

                                <button type="submit" onclick="return confirm('¿ ESTAS SEGURO QUE DESEAS ELIMINAR ?')">  <img src="{{ asset('icono/svg/delete.svg') }}  " width="20" height="20"></button>
                            {!! Form::close() !!}
  
                    </td>
                    @endcan
                  
                </tr>
              
                           





                <span class="fi-icon-name" title="icon name" aria-hidden="true"></span>
               
                </tbody> 
 
                @endforeach
                
               
             </table>

              {!! $tarea->render() !!}
               
                </div>
                <a class="btn btn-sm btn-success" href="{{ route('home') }}">Volver</a>
            </div>
          
        </div>

<div class="container" id="indicador" >
    <div class="row" >
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <div>
                                <h3 class="font-bold no-margins" id="tarea">
                                   
                                </h3>
                                <small> Calificaciones y Cantidad de LLamadas por Agentes </small>
                            </div>

                            <div class="m-t-sm">

                                <div class="row">
                                    <div class="col-md-10">
                                        <div>
                                        <canvas id="mycanvasage2"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <ul class="stat-list m-t-lg">
                                            
                                            <li>
                                                <h2 class="no-margins " id="agentes"></h2>
                                                <small>Cantidad de Agentes Evaluados</small>
                                                <hr>
                                            </li>
                                            <li>
                                                <h2 class="no-margins" id="llamadas"></h2>
                                                <small>Cantidad de llamadas Evaluadas</small>
                                                <hr>
                                            </li>
                                            <li>
                                                <h2 class="no-margins " id="meta"></h2>
                                                <small>Meta para esta Tarea</small>
                                                <div class="progress ">
                                                <div id="progregoagentes" class="progress-bar" role="progressbar"  aria-valuemin="0" ></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <div class="m-t-md">
                                <small class="float-right">
                                    <i class="fa fa-clock-o"> </i>
                                  
                                </small>
                                <small>
                                    <strong></strong> La calificación inicial de cada parametro es de un 100.
                                </small>
                            </div>

                        </div>
            

                    </div>

                    </div>
                    
                </div>
                <div class="col-lg-12" >
                    <div class="ibox ">
                        <div class="ibox-content">
                            <div>
                            <h3 class="font-bold no-margins" id="tarea2">
                                   
                                </h3>
                                <small> Medición de la Dificulta de cada Parametro en esta Tarea </small>
                            </div>

                            <div class="m-t-sm">

                                <div class="row">
                                    <div class="col-md-10">
                                        <div>
                                        <canvas id="dificulta" width="1000" height="1000" ></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        

                                    </div>
                                </div>

                            </div>

                            <div class="m-t-md">
                                <small class="float-right">
                                    <i class="fa fa-clock-o"> </i>
                                  
                                </small>
                                <small>
                                    <strong></strong> La calificación inicial de cada parametro es de un 100.
                                </small>
                            </div>

                        </div>
            

                    </div>

                    </div>
                    
               

               <div class="col-lg-12" >
                    <div class="ibox ">
                         <div class="ibox-content">
                            <div>
                           
                                    <h3 class="font-bold no-margins" id="tarea3">
                                   
                                </h3>
                                <small>Cumplimientos </small>
                            </div>

                        

                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                        <canvas id="detalle" width="1000" height="1000" ></canvas>
                                        </div>
                                    </div>
                         

                            </div>

                            <div class="m-t-md">
                                <small class="float-right">
                                    <i class="fa fa-clock-o"> </i>
                                  
                                </small>
                                <small>
                                    <strong></strong> La calificación inicial de cada parametro es de un 100.
                                </small>
                            </div>

                        </div>
            

                    </div>

                    </div>
                    
                

                <div class="col-lg-12" >
                    <div class="ibox ">
                        <div class="ibox-content">
                        <h3 id="tarea4"></h3>
                        <small>Cumplimientos </small>
                            <table class="table">
                                <thead>
                                    <th>Parametro</th>
                                   
                                    <th>%</th>
                                </thead>
                                <tbody id="datos2" >
                        
                                </tbody>
                            </table>
                            <span id="preguntas" class="no-margins"></span>
                    </div>

                    </div>
                    
                </div>
                <div class="col-lg-12" >
                    <div class="ibox ">
                        <div class="ibox-content">
                        <h3 id="tarea5"></h3>
                        <strong></strong> La calificaciones finales de cada Agente evaluado</small>
                            <table class="table">
                                <thead>
                                    <th>Clientes</th>
                                    <th>Estados</th>
                                    <th>Agentes</th>
                                    <th>Grupos</th>
                                    <th>Calificaciones</th>
                                    <th>Grabaciones</th>
                                </thead>
                                <tbody id="agentedetalle" >
                        
                                </tbody>
                            </table>
                            <span id="preguntas" class="no-margins"></span>
                    </div>

                    </div>
                    
                </div>
                
    </div>
</div>
       
@endsection

@section('script')

<script src="{{ asset('js/jquery-3.4.0.min.js') }}"  ></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels'></script>
<script src="{{ asset('js/Chart.min.js') }}" ></script>
<script src="{{ asset('js/indicador2.js') }}" ></script>
<!--<script src="{{ asset('js/indicador.js') }}" ></script>
<script src="{{ asset('js/indicador3.js') }}" ></script>
<script src="{{ asset('js/indicador4.js') }}" ></script>-->
@endsection