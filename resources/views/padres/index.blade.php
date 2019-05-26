@extends('layouts.app')

@section('content')

<hr>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card" >
                <div class="card-header" style="background-color: #e6ffff;">
                    Archivos
                    <a href="{{ route('padres.create') }}" 
                        class=" float-right ">
                        <img src="http://192.168.1.107/ventas/public/iconos/up.png" onfocus="displayFocus();">
                    </a>
                </div>
                <br>
                <div class="row">    
          
              
                </div> 
            </div>
            <center>
           
            </center>
            
        </div>
    </div>
</div>

<br/>
@endsection