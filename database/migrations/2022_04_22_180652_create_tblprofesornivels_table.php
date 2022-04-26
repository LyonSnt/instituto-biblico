<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblprofesornivelsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblprofesornivels', function (Blueprint $table) {
            $table->unsignedInteger('id')->unique();
            $table->foreign('id', 'fk_tblprofdato_tblprofnivel')->references('id')->on('tblprofesordatos')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('niv_id');
            $table->foreign('niv_id', 'fk_tblnivel_tblprofnivel')->references('id')->on('tblnivels')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedInteger('sex_id');
            $table->foreign('sex_id', 'fk_tblsexo_tblprofnivel')->references('id')->on('tblsexos')->onDelete('cascade')->onUpdate('restrict');
          
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
        Schema::drop('tblprofesornivels');
    }
}
