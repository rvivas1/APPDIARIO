<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOficinaLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficina_locals', function (Blueprint $table) {
            $table->id();
            $table->string('numero',5);
            $table->string('tel',15);
            $table->string('nit',15);
            $table->string('razon_social',50);
            $table->string('horario',30);
            $table->string('repre_propie',30);
            $table->char('propio_arrendado',2);
            $table->string('ubicacion',10);
            $table->string('medidas',30);
            $table->char('estado',2);
            $table->char('disp_venta',2);
            $table->char('disp_alquiler',2);
            $table->char('paz_y_salvo',2);

            $table->foreignId('id_actEco')->constrained('actividad_economicas');

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
        Schema::dropIfExists('oficina_locals');
    }
}
