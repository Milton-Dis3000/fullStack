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
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->id();
            $table->date('bitacora');
            $table->date('fecha');
            $table->time('hora'); 
            $table->string('ip'); 
            $table->string('so');
            $table->string('navegador');
            $table->string('usuario');
            // $table->unsignedBigInteger('id_usuario');
            $table->foreignId('id_usuario')->constrained(table: 'usuarios')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitacoras');
    }
};
