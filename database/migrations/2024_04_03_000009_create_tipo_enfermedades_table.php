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
        Schema::create('tipo_enfermedades', function (Blueprint $table) {
            $table->integer('id_tipo')->autoIncrement();
            $table->string('desc_tipo', 250)->nullable();
            $table->timestamps();

            $table->unique('desc_tipo');
            $table->unique('id_tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_enfermedads');
    }
};
