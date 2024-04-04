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
        Schema::create('asigna_alimento', function (Blueprint $table) {
            $table->integer('id_asigna_alimento')->autoIncrement();
            $table->integer('id_alimento')->nullable();
            $table->integer('id_especie')->nullable();
            $table->timestamps();

            $table->unique('id_asigna_alimento');

            $table->foreign('id_alimento')->references('id_alimento')->on('alimentos');
            $table->foreign('id_especie')->references('id_especie')->on('especies');
        });

        Schema::table('asigna_alimento', function (Blueprint $table) {
            $table->index('id_alimento');
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
        Schema::dropIfExists('asigna_alimentos');
    }
};
