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
            $table->integer('id_comentario')->autoIncrement();
            $table->string('desc_comentario', 250)->nullable();
            $table->integer('id')->nullable();
            $table->timestamps();

            $table->unique('id_comentario');

            $table->foreign('id')->references('id')->on('users');
        });

        Schema::table('comentarios', function (Blueprint $table) {
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
        Schema::dropIfExists('comentarios');
    }
};
