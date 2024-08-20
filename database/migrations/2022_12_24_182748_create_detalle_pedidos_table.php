<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id');
            $table->foreignId('plato_id');
            $table->integer('cantidad');
            $table->decimal('precio');
            $table->boolean('activo')->default(true);
            $table->boolean('eliminado')->default(false);
            $table->timestamps();
            
            $table->foreign('pedido_id')->references('id')->on('pedidos')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_pedidos');
    }
}
