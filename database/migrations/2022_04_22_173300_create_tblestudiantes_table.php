<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblestudiantesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblestudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('est_cedula');
            $table->string('est_apellido');
            $table->string('est_nombre');

            $table->unsignedInteger('sex_id');
            $table->foreign('sex_id', 'fk_tblsexo_tblestudiante')->references('id')->on('tblsexos')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('esc_id');
            $table->foreign('esc_id', 'fk_tblestcivil_tblestudiante')->references('id')->on('tblestadocivils')->onDelete('cascade')->onUpdate('restrict');

            $table->date('est_fechanacimiento');
            $table->date('est_fechabautismo');
            $table->string('est_celular');
            $table->string('est_direccion');
            $table->unsignedInteger('igl_id');
            $table->foreign('igl_id', 'fk_tbliglesia_tblestudiante')->references('id')->on('tbliglesias')->onDelete('cascade')->onUpdate('restrict');
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
        Schema::drop('tblestudiantes');
    }
}
