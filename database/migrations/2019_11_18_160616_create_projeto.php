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
        Schema::create('projetos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('descricao');
            $table->float('custo');
            $table->float('tempoDev');
            $table->string('imagem1');
            $table->string('imagem2');
            $table->timestamp('dataInicio');
            $table->dateTime('dataFim');
            $table->integer('idUsuario')->unsigned();
            $table->foreign('idUsuario')->references('id')->on('users');
            //$table->foreign('idUsuario')->references('id')->on('projetos')->onDelete('cascate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projetos');
    }
}
