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
//            son nullables para que asi lo pueda rellenar cuando mejor le vaya y si tiene el telefono no tiene por que tener el mail y viceversa
            $table->string('telefono')->nullable();
            $table->string('email')->comment('un mismo proveedor puede repetirse si esta disponible para diferentes empresas')->nullable();
            $table->foreignId('establecimiento_id');
            $table->foreign('establecimiento_id')->references('id')->on('establecimientos');

            $table->timestamps();
        });
        Schema::table('productos',function (Blueprint $table){
            $table->foreignId('proveedor_id')->nullable();
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
