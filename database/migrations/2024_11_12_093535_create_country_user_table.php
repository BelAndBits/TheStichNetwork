<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryUserTable extends Migration
{
    public function up()
    {
        Schema::create('country_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('country_id');
            
            // Claves foráneas ajustadas para user_id y country_id
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('country_id')->references('country_id')->on('countries')->onDelete('cascade');
            
            $table->timestamps();
            
            // Primary key compuesta
            $table->primary(['user_id', 'country_id']);
        });
    }
    
}
