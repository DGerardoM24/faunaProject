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
        Schema::create('asigna_multimedia', function (Blueprint $table) {
            $table->bigIncrements('id_asigna_multimedia'); // Llave primaria auto incrementable
            $table->bigInteger('id_imagen')->unsigned()->nullable(); // Llave foránea que hace referencia a 'multimedia'
            $table->bigInteger('id_especie')->unsigned()->nullable(); // Llave foránea que hace referencia a 'especies'
            $table->timestamps(); // created_at y updated_at

            // Definición de llaves foráneas
            $table->foreign('id_imagen')
                ->references('id_multimedia')
                ->on('multimedia')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('id_especie')
                ->references('id_especie')
                ->on('especies')
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
        Schema::dropIfExists('asigna_multimedia');
    }
};
