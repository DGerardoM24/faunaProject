<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations
     *  @return void.
     */
    public function up()
    {
        Schema::create('tipo_publicacion', function (Blueprint $table) {
            $table->bigIncrements('id_tipo_p');
            $table->string('desc_tipo',250)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     *  @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_publicacions');
    }
};
