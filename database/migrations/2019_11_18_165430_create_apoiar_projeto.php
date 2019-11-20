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
        Schema::create('apoiar_projetos', function (Blueprint $table) {
            $table->increments('id');
            $table->double('valor', 10, 2);
            $table->integer('idUsuario')->unsigned();
            $table->foreign('idUsuario')->references('id')->on('projetos');
            //$table->foreign('idUsuario')->references('id')->on('projetos')->onDelete('cascate');
            $table->integer('idApoiador')->unsigned();
            $table->timestamp('dataApoio');
            $table->foreign('idApoiador')->references('id')->on('users');
            //$table->foreign('idApoiador')->references('id')->on('users')->onDelete('cascate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apoiar_projetos');
    }
}
