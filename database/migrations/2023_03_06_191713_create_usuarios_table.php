<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula', 10);
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('pais');
            $table->string('email', 150);
            $table->string('direccion', 180);
            $table->string('celular', 10);
            $table->unsignedInteger('id_categoria');

            $table->foreign('id_categoria')
                ->references('id')
                ->on('categorias')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
