<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutorizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autorizacions', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('descripcion', 500);

            $table->foreignId('id_tpAuto')->constrained('tipo_autorizacions');
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
        Schema::dropIfExists('autorizacions');
    }
}
