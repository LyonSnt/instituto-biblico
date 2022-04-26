<!-- Ins Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ins_nombre', __('models/tblinstitucions.fields.ins_nombre').':') !!}
    {!! Form::text('ins_nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Ins Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ins_direccion', __('models/tblinstitucions.fields.ins_direccion').':') !!}
    {!! Form::text('ins_direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Ins Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ins_telefono', __('models/tblinstitucions.fields.ins_telefono').':') !!}
    {!! Form::text('ins_telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Ins Correo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ins_correo', __('models/tblinstitucions.fields.ins_correo').':') !!}
    {!! Form::text('ins_correo', null, ['class' => 'form-control']) !!}
</div>