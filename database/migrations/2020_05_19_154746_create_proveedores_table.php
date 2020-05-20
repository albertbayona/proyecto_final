<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('empresa');
            $table->string('telefono');
            $table->string('email')->comment('un mismo proveedor puede repetirse si esta disponible para diferentes empresas');
            $table->timestamps();
        });
        Schema::table('productos',function (Blueprint $table){
            $table->foreignId('proveedor_id');
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos',function (Blueprint $table){
           $table->dropForeign('productos_proveedor_id_foreign');
           $table->dropColumn('proveedor_id');
        });
        Schema::dropIfExists('proveedores');
    }
}
