<div class="form-group">
    {{ form::label('respuesta', 'Respuesta') }}
    {{ form::text('respuesta', null, ['class' => 'form-control']) }}
</div>
<!-- <div class="form-group">
    {{ form::label('comentario', 'Descrición de la Respuesta') }}
    {{ form::text('comentario', null, ['class' => 'form-control']) }}
</div> -->

<div class="form-group">
    {{ form::label('valor_1', 'Peso') }}
    {{ form::number('valor_1', null, ['class' => 'form-control']) }}
</div>



<div class="form-group">
    {{ form::submit('Gurdar', ['class' => 'btn btn-sm btn-primary']) }}

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-success" href="{{ URL::previous() }}">Volver</a>
</div>