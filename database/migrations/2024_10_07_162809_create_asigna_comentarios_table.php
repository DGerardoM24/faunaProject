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
            $table->bigIncrements('id_asigna_comentario'); // Llave primaria auto incrementable
            $table->bigInteger('id_comentario')->unsigned()->nullable(); // Llave foránea a la tabla comentarios
            $table->bigInteger('id_publicacion')->unsigned()->nullable(); // Llave foránea a la tabla publicaciones
            $table->timestamps(); // Timestamps para created_at y updated_at

            // Definición de las llaves foráneas
            $table->foreign('id_comentario')
                ->references('id_comentario')
                ->on('comentarios')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('id_publicacion')
                ->references('id_publicacion')
                ->on('publicaciones')
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
        Schema::dropIfExists('asigna_comentarios');
    }
};
