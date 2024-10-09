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
            $table->bigIncrements('id_enfermedad');
            $table->string('nombre_enfermedad', 250)->nullable(); // Nombre de la enfermedad
            $table->string('descripcion', 250)->nullable(); // Descripción de la enfermedad
            $table->string('transmision', 250)->nullable(); // Modo de transmisión
            $table->bigInteger('id_tipo')->unsigned()->nullable(); // Llave foránea a tipo_enfermedades
            $table->timestamps(); // Timestamps para created_at y updated_at

            // Definición de la llave foránea
            $table->foreign('id_tipo')
                ->references('id_tipo')
                ->on('tipo_enfermedades')
                ->onUpdate('cascade')
                ->onDelete('set null');

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
