<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CreateArchivosTable', function (Blueprint $table) {
            $table->increments('id');
            $table->string('detalle');
            $table->string('tipo');
            $table->string('url_imagen');
            $table->integer('pertenencia');
            $table->date('fecha_registro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CreateArchivosTable');
    }
}
