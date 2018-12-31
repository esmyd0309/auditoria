
<hr>

<div class="form-group">
    {{ form::label('pregunta', 'Pregunta') }}
    {{ form::text('pregunta', null, ['class' => 'form-control ']) }}
    @if ($errors->has('pregunta'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('pregunta') }}</strong>
    </span>
@endif
</div>

<div class="form-group">
    {{ form::label('descripcion', ' Descripción') }}
    {{ form::text('descripcion', null, ['class' => 'form-control ']) }}
    @if ($errors->has('descripcion'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('descripcion') }}</strong>
    </span>
@endif
</div>



<div class="form-group">
    {{ form::label('peso', 'Peso') }}
    {{ form::number('peso', null, ['class' => 'form-control']) }}
    @if ($errors->has('peso'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('peso') }}</strong>
    </span>
@endif
</div>


<div class="form-group">
<select name="tipo">
  <option value="">--Seleccioné el tipo de pregunta--</option>
  <option value="abierta">Abierta</option>
  <option value="cerrada">Cerrada</option>

</select>
@if ($errors->has('tipo'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('tipo') }}</strong>
    </span>
@endif
</div>

<div class="form-group">
    {{ form::submit('Gurdar', ['class' => 'btn btn-sm btn-primary']) }}
</div>



