<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->smallInteger('en_stock');
            $table->smallInteger('minimo_recomendable')->comment('Cantidad minina del producto que se deberia tener en el inventario')->nullable();
            $table->string('url_foto')->nullable();
            $table->foreignId('establecimiento_id');
            $table->foreign('establecimiento_id')->references('id')->on('establecimientos');
            $table->timestamps();
        });
        Schema::table('ingredientes',function (Blueprint $table){
           $table->foreign('producto_id')->references('id')->on('productos');
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
            $table->dropForeign('ingredientes_producto_id_foreign');
        });

        Schema::dropIfExists('productos');
    }
}
