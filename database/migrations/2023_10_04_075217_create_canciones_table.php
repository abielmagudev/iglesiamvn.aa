<?php

use App\Models\Cancion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canciones', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->unique();
            $table->string('autor')->nullable()->index();
            $table->text('url_referencia')->nullable();
            $table->enum('indicador_tempo', Cancion::getIndicadoresTempo())->nullable()->index();
            $table->enum('estatus', Cancion::getEstatus())->index();
            $table->text('notas')->nullable();
            $table->text('letra')->fulltext();
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
        Schema::dropIfExists('canciones');
    }
}
