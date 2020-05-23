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
            $table->foreignId('pedidos_id');
            $table->foreign('pedidos_id')->references('id')->on('pedidos');
            $table->primary(['plato_id', 'pedidos_id']);
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
