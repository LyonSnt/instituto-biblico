<!-- Est Cedula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('est_cedula', __('models/estudiantes.fields.est_cedula') . ':') !!}
    {!! Form::text('est_cedula', null, ['class' => 'form-control']) !!}
</div>

<!-- Est Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('est_apellido', __('models/estudiantes.fields.est_apellido') . ':') !!}
    {!! Form::text('est_apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Est Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('est_nombre', __('models/estudiantes.fields.est_nombre') . ':') !!}
    {!! Form::text('est_nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Sex Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sex_id', __('models/estudiantes.fields.sex_id') . ':') !!}
    {!! Form::select('sex_id', $sexo, null, ['class' => 'form-control', 'placeholder' => 'Seleccione']) !!}
</div>

<!-- Esc Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('esc_id', __('models/estudiantes.fields.esc_id') . ':') !!}
    {!! Form::select('esc_id', $estadocivil, null, ['class' => 'form-control', 'placeholder' => 'Seleccione']) !!}
</div>

<!-- Est Fechanacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('est_fechanacimiento', __('models/estudiantes.fields.est_fechanacimiento') . ':') !!}
    {!! Form::date('est_fechanacimiento', null, ['class' => 'form-control']) !!}
</div>

<!-- Est Fechabautismo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('est_fechabautismo', __('models/estudiantes.fields.est_fechabautismo') . ':') !!}
    {!! Form::date('est_fechabautismo', null, ['class' => 'form-control']) !!}
</div>

<!-- Est Celular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('est_celular', __('models/estudiantes.fields.est_celular') . ':') !!}
    {!! Form::text('est_celular', null, ['class' => 'form-control']) !!}
</div>

<!-- Est Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('est_direccion', __('models/estudiantes.fields.est_direccion') . ':') !!}
    {!! Form::text('est_direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Igl Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('igl_id', __('models/estudiantes.fields.igl_id') . ':') !!}
    {!! Form::select('igl_id', $iglesia, null, ['class' => 'form-control', 'placeholder' => 'Seleccione']) !!}
</div>

<!-- Est Imagen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('est_imagen', __('models/estudiantes.fields.est_imagen').':') !!}
    {!! Form::file('est_imagen', null, ['class' => 'form-control']) !!}
    {{-- {!! Form::label('est_imagen', 'Choose file', ['class' => 'custom-file-label']) !!}
    {!! Form::file('est_imagen', $estudiante->est_imagen, null, ['class' => 'custom-file-input']) !!} --}}
</div>


<div class="grid grid-cols-1 mt-5 mx-7">
<img src="/imgestudiante/{{$estudiante->est_imagen}}" id="imagenseleccionada" style="max-height: 100px">
</div>
{{--
<div class="grid grid-cols-1 mt-5 mx-7">
    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir imagen</label>
    <div class="flex items-center justify-center w-full">
        <label class="flex flex-col bordr-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group">
            <div class="flex flex-col items-center justify-center pt-7">
                <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24"> </svg>
                <p class="text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider"> seleccione la imagen
                </p>

            </div>
            <input name="imagen" id="imagen" type="file" class="hidden">
        </label>

    </div>
</div> --}}

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(e){
        $('#est_imagen').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagenseleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
