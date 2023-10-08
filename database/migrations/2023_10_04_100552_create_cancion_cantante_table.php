<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancionCantanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancion_cantante', function (Blueprint $table) {
            $table->foreignId('cancion_id')->references('id')->on('canciones')->onDelete('cascade');
            $table->foreignId('cantante_id')->references('id')->on('cantantes')->onDelete('cascade');
            $table->string('cifrado_tonal', 4)->index();
            $table->string('armonia_tonal', 8)->nullable();
            $table->text('notas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cancion_interprete');
    }
}
