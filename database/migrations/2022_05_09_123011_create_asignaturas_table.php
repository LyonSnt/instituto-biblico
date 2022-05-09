<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('niv_id');
            $table->foreign('niv_id', 'fk_tblnivel_asignatura')->references('id')->on('tblnivels')->onDelete('cascade')->onUpdate('restrict');
            $table->string('asg_nombre');
            $table->unsignedInteger('sex_id');
            $table->foreign('sex_id', 'fk_tblsexo_asignatura')->references('id')->on('tblsexos')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('tri_id');
            $table->foreign('tri_id', 'fk_tbltrimestre_asignatura')->references('id')->on('tbltrimestres')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('pro_id');
            $table->foreign('pro_id', 'fk_tblprfdato_asignatura')->references('id')->on('tblprofesordatos')->onDelete('cascade')->onUpdate('restrict');
            $table->integer('asg_estado')->default(1);
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
        Schema::drop('asignaturas');
    }
}
