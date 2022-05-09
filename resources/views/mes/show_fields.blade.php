<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/mes.fields.id').':') !!}
    <p>{{ $mes->id }}</p>
</div>

<!-- Mes Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('mes_nombre', __('models/mes.fields.mes_nombre').':') !!}
    <p>{{ $mes->mes_nombre }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/mes.fields.created_at').':') !!}
    <p>{{ $mes->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/mes.fields.updated_at').':') !!}
    <p>{{ $mes->updated_at }}</p>
</div>

