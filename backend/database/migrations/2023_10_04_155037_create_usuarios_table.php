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
            $table->id();
            $table->string('usuario')->unique();
            $table->string('clave');
            $table->enum('habilitado', ['habilitado', 'no_habilitado']);
            $table->date('fecha');
            // $table->date('fecha_creacion');
            // $table->date('fecha_modificacion');
            // $table->date('usuario_creacion');
            // $table->date('usuario_modificacion');
            // $table->unsignedBigInteger('id_persona');
            // $table->unsignedBigInteger('id_rol');
            $table->foreignId('id_persona')->constrained(table: 'personas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_rol')->constrained(table: 'rols')->onUpdate('cascade')->onDelete('cascade');

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
