<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Asi en el momento de registrarse no hace falta que rellene demasiados campos
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('NIF')->unique();
            $table->string('pais')->nullable();
            $table->string('provincia')->nullable();
            $table->string('municipio')->nullable();
            $table->integer('codigo_postal')->nullable();
            $table->string('calle')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
