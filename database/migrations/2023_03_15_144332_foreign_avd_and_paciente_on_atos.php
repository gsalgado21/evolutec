<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignAvdAndPacienteOnAtos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('atos', function (Blueprint $table) {
            $table->unsignedBigInteger('avd_id')->change();
            $table->foreign('avd_id')->references('id')->on('avds');
            $table->unsignedBigInteger('paciente_id')->change();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
