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
        Schema::create('cuidados', function (Blueprint $table) {
            $table->integer('id_cuidado')->autoIncrement();
            $table->string('desc_cuidado', 250)->nullable();
            $table->timestamps();

            $table->unique('id_cuidado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuidados');
    }
};
