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
        Schema::create('estados_conservacion', function (Blueprint $table) {
            $table->integer('id_estado_conservacion')->autoIncrement();
            $table->string('desc_estado', 250)->nullable();
            $table->timestamps();

            $table->unique('id_estado_conservacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados_conservacions');
    }
};
