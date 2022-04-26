<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', __('models/tblprofesornivels.fields.id').':') !!}
    {!! Form::select('id', $profdato, null, ['class' => 'form-control']) !!}
</div>

<!-- Niv Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('niv_id', __('models/tblprofesornivels.fields.niv_id').':') !!}
    {!! Form::select('niv_id', $nivel, null, ['class' => 'form-control']) !!}
</div>

<!-- Sex Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sex_id', __('models/tblprofesornivels.fields.sex_id').':') !!}
    {!! Form::select('sex_id', $sexo, null, ['class' => 'form-control']) !!}
</div>
