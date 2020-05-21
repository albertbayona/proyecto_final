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
        Schema::create('establecimientos', function (Blueprint $table) {
            $table->id();
            $table->string('pais');
            $table->string('provincia');
            $table->string('municipio');
            $table->integer('codigo_postal');
            $table->string('calle');
            $table->smallInteger('mesas');
            $table->string('url_foto');
            $table->timestamps();
            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });

        Schema::table('usuarios', function (Blueprint $table) {
            $table->bigInteger('establecimiento_id')->unsigned();
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
            $table->dropColumn('establecimiento_id');
        });
        Schema::dropIfExists('establecimientos');
    }
}
