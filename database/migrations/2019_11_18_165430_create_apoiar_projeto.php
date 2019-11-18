<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApoiarProjeto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apoiar_projeto', function (Blueprint $table) {
            $table->increments('id');
            $table->float('valor');
            $table->integer('idUsuario')->unsigned();
            $table->foreign('idUsuario')->references('id')->on('projeto');
            $table->integer('idApoiador')->unsigned();
            $table->foreign('idApoiador')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apoiar_projeto');
    }
}
