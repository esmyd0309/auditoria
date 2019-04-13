<div class="form-group">
    {{ form::label('nombre', 'Nombre de la Plantilla') }}
    {{ form::text('nombre', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ form::label('descripcion', 'Descrición de la Plantilla') }}
    {{ form::text('descripcion', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ form::label('gestion', 'Tipo de Gestion') }}
    {{ form::text('gestion', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ form::label('ciudad', 'Ciudad') }}
    {{ form::text('ciudad', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ form::label('maxima_calificacion', 'Maxima Calificacion') }}
    {{ form::number('maxima_calificacion', null, ['class' => 'form-control']) }}
</div>



<div class="form-group">
    {{ form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-success" href="{{ URL::previous() }}">Volver</a>
</div>
