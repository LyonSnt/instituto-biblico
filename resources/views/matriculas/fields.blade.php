<!-- Est Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('est_id', __('models/matriculas.fields.est_id').':') !!}
    {!! Form::select('est_id', $estudiante, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}
</div>

<!-- Asg Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asg_id', __('models/matriculas.fields.asg_id').':') !!}
    {!! Form::select('asg_id', $asignatura, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}
</div>

<!-- Mes Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mes_id', __('models/matriculas.fields.mes_id').':') !!}
    {!! Form::select('mes_id', $mes, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}
</div>

<!-- Ani Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ani_id', __('models/matriculas.fields.ani_id').':') !!}
    {!! Form::select('ani_id', $anioacademico, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}
</div>

<!-- Aul Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aul_id', __('models/matriculas.fields.aul_id').':') !!}
    {!! Form::select('aul_id', $aula, null, ['class' => 'form-control','placeholder' => 'Seleccione']) !!}
</div>

<!-- Mtr Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mtr_estado', __('models/matriculas.fields.mtr_estado').':') !!}
    {!! Form::text('mtr_estado', null, ['class' => 'form-control']) !!}
</div>
