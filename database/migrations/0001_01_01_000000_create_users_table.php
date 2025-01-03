<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTAble extends Migration
{
    /**
     * Creation of the table 
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id'); // Primary Key
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('registration_date')->useCurrent(); // Set current timestamp by default
            $table->string('name')->nullable();
            $table->string('avatar_image')->default('public/images/default-avatar.png'); // Default avatar image path
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
