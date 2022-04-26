<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbldirectivasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbldirectivas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('car_id')->unique();
            $table->foreign('car_id', 'fk_tblcargo_tbldirectiva')->references('id')->on('tblcargos')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('pro_id')->unique();
            $table->foreign('pro_id', 'fk_profdato_tbldirectiva')->references('id')->on('tblprofesordatos')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('sex_id');
            $table->foreign('sex_id', 'fk_tblsexo_tbldirectiva')->references('id')->on('tblsexos')->onDelete('cascade')->onUpdate('restrict');
            $table->integer('dir_estado')->default(1)->nullable();
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
        Schema::drop('tbldirectivas');
    }
}
