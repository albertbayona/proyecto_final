<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatosPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platos_pedidos', function (Blueprint $table) {
            $table->foreignId('plato_id');
            $table->foreignId('pedido_id');
            $table->smallInteger('cantidad');
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->primary(['plato_id', 'pedido_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platos_pedidos');
    }
}
