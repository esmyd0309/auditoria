
<hr>
<H3>Preguntas</H3>
<br>
<div class="form-group">
    {{ form::label('pregunta', 'Pregunta') }}
    {{ form::text('pregunta', null, ['class' => 'form-control']) }}
</div>



<div class="form-group">
    {{ form::label('peso', 'Peso') }}
    {{ form::number('peso', null, ['class' => 'form-control']) }}
</div>


<div class="form-group">
<select name="tipo">
  <option value="">--Seleccioné el tipo de pregunta--</option>
  <option value="abierta">Abierta</option>
  <option value="cerrada">Cerrada</option>

</select>
</div>

<div class="form-group">
    {{ form::submit('Gurdar', ['class' => 'btn btn-sm btn-primary']) }}
</div>



