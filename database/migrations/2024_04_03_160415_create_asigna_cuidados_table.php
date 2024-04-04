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
        Schema::create('asigna_cuidado', function (Blueprint $table) {
            $table->integer('id_asigna_cuidado')->autoIncrement();
            $table->integer('id_cuidado')->nullable();
            $table->integer('id_especie')->nullable();
            $table->timestamps();

            $table->unique('id_asigna_cuidado');

            $table->foreign('id_cuidado')->references('id_cuidado')->on('cuidados');
            $table->foreign('id_especie')->references('id_especie')->on('especies');
        });

        Schema::table('asigna_cuidado', function (Blueprint $table) {
            $table->index('id_cuidado');
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
        Schema::dropIfExists('asigna_cuidados');
    }
};
