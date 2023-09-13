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
        Schema::create('muebles', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("descripcion");
            $table->double("precio", 9, 2);
            $table->timestamp("creado")->useCurrent();
            $table->timestamp("terminado")->nullable();
            $table->boolean("disponible")->default(1);
            $table->string("foto1")->nullable();
            $table->string("foto2")->nullable();
            $table->string("foto3")->nullable();
            $table->string("foto4")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muebles');
    }
};
