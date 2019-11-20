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
            $table->integer('idProjeto')->unsigned();
            $table->foreign('idProjeto')->references('id')->on('projetos')->onDelete('cascade');
            $table->timestamps();
            $table->integer('idApoiador')->unsigned()->nullable();
            $table->foreign('idApoiador')->references('id')->on('users')->onDelete('set null');
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
