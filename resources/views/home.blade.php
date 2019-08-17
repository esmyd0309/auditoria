
@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Seleccione Un Modulo</div>

                    <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            @can('plantillas.index')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <a  href="{{ url('/plantillas') }}" ><img class="card-img-top" src="http://www.auditoria.damplus.net/gestiones.png" width="100px" height="100px" alt="Card image cap"></a>
                                        <h5 class="card-title"> <b> Plantillas</b>  </h5><br>
                                    </div>
                                </div>
                            </div>
                            @endcan
                            @can('tarea')
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <a  href="{{ url('tarea') }}" ><img class="card-img-top" src="http://www.auditoria.damplus.net/indicadores.png" width="100px" height="100px" alt="Card image cap"></a>
                                                <h5 class="card-title"> <b> Tareas</b>  </h5><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                            @endcan
                            @can('users.index')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <a  href="{{ route('calidad.index') }}" ><img class="card-img-top" src="http://www.auditoria.damplus.net/calidad.jpg" width="100px" height="100px" alt="Card image cap"></a>
                                        <h5 class="card-title"> <b> Reporte de Calidad</b>  </h5>
                                    </div>
                                </div>
                            </div>
                            @endcan
                            @can('users.index')
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <a  href="{{ url('/users') }}" ><img class="card-img-top" src="http://www.auditoria.damplus.net/users.jpg" width="100px" height="100px" alt="Card image cap"></a>
                                        <h5 class="card-title"> <b> Usuarios</b>  </h5>
                                    </div>
                                </div>
                            </div>
                            @endcan
                        </div>                        
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection