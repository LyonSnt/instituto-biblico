<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/tblaulas.fields.id').':') !!}
    <p>{{ $tblaula->id }}</p>
</div>

<!-- Aul Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('aul_nombre', __('models/tblaulas.fields.aul_nombre').':') !!}
    <p>{{ $tblaula->aul_nombre }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/tblaulas.fields.created_at').':') !!}
    <p>{{ $tblaula->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/tblaulas.fields.updated_at').':') !!}
    <p>{{ $tblaula->updated_at }}</p>
</div>

