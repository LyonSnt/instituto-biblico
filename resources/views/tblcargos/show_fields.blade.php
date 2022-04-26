<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/tblcargos.fields.id').':') !!}
    <p>{{ $tblcargo->id }}</p>
</div>

<!-- Car Descripcion Field -->
<div class="col-sm-12">
    {!! Form::label('car_descripcion', __('models/tblcargos.fields.car_descripcion').':') !!}
    <p>{{ $tblcargo->car_descripcion }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/tblcargos.fields.created_at').':') !!}
    <p>{{ $tblcargo->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/tblcargos.fields.updated_at').':') !!}
    <p>{{ $tblcargo->updated_at }}</p>
</div>

