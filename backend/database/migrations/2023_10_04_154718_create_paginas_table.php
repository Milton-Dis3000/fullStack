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
        Schema::create('paginas', function (Blueprint $table) {
            $table->id();
            // $table->date('fecha_creacion');
            // $table->date('fecha_modificacion');
            // $table->date('usuario_creacion');
            // $table->date('usuario_modificacion');
            $table->string('url');
            $table->string('estado');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('icono');
            $table->string('tipo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paginas');
    }
};
