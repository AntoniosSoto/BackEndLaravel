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
        Schema::create('info_contactos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contacto_id');// campo para relacionar con la tabla contacto
            $table->string('telefono', 15)->nullable();
            $table->string('correo', 50)->nullable();
            $table->text('direccion')->nullable();
            $table->timestamps();
            //asignacion de la llave foranea 
            $table->foreign('contacto_id')->references('id')->on('contactos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_contactos');
    }
};
