<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_prestamo');
            $table->string('unidad');
            $table->string('fecha_devolucion')->nullable();
            $table->string('observacion');
            /*$table->string('comprobante_cod_archivo')->unique();
            $table->char('persona_dip', 15)->unique();*/
            $table->string('comprobante_cod_archivo')->unsigned();
            $table->foreign('comprobante_cod_archivo')->references('cod_archivo')->on('comprobantes');
            $table->char('persona_dip', 15)->unsigned();
            $table->foreign('persona_dip')->references('dip')->on('personas');
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
        Schema::dropIfExists('prestamos');
    }
}
