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
        Schema::create('yarns', function (Blueprint $table) {
            $table->id('yarn_id');
            $table->foreignId('threading_id')->constrained('threadings', 'threading_id');
            $table->string('dye_lot');
            $table->string('gauge');
            $table->string('yardage');
            $table->string('weight');
            $table->string('needle_size');
            $table->string('hook_size');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yarns');
    }
};
