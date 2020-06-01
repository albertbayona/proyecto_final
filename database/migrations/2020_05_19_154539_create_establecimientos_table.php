<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablecimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Asi en el momento de registrarse no hace falta que rellene demasiados campos
        Schema::create('establecimientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('pais')->nullable();
            $table->string('provincia')->nullable();
            $table->string('municipio')->nullable();
            $table->integer('codigo_postal')->nullable();
            $table->string('calle')->nullable();
            $table->smallInteger('mesas')->nullable();
            $table->string('url_foto')->nullable();
            $table->timestamps();
            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });

        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('establecimiento_id')->references('id')->on('establecimientos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign('usuarios_establecimiento_id_foreign');
        });
        Schema::dropIfExists('establecimientos');
    }
}
