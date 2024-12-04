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
        Schema::create('flosses', function (Blueprint $table) {
            $table->id('floss_id');
            $table->foreignId('threading_id')->constrained('threadings', 'threading_id');
            $table->integer('strands');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flosses');
    }
};
