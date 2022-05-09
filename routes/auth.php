<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [
    App\Http\Controllers\DashboardController::class, 'index'
])->name('dashboard');

Route::resource('permissions', App\Http\Controllers\PermissionController::class);
Route::post('permissions/loadFromRouter', [App\Http\Controllers\PermissionController::class, 'LoadPermission'])->name('permissions.load-router');

Route::resource('roles', App\Http\Controllers\RoleController::class);

Route::get('profile', [App\Http\Controllers\UserController::class, 'showProfile'])->name('users.profile');
Route::patch('profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('users.updateProfile');

Route::resource('users', App\Http\Controllers\UserController::class);


Route::resource('attendances', App\Http\Controllers\AttendanceController::class);

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('generator_builder.index');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('generator_builder.field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('generator_builder.relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('generator_builder.generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('generator_builder.rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('generator_builder.from_file');


Route::resource('fileUploads', App\Http\Controllers\FileUploadController::class);





Route::resource('tbltrimestres', App\Http\Controllers\tbltrimestreController::class);

Route::resource('tblcargos', App\Http\Controllers\tblcargoController::class);

Route::resource('tblestadocivils', App\Http\Controllers\tblestadocivilController::class);

Route::resource('tblsexos', App\Http\Controllers\tblsexoController::class);

Route::resource('tblnivels', App\Http\Controllers\tblnivelController::class);

Route::resource('tbliglesias', App\Http\Controllers\tbliglesiaController::class);


Route::resource('tblaulas', App\Http\Controllers\tblaulaController::class);


Route::resource('tblanioacademicos', App\Http\Controllers\tblanioacademicoController::class);

Route::resource('tblinstitucions', App\Http\Controllers\tblinstitucionController::class);



Route::resource('tblprofesornivels', App\Http\Controllers\tblprofesornivelController::class);


Route::resource('tbldirectivas', App\Http\Controllers\tbldirectivaController::class);


Route::resource('tblprofesordatos', App\Http\Controllers\tblprofesordatoController::class);


Route::resource('estudiantes', App\Http\Controllers\EstudianteController::class);




Route::resource('asignaturas', App\Http\Controllers\AsignaturaController::class);


Route::resource('mes', App\Http\Controllers\MesController::class);




Route::resource('matriculas', App\Http\Controllers\MatriculaController::class);
