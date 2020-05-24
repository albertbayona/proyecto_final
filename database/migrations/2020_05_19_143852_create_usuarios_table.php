<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apellidos')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('telefono')->nullable();
            $table->string('url_foto')->nullable();
            $table->foreignId('establecimiento_id');
            $table->foreignId('rol_id');
            $table->rememberToken();
            $table->timestamps();
        });
        //$table->bigInteger('rol_id')->unsigned();
        //            $table->bigInteger('establecimiento_id')->unsigned();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
