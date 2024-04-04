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
        Schema::create('especies', function (Blueprint $table) {
            $table->integer('id_especie')->autoIncrement();
            $table->string('nombre_comun', 250)->nullable();
            $table->string('nombre_cientifico', 250)->nullable();
            $table->string('descripcion', 250)->nullable();
            $table->string('habitad', 250)->nullable();
            $table->integer('id_dieta')->nullable();
            $table->integer('id_familia')->nullable();
            $table->integer('id_orden')->nullable();
            $table->integer('id_clase')->nullable();
            $table->float('tamanio')->nullable();
            $table->string('comportamiento', 250)->nullable();
            $table->integer('id_estado_conservacion')->nullable();
            $table->timestamps();

            $table->unique('id_especie');

            $table->foreign('id_dieta')->references('id_dieta')->on('dietas');
            $table->foreign('id_familia')->references('id_familia')->on('familias');
            $table->foreign('id_orden')->references('id_orden')->on('ordenes');
            $table->foreign('id_clase')->references('id_clase')->on('clases');
            $table->foreign('id_estado_conservacion')->references('id_estado_conservacion')->on('estados_conservacion');
        });

        Schema::table('especies', function (Blueprint $table) {
            $table->index('id_clase');
            $table->index('id_dieta');
            $table->index('id_estado_conservacion');
            $table->index('id_familia');
            $table->index('id_orden');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especies');
    }
};
