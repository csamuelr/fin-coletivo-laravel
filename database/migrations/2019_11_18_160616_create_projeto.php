<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjeto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projeto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->nullable(true)->change();
            $table->string('descricao')->nullable(true)->change();
            $table->float('custo')->nullable(true)->change();
            $table->float('tempoDev');
            $table->timestamp('dataInicio')->nullable(true)->change();
            $table->dateTime('dataFim')->nullable(true)->change();
            $table->integer('idUsuario')->unsigned();
            $table->foreign('idUsuario')->references('id')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projeto');
    }
}
