<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="form-group">
    {{ form::label('nombre', 'Nombre de la Tarea') }}
    {{ form::text('nombre', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ form::label('descripcion', 'Descrición de la Tarea') }}
    {{ form::text('descripcion', null, ['class' => 'form-control']) }}
</div>



<div class="form-group">
    {{ form::label('cantidad_registros', 'Cantidad de Registros') }}
    {{ form::number('cantidad_registros', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ form::label('registros_agentes', 'Cantidad de Registros por Agentes') }}
    {{ form::number('registros_agentes', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
{{ form::label('plantillas_id', 'Departamento') }}
<select name="departamentos_id" class="browser-default custom-select" class="form-control{{ $errors->has('departamentos_id') ? ' is-invalid' : ''  }}" autofocus>
    <option value="">-- Departamento --</option>
    @foreach ($departamento as $departamentos)
        <option value="{{ $departamentos->id }}">{{ $departamentos->nombre }} {{ $departamentos->supervisora }}</option>
    @endforeach
    @if ($errors->has('departamentos_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('departamentos_id') }}</strong>
        </span>
    @endif
</select>
</div>


<div class="form-group">
{{ form::label('plantillas_id', 'Plantilla') }}
<select name="plantillas_id" class="browser-default custom-select" class="form-control{{ $errors->has('plantillas_id') ? ' is-invalid' : ''  }}" autofocus>
    <option value="">-- Plantillas --</option>
    @foreach ($plantilla as $plantillas)
        <option value="{{ $plantillas->id }}">{{ $plantillas->nombre }} </option>
    @endforeach
    @if ($errors->has('plantillas_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('plantillas_id') }}</strong>
        </span>
    @endif
</select>
</div>


<div class="form-group">
{{ form::label('estados_id', 'Estados de Gestion') }}
<select name="estados_id" class="browser-default custom-select" class="form-control{{ $errors->has('estados_id') ? ' is-invalid' : ''  }}" autofocus>
    <option value="">-- Estados --</option>
    @foreach ($estado as $estados)
        <option value="{{ $estados->id }}">{{ $estados->nombre }} {{ $estados->supervisora }}</option>
    @endforeach
    @if ($errors->has('estados_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('estados_id') }}</strong>
        </span>
    @endif
</select>
</div>

   <div class="[ form-group ]">
            <input type="checkbox" name="status" id="fancy-checkbox-success" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-success" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-success" class="[ btn btn-default active ]">
                  Activar
                </label>
            </div>
        </div>
        <div class="form-group col-6">
        {{ form::label('fechadesde', 'Fecha de Gestion desde') }}
        {{ Form::date('fechadesde',null,['class' => 'form-control']) }}
        </div>
        <div class="form-group col-6">
        {{ form::label('fechahasta', 'Fecha de Gestion Hasta') }}
        {{ Form::date('fechahasta', \Carbon\Carbon::now()->format('Y-m-d'),['class' => 'form-control']) }}
        </div>
       
<div class="form-group">
    {{ form::submit('Gurdar', ['class' => 'btn btn-sm btn-primary']) }}
</div>
