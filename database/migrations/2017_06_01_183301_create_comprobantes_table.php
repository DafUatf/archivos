<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprobantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_despacho');
            $table->integer('gestion');
            $table->string('cod_archivo')->unique();
            $table->enum('tipo_archivo', ['C-31-CI','C-31-SI','C-21-CI', 'C-21-SI', 'DIARIO', 'REGURALIZACION']);
            $table->string('fecha_recepcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comprobantes');
    }
}
