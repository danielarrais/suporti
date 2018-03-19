<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('sobrenome',80);
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('id_funcao')->unsigned();
            $table->integer('id_setor')->unsigned();
            $table->integer('id_nivel')->unsigned();
            $table->foreign('id_funcao')->references('id_funcao')->on('funcao');
            $table->foreign('id_setor')->references('id_setor')->on('setores');
            $table->foreign('id_nivel')->references('id_nivel')->on('niveis');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
