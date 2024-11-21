<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *  @return void
     */
    public function up()
    {
        Schema::create('asigna_multipuds', function (Blueprint $table) {
            $table->bigIncrements('id_asignamultipub');
            $table->bigInteger('id_publicacion')->unsigned()->nullable();
            $table->bigInteger('id_multimedia')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('id_publicacion')
                ->references('id_publicacion')
                ->on('publicaciones')
                ->onUpdate('cascade')
                ->onDelete('set null');


            $table->foreign('id_multimedia')
                ->references('id_multimedia')
                ->on('multimedia')
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
        Schema::dropIfExists('asigna_multipuds');
    }
};
