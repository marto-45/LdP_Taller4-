<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->string('tema');
            $table->text('descripcion');
            $table->enum('area', ['TI', 'contabilidad', 'administracion', 'operaciones']);
            $table->enum('estado', ['solicitando', 'aprobado', 'rechazado'])->default('solicitando');
            $table->text('observaciones')->nullable();
            $table->boolean('usuario_ext')->default(false);
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
        Schema::dropIfExists('solicituds');
    }
}
