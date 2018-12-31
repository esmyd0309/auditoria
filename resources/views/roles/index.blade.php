@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Roles

                    @can('roles.create')<!-- verificar si tiene permisos. -->
                    <a href="{{ route('roles.create') }}" 
                        class="btn btn-sm btn-primary float-right ">
                        Crear 
                    </a>
                    @endcan
                </div>
                <div class="card-body">
                   <table class="table table-scriped table-hover">
                       <thead>
                           <tr>
                               <th WIDTH="10px">
                                   ID
                               </th>
                               <th>Descripcion</th>
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($roles as $roless)
                                <tr>
                                    <td>{{ $roless->id }}</td>
                                    <td>{{ $roless->name }}</td>
                                    
                                    <td WIDTH="5px">
                                        @can('roles.show')

                                        <a href="{{ route('roles.show', $roless->id) }}" 
                                            class="btn btn-sm btn-default">Ver</a>
                                        @endcan
                                    </td>

                                    
                                    <td WIDTH="5px">
                                        @can('roles.edit')

                                        <a href="{{ route('roles.edit', $roless->id) }}" 
                                            class="btn btn-sm btn-success">Editar</a>
                                        @endcan
                                    </td>
                                    
                                    <td WIDTH="5px">
                                    @can('roles.destroy')
                                    {!! Form::open(['route' => ['roles.destroy', $roless->id],
                                    'method' => 'DELETE']) !!}

                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                    {!! Form::close() !!}
                                    
                                    @endcan
                                    </td>

                                </tr>
                           @endforeach
                       </tbody>

                   </table>
                   {{ $roles->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
