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
        Schema::create('asigna_comentarios', function (Blueprint $table) {
            $table->integer('id_asigna_comentario')->autoIncrement();
            $table->integer('id_comentario')->nullable();
            $table->integer('id_publicacion')->nullable();
            $table->timestamps();

            $table->unique('id_asigna_comentario');

            $table->foreign('id_comentario')->references('id_comentario')->on('comentarios');
            $table->foreign('id_publicacion')->references('id_publicacion')->on('publicaciones');
        });

        Schema::table('asigna_comentarios', function (Blueprint $table) {
            $table->index('id_comentario');
            $table->index('id_publicacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asigna_comentarios');
    }
};
