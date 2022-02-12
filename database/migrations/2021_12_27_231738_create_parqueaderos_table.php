<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParqueaderosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parqueaderos', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->string('tipo');
            $table->string('ubicacion');
            $table->string('repre_propie',30);
            $table->char('propio_arrendado',2);
            $table->char('estado',2);
            $table->char('permite_moto',2);
            $table->char('permite_carro',2);
            $table->char('disp_venta',2);
            $table->char('disp_alquiler',2);

            $table->foreignId('id_ofLoc')->constrained('oficina_locals');

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
        Schema::dropIfExists('parqueaderos');
    }
}
