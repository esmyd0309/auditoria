<div class="form-group">
    {{ form::label('name', 'Nombre') }}
    {{ form::text('name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ form::label('slug', 'Url Amigable') }}
    {{ form::text('slug', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ form::label('description', 'Descripción') }}
    {{ form::textarea('description', null, ['class' => 'form-control']) }}
</div>

<hr>


<h3>Permiso Especial</h3>
    <div class="form-group">
        <label> {{ Form::radio('special', 'all-access') }}  Acceso Total</label>
        <label> {{ Form::radio('special', 'null') }} Ningún Acceso </label>
    </div>


<div class="form-group">
    <ul class="list-unstyled">
        @foreach($permissions as $permission)
            <li>
                <label>
                    {{ Form::checkbox('permissions[]', $permission->id, null) }}
                    {{ $permission->name }}
                    <em>({{ $permission->description ?: 'Sin descripcion' }})</em>
                </label>
            </li>
            @endforeach
    </ul>

</div>


<div class="form-group">
    {{ form::submit('Gurdar', ['class' => 'btn btn-sm btn-primary']) }}
</div>