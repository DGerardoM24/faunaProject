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
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->integer('id_tratamiento')->autoIncrement();
            $table->string('nombre_tratamiento', 250)->nullable();
            $table->string('descripcion', 250)->nullable();
            $table->timestamps();

            $table->unique('id_tratamiento');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tratamientos');
    }
};
