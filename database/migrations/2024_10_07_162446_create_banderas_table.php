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
        Schema::create('banderas', function (Blueprint $table) {
            // Definir la clave primaria con auto-incremento
            $table->bigIncrements('id_bandera');

            // Definir los demás campos
            $table->string('nom_bandera');
            $table->string('desc_bandera');

            // Añadir timestamps (created_at, updated_at)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banderas');
    }
};
