@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
@extends('padres.modal')
    <table class="table">
        <thead>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Accion</th>
        </thead>
        <tbody id="datos"> 
       
        </tbody>
    </table>
    {{ $lista->render() }}
@endsection

@section('script')
<script src="{{ asset('js/jquery-3.4.0.min.js') }}" ></script>
<script src="{{ asset('js/script2.js') }}" ></script>
@endsection