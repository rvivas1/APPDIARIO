<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('num_doc',15);
            $table->string('nombre',60);
            $table->string('apellido',60);
            $table->string('tel',15);
            $table->string('tel_alter',15);
            $table->string('correo',50);
            $table->char('estado',2);

            $table->foreignId('id_tpDoc')->constrained('tipo_documentos');
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
        Schema::dropIfExists('personas');
    }
}
