<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetVehiParqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_vehi_parqs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_parq')->constrained('parqueaderos');
            $table->foreignId('id_vehi')->constrained('vehiculos');
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
        Schema::dropIfExists('det_vehi_parqs');
    }
}
