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
        // define polymorphic one-to-one relationship
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            // define two columns for the polymorphic relationship - model type and model id
            $table->unsignedBigInteger('imageable_id')->nullable(); // model id
            $table->string('imageable_type')->nullable(); // model type
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
