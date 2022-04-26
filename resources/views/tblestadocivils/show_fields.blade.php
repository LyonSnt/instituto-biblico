<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/tblestadocivils.fields.id').':') !!}
    <p>{{ $tblestadocivil->id }}</p>
</div>

<!-- Esc Decripcion Field -->
<div class="col-sm-12">
    {!! Form::label('esc_decripcion', __('models/tblestadocivils.fields.esc_decripcion').':') !!}
    <p>{{ $tblestadocivil->esc_decripcion }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/tblestadocivils.fields.created_at').':') !!}
    <p>{{ $tblestadocivil->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/tblestadocivils.fields.updated_at').':') !!}
    <p>{{ $tblestadocivil->updated_at }}</p>
</div>

