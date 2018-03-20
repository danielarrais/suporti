<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrintsChamadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chamados', function (Blueprint $table) {
            $table->integer("id_print")->nullable();
            $table->foreign('id_print')->references('id_print')->on('prints');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chamados', function (Blueprint $table) {
            //
        });
    }
}
