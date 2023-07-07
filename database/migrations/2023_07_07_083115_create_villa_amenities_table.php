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
        Schema::create('villa_amenities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('villa_id');
            $table->unsignedBigInteger('amenitie_id');
            $table->foreign('amenitie_id')->references('id')->on('amenities')->onDelete('cascade');
            $table->foreign('villa_id')->references('id')->on('villas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villa_amenities');
    }
};
