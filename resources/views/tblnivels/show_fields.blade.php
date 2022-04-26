<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/tblnivels.fields.id').':') !!}
    <p>{{ $tblnivel->id }}</p>
</div>

<!-- Niv Descripcion Field -->
<div class="col-sm-12">
    {!! Form::label('niv_descripcion', __('models/tblnivels.fields.niv_descripcion').':') !!}
    <p>{{ $tblnivel->niv_descripcion }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/tblnivels.fields.created_at').':') !!}
    <p>{{ $tblnivel->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/tblnivels.fields.updated_at').':') !!}
    <p>{{ $tblnivel->updated_at }}</p>
</div>

