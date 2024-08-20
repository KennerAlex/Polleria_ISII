<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',120);
            $table->string('descripcion');
            $table->decimal('precio');
            $table->foreignId('tipo_plato_id');
            $table->boolean('activo')->default(true);
            $table->boolean('eliminado')->default(false);
            $table->integer('stockDiario');
            $table->text('url_imagen')->nullable();
            $table->timestamps();
            $table->foreign('tipo_plato_id')->references('id')->on('tipo_platos')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platos');
    }
}
