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
            $table->bigIncrements('id_publicacion'); // Llave primaria auto incrementable
            $table->string('titulo', 250)->nullable();
            $table->bigInteger('id_tipo_p')->unsigned()->nullable(); // Llave foránea
            $table->timestamp('fecha_p')->nullable(); // Fecha de publicación
            $table->bigInteger('id')->unsigned()->nullable(); // Llave foránea que hace referencia a 'users'
            $table->timestamps(); // created_at y updated_at

            // Definición de llaves foráneas
            $table->foreign('id_tipo_p')
                ->references('id_tipo_p')
                ->on('tipo_publicacion')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('publicaciones');
    }
};
