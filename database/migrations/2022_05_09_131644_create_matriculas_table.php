<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmatriculas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('est_id');
            $table->foreign('est_id', 'fk_estudiante_matricula')->references('id')->on('tblestudiantes')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('asg_id');
            $table->foreign('asg_id', 'fk_asignatura_matricula')->references('id')->on('asignaturas')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('mes_id');
            $table->foreign('mes_id', 'fk_mes_matricula')->references('id')->on('mes')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('ani_id');
            $table->foreign('ani_id', 'fk_aniacademico_matricula')->references('id')->on('tblanioacademicos')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('aul_id');
            $table->foreign('aul_id', 'fk_aula_matricula')->references('id')->on('tblaulas')->onDelete('cascade')->onUpdate('restrict');
            $table->integer('mtr_estado')->default(1);
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
        Schema::drop('matriculas');
    }
}
