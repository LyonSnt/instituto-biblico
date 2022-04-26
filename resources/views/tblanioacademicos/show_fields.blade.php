<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/tblanioacademicos.fields.id').':') !!}
    <p>{{ $tblanioacademico->id }}</p>
</div>

<!-- Ani Anio Field -->
<div class="col-sm-12">
    {!! Form::label('ani_anio', __('models/tblanioacademicos.fields.ani_anio').':') !!}
    <p>{{ $tblanioacademico->ani_anio }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/tblanioacademicos.fields.created_at').':') !!}
    <p>{{ $tblanioacademico->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/tblanioacademicos.fields.updated_at').':') !!}
    <p>{{ $tblanioacademico->updated_at }}</p>
</div>

