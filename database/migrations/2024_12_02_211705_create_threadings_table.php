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
        Schema::create('threadings', function (Blueprint $table) {
            $table->id('threading_id');
            $table->foreignId('material_id')->constrained('materials', 'material_id');
            $table->string('brand');
            $table->string('fibers');
            $table->string('category');
            $table->string('color');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('threadings');
    }
};
