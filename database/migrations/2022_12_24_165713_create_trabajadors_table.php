<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dni',8);
            $table->string('nombre',50);
            $table->string('apellidoPaterno',50);
            $table->string('apellidoMaterno',50);
            $table->char('sexo',1);
            $table->longText('direccion')->nullable();
            $table->string('telefono',50)->nullable();
            $table->string('celular',50)->nullable();
            $table->string('email',50);
            $table->longText('urlImagen')->nullable();

            $table->boolean('activo')->default(1);
            $table -> boolean('eliminado')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajadors');
    }
}
