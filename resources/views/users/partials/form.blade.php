<div class="form-group">
    {{ form::label('name', 'Nombre') }}
    {{ form::text('name', null, ['class' => 'form-control']) }}
</div>
<hr>
<h3>Lista de Roles</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach($roles as $role)
            <li>
                <label>
                    {{ Form::checkbox('roles[]', $role->id, null) }}
                    {{ $role->name }}
                    <em>({{ $role->description ?: 'Sin descripcion' }})</em>
                </label>
            </li>
            @endforeach
    </ul>

</div>


<div class="form-group">
    {{ form::submit('Gurdar', ['class' => 'btn btn-sm btn-primary']) }}
</div>