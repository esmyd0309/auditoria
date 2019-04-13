<div class="form-group">
    {{ form::label('respuesta', 'Respuesta') }}
    {{ form::text('respuesta', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ form::submit('Gurdar', ['class' => 'btn btn-sm btn-primary']) }}
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-success" href="{{ URL::previous() }}">Volver</a>