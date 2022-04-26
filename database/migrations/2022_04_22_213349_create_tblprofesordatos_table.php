<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblprofesordatosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblprofesordatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pro_cedula');
            $table->string('pro_apellido');
            $table->string('pro_nombre');
            $table->unsignedInteger('sex_id');
            $table->foreign('sex_id', 'fk_tblsexo_tblprofdato')->references('id')->on('tblsexos')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('esc_id');
            $table->foreign('esc_id', 'fk_tblestcivil_tblprofdato')->references('id')->on('tblestadocivils')->onDelete('cascade')->onUpdate('restrict');
            $table->date('pro_fechanacimiento');
            $table->date('pro_fechabautismo');
            $table->string('pro_celular');
            $table->string('pro_direccion');
            $table->unsignedInteger('igl_id');
            $table->foreign('igl_id', 'fk_tbliglesia_tblprofdato')->references('id')->on('tbliglesias')->onDelete('cascade')->onUpdate('restrict');
            $table->string('pro_imagen');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblprofesordatos');
    }
}
