<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCliente',150);
            $table->string('apellidosCliente',170);
            $table->string('celular',9)->nullable();
            $table->string('correo')->nullable();
            $table->string('direccion')->nullable();
            $table->boolean('delivery');
            $table->text('notas')->nullable();
            $table->decimal('monto');
            $table->foreignId('user_id');
            $table->boolean('activo')->default(true);
            $table->boolean('eliminado')->default(false);
            $table->timestamps();
                
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
