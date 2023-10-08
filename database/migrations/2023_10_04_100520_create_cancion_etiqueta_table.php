<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancionEtiquetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancion_etiqueta', function (Blueprint $table) {
            $table->foreignId('cancion_id')->references('id')->on('canciones')->onDelete('cascade');
            $table->foreignId('etiqueta_id')->references('id')->on('etiquetas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cancion_etiqueta');
    }
}
