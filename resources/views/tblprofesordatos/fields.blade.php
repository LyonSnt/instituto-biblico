<!-- Pro Cedula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_cedula', __('models/tblprofesordatos.fields.pro_cedula').':') !!}
    {!! Form::text('pro_cedula', null, ['class' => 'form-control']) !!}
</div>

<!-- Pro Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_apellido', __('models/tblprofesordatos.fields.pro_apellido').':') !!}
    {!! Form::text('pro_apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Pro Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_nombre', __('models/tblprofesordatos.fields.pro_nombre').':') !!}
    {!! Form::text('pro_nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Sex Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sex_id', __('models/tblprofesordatos.fields.sex_id').':') !!}
    {!! Form::select('sex_id', $sexo, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}
</div>

<!-- Esc Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('esc_id', __('models/tblprofesordatos.fields.esc_id').':') !!}
    {!! Form::select('esc_id', $estadocivil, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}
</div>

<!-- Pro Fechanacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_fechanacimiento', __('models/tblprofesordatos.fields.pro_fechanacimiento').':') !!}
    {!! Form::date('pro_fechanacimiento', null, ['class' => 'form-control']) !!}
</div>

<!-- Pro Fechabautismo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_fechabautismo', __('models/tblprofesordatos.fields.pro_fechabautismo').':') !!}
    {!! Form::date('pro_fechabautismo', null, ['class' => 'form-control']) !!}
</div>

<!-- Pro Celular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_celular', __('models/tblprofesordatos.fields.pro_celular').':') !!}
    {!! Form::text('pro_celular', null, ['class' => 'form-control']) !!}
</div>

<!-- Pro Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_direccion', __('models/tblprofesordatos.fields.pro_direccion').':') !!}
    {!! Form::text('pro_direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Igl Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('igl_id', __('models/tblprofesordatos.fields.igl_id').':') !!}
    {!! Form::select('igl_id', $iglesia, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}
</div>

<!-- Pro Imagen Field -->
<div class="form-group col-sm-6">
 {{--    {!! Form::label('pro_imagen', __('models/tblprofesordatos.fields.pro_imagen').':') !!} --}}

    {!! Form::label('pro_imagen', 'Choose file', ['class' => 'custom-file-label']) !!}
    {!! Form::file('pro_imagen', null, ['class' => 'custom-file-input']) !!}
</div>
