<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblinstitucionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblinstitucions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ins_nombre');
            $table->string('ins_direccion');
            $table->string('ins_telefono');
            $table->string('ins_correo');
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
        Schema::drop('tblinstitucions');
    }
}
