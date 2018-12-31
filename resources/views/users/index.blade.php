@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Usuarios

                
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
                           @foreach($users as $userss)
                                <tr>
                                    <td>{{ $userss->id }}</td>
                                    <td>{{ $userss->name }}</td>
                                    
                                    <td WIDTH="5px">
                                        @can('user.show')

                                        <a href="{{ route('users.show', $userss->id) }}" 
                                            class="btn btn-sm btn-default">Ver</a>
                                        @endcan
                                    </td>

                                    
                                    <td WIDTH="5px">
                                        @can('user.edit')

                                        <a href="{{ route('users.edit', $userss->id) }}" 
                                            class="btn btn-sm btn-success">Editar</a>
                                        @endcan
                                    </td>
                                    <td WIDTH="5px">
                                    @can('user.destroy')
                                    {!! Form::open(['route' => ['users.destroy', $userss->id],
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
                   {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
