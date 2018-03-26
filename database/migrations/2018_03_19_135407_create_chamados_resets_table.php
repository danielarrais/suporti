<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChamadosResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamados', function (Blueprint $table) {
            //Atributos particulares
            $table->increments('id_chamado');
            $table->string('titulo');
            $table->string('descricao',600);
            $table->dateTime('horario_abertura');
            $table->dateTime('horario_fechamento')->nullable();
            $table->string('motivo_rejeicao', 600)->nullable();

            //Foreign keys
            $table->integer('id_avaliacao')->nullable()->unsigned();
            $table->integer('id_categoria')->nullable()->unsigned();
            $table->integer('id_status')->default(1)->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_atendente')->nullable()->unsigned();
            $table->integer('id_nivel_urgencia')->unsigned();
            $table->integer("id_print")->nullable()->unsigned();

            //Contraints Foreign keys
            $table->foreign('id_print')->references('id_print')->on('prints');
            $table->foreign('id_avaliacao')->references('id_avaliacao')->on('avaliacoes');
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
            $table->foreign('id_status')->references('id_status')->on('status_atendimento');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_atendente')->references('id')->on('users');
            $table->foreign('id_nivel_urgencia')->references('id_nivel_urgencia')->on('nivel_urgencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chamados');
    }
}
