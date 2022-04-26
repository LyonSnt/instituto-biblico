<!-- Est Cedula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('est_cedula', __('models/tblestudiantes.fields.est_cedula').':') !!}
    {!! Form::text('est_cedula', null, ['class' => 'form-control']) !!}
</div>

<!-- Est Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('est_apellido', __('models/tblestudiantes.fields.est_apellido').':') !!}
    {!! Form::text('est_apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Est Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('est_nombre', __('models/tblestudiantes.fields.est_nombre').':') !!}
    {!! Form::text('est_nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Sex Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sex_id', __('models/tblestudiantes.fields.sex_id').':') !!}
    {!! Form::select('sex_id', $sexo, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}
</div>

<!-- Esc Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('esc_id', __('models/tblestudiantes.fields.esc_id').':') !!}
    {!! Form::select('esc_id', $estadocivil, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}
</div>

<!-- Est Fechanacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('est_fechanacimiento', __('models/tblestudiantes.fields.est_fechanacimiento').':') !!}
    {!! Form::text('est_fechanacimiento', null, ['class' => 'form-control']) !!}
</div>

<!-- Est Fechabautismo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('est_fechabautismo', __('models/tblestudiantes.fields.est_fechabautismo').':') !!}
    {!! Form::text('est_fechabautismo', null, ['class' => 'form-control']) !!}
</div>

<!-- Est Celular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('est_celular', __('models/tblestudiantes.fields.est_celular').':') !!}
    {!! Form::text('est_celular', null, ['class' => 'form-control']) !!}
</div>

<!-- Est Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('est_direccion', __('models/tblestudiantes.fields.est_direccion').':') !!}
    {!! Form::text('est_direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Igl Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('igl_id', __('models/tblestudiantes.fields.igl_id').':') !!}
    {!! Form::select('igl_id', $iglesia, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}
</div>
