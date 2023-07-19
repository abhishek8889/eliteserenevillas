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
        Schema::create('villas', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->integer('category_id');
            $table->integer('min_guest');
            $table->integer('max_guest');
            $table->string('location_id')->nullable(); // get from Location table. 
            $table->string('banner_id')->nullable(); // get from media table
            $table->string('destination_id')->nullable(); // get from destinations table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villas');
    }
};
