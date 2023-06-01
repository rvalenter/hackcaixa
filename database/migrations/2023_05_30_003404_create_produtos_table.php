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
        Schema::create('produto', function (Blueprint $table) {
            $table->id('CO_PRODUTO');
            $table->string('NO_PRODUTO');
            $table->decimal('PC_TAXA_JUROS', 10, 9);
            $table->smallInteger('NU_MINIMO_MESES');
            $table->smallInteger('NU_MAXIMO_MESES')->nullable(true);
            $table->decimal('VR_MINIMO', 18, 2);
            $table->decimal('VR_MAXIMO', 18, 2)->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto');
    }
};
