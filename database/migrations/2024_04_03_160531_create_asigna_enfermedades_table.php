<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asigna_enfermedades', function (Blueprint $table) {
            $table->integer('id_asigna_enfermedad')->autoIncrement();
            $table->integer('id_enfermedad')->nullable();
            $table->integer('id_sintoma')->nullable();
            $table->integer('id_tratamiento')->nullable();
            $table->integer('id_especie')->nullable();
            $table->timestamps();

            $table->unique('id_asigna_enfermedad');

            $table->foreign('id_enfermedad')->references('id_enfermedad')->on('enfermedades');
            $table->foreign('id_sintoma')->references('id_sintoma')->on('sintomas');
            $table->foreign('id_tratamiento')->references('id_tratamiento')->on('tratamientos');
            $table->foreign('id_especie')->references('id_especie')->on('especies');
        });

        Schema::table('asigna_enfermedades', function (Blueprint $table) {
            $table->index('id_enfermedad');
            $table->index('id_sintoma');
            $table->index('id_tratamiento');
            $table->index('id_especie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asigna_enfermedades');
    }
};
