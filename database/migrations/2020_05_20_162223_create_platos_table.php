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
            $table->string('nombre');
            $table->decimal('precio',6,2);
            $table->string('url_foto')->nullable();
            $table->foreignId('categoria_id');
            $table->foreignId('establecimiento_id');
            $table->foreign('establecimiento_id')->references('id')->on('establecimientos');
            $table->timestamps();
        });
        Schema::table('ingredientes',function (Blueprint $table){
            $table->foreign('plato_id')->references('id')->on('platos');
        });
        Schema::table('platos_pedidos',function(Blueprint $table){
            $table->foreign('plato_id')->references('id')->on('platos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingredientes',function (Blueprint $table){
            $table->dropForeign('ingredientes_plato_id_foreign');
        });
        Schema::table('platos_pedidos',function (Blueprint $table){
            $table->dropForeign('platos_pedidos_plato_id_foreign');
        });
        Schema::dropIfExists('platos');
    }
}
