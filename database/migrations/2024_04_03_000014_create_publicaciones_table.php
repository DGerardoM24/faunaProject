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
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->integer('id_publicacion')->autoIncrement();
            $table->string('titulo', 250)->nullable();
            $table->integer('id_especie')->nullable();
            $table->timestamp('fecha_p')->nullable();
            $table->integer('id')->nullable();
            $table->timestamps();

            $table->unique('id_publicacion');

            $table->foreign('id')->references('id')->on('users');
            $table->foreign('id_especie')->references('id_especie')->on('especies');
        });

        Schema::table('publicaciones', function (Blueprint $table) {
            $table->index('id_especie');
            $table->index('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicaciones');
    }
};
