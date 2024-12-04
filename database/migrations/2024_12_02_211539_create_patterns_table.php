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
        Schema::create('patterns', function (Blueprint $table) {
            $table->id('pattern_id');
            $table->foreignId('library_id')->constrained('libraries','library_id');
            $table->dateTime('add_date');
            $table->text('materials');
            $table->string('name');
            $table->string('status');
            $table->text('description');
            $table->decimal('base_price', 8, 2);
            $table->dateTime('upload_date');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patterns');
    }
};
