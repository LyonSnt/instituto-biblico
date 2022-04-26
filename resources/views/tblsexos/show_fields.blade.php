<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/tblsexos.fields.id').':') !!}
    <p>{{ $tblsexo->id }}</p>
</div>

<!-- Sex Descripcion Field -->
<div class="col-sm-12">
    {!! Form::label('sex_descripcion', __('models/tblsexos.fields.sex_descripcion').':') !!}
    <p>{{ $tblsexo->sex_descripcion }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/tblsexos.fields.created_at').':') !!}
    <p>{{ $tblsexo->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/tblsexos.fields.updated_at').':') !!}
    <p>{{ $tblsexo->updated_at }}</p>
</div>

