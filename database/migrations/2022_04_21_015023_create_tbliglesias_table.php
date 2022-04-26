<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbliglesiasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbliglesias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('igl_nombre');
            $table->string('igl_direccion');
            $table->string('igl_telefono');
            $table->string('igl_correo');
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
        Schema::drop('tbliglesias');
    }
}
