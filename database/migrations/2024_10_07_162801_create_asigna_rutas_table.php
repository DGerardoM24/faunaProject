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
        Schema::create('asigna_rutas', function (Blueprint $table) {
            $table->bigIncrements('id_asigna_rutas'); // Llave primaria auto incrementable
            $table->bigInteger('id_ruta')->unsigned()->nullable(); // Llave foránea que hace referencia a 'rutas'
            $table->bigInteger('id_especie')->unsigned(); // Llave foránea que hace referencia a 'especies', NOT NULL

            // Definición de llaves foráneas
            $table->foreign('id_ruta')
                ->references('id_ruta')
                ->on('rutas')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('id_especie')
                ->references('id_especie')
                ->on('especies')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asigna_rutas');
    }
};
