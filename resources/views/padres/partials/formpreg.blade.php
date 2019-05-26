

<br>

<div class="form-group">
{!! Form::file('file', null) !!}
</div>
<div class="form-group">
<center>
    {{ form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }} 
    <a class="btn btn-sm btn-success" href="{{ route('padres') }}">Volver</a>
    </center>
</div>

