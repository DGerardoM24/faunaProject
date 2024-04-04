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
        Schema::create('enfermedades', function (Blueprint $table) {
            $table->integer('id_enfermedad')->autoIncrement();
            $table->string('nombre_enfermedad', 250)->nullable();
            $table->string('descripcion', 250)->nullable();
            $table->string('transmision', 250)->nullable();
            $table->integer('id_tipo')->nullable();
            $table->timestamps();

            $table->unique('id_enfermedad');

            $table->foreign('id_tipo')->references('id_tipo')->on('tipo_enfermedades');
        });

        Schema::table('enfermedades', function (Blueprint $table) {
            $table->index('id_tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enfermedades');
    }
};
