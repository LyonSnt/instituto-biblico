<!-- Niv Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('niv_id', __('models/asignaturas.fields.niv_id').':') !!}
    {!! Form::select('niv_id', $nivel, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}
</div>

<!-- Asg Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asg_nombre', __('models/asignaturas.fields.asg_nombre').':') !!}
    {!! Form::text('asg_nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Sex Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sex_id', __('models/asignaturas.fields.sex_id').':') !!}
    {!! Form::select('sex_id', $sexo, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}
</div>

<!-- Tri Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tri_id', __('models/asignaturas.fields.tri_id').':') !!}
    {!! Form::select('tri_id', $trimestre, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}

</div>

<!-- Pro Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_id', __('models/asignaturas.fields.pro_id').':') !!}
    {!! Form::select('sex_id', $profesor, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}

</div>

<!-- Asg Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asg_estado', __('models/asignaturas.fields.asg_estado').':') !!}
    {!! Form::text('asg_estado', null, ['class' => 'form-control']) !!}
</div>
