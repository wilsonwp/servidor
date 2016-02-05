<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goles');;
            $table->integer('equipo_visitante');
            $table->integer('equipo_local');
            $table->integer('jornada_id')->unsigned();
            $table->integer('arbitro_id')->unsigned();
            //$table->foreign('jornada_id')->references('id')->on('jornadas');
            //$table->foreign('arbitro_id')->references('id')->on('arbitros');
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
        Schema::drop('partidos');
    }
}
