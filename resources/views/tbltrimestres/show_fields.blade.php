<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/tbltrimestres.fields.id').':') !!}
    <p>{{ $tbltrimestre->id }}</p>
</div>

<!-- Tri Descripcion Field -->
<div class="col-sm-12">
    {!! Form::label('tri_descripcion', __('models/tbltrimestres.fields.tri_descripcion').':') !!}
    <p>{{ $tbltrimestre->tri_descripcion }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/tbltrimestres.fields.created_at').':') !!}
    <p>{{ $tbltrimestre->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/tbltrimestres.fields.updated_at').':') !!}
    <p>{{ $tbltrimestre->updated_at }}</p>
</div>

