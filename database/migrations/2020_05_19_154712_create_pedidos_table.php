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
            $table->decimal('coste_total',6,2);
            $table->foreignId('usuario_id');
            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('pedidos', function (Blueprint $table) {
//            $table->dropForeign('pedidos_usuario_id_foreign');
//        });

        Schema::dropIfExists('pedidos');
    }
}
