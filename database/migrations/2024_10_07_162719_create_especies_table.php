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
        Schema::create('especies', function (Blueprint $table) {
            $table->bigIncrements('id_especie'); // Llave primaria auto incrementable
            $table->string('nombre_comun', 250)->nullable();
            $table->string('nombre_cientifico', 250)->nullable();
            $table->string('descripcion', 500)->nullable();
            $table->string('habitad', 250)->nullable();
            $table->bigInteger('id_dieta')->unsigned()->nullable();
            $table->bigInteger('id_familia')->unsigned()->nullable();
            $table->bigInteger('id_orden')->unsigned()->nullable();
            $table->bigInteger('id_clase')->unsigned()->nullable();
            $table->bigInteger('id_entorno')->unsigned(); // Llave foránea, NOT NULL
            $table->bigInteger('id_bandera')->unsigned(); // Llave foránea, NOT NULL
            $table->double('tamanio', 8, 2)->nullable();
            $table->bigInteger('id_estado_conservacion')->unsigned()->nullable();
            $table->bigInteger('id_grupo')->unsigned()->nullable();
            $table->timestamps(); // created_at y updated_at

            // Definición de las llaves foráneas
            $table->foreign('id_entorno')
                ->references('id_entorno')
                ->on('entornos')
                ->onUpdate('cascade');

            $table->foreign('id_bandera')
                ->references('id_bandera')
                ->on('banderas')
                ->onUpdate('cascade');

            $table->foreign('id_clase')
                ->references('id_clase')
                ->on('clases')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('id_dieta')
                ->references('id_dieta')
                ->on('dietas')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('id_estado_conservacion')
                ->references('id_estado_conservacion')
                ->on('estados_conservacions')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('id_familia')
                ->references('id_familia')
                ->on('familias')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('id_orden')
                ->references('id_orden')
                ->on('ordenes')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('id_grupo')
                ->references('id_grupo')
                ->on('grupos')
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
        Schema::dropIfExists('especies');
    }
};
