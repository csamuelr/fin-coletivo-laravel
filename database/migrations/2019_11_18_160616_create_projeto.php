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
            $table->double('custo', 10, 2);
            $table->string('imagem1')->nullable();
            $table->string('imagem2')->nullable();
            $table->date('tempDev');
            $table->timestamps();
            $table->boolean('status')->default(true)->change();
            $table->integer('idUsuario')->unsigned();
            //$table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('idUsuario')->references('id')->on('users')->onDelete('cascade');
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
