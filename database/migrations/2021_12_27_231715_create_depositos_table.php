<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depositos', function (Blueprint $table) {
            $table->id();
            $table->string('numero',4);
            $table->string('ubicacion',10);
            $table->string('repre_propie',30);
            $table->string('condicion',500);
            $table->string('contenido',300);
            $table->char('estado',2);
            $table->string('medidas',50);
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
        Schema::dropIfExists('depositos');
    }
}
