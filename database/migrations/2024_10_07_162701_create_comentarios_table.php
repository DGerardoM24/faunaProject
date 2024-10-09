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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->bigIncrements('id_comentario'); // Llave primaria auto incrementable
            $table->string('desc_comentario', 250)->nullable(); // Descripción del comentario
            $table->bigInteger('id')->unsigned()->nullable(); // Llave foránea a la tabla users
            $table->timestamps(); // Timestamps para created_at y updated_at
            // Llave foránea con relación a la tabla users
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
        Schema::dropIfExists('comentarios');
    }
};
