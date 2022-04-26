
<!-- Pro Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pro_id', __('models/tbldirectivas.fields.pro_id').':') !!}
    {!! Form::select('pro_id', $profdato, null, ['class' => 'form-control']) !!}
</div>

<!-- Car Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('car_id', __('models/tbldirectivas.fields.car_id').':') !!}
    {!! Form::select('car_id', $cargo, null, ['class' => 'form-control']) !!}
</div>



<!-- Sex Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sex_id', __('models/tbldirectivas.fields.sex_id').':') !!}
    {!! Form::select('sex_id', $sexo, null, ['class' => 'form-control']) !!}
</div>

<!-- Dir Estado Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('dir_estado', __('models/tbldirectivas.fields.dir_estado').':') !!}
    {!! Form::text('dir_estado', null, ['class' => 'form-control']) !!}
</div> --}}
