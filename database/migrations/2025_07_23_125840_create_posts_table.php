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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // put onDelete('setNull') to prevent foreign key constraint errors
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('SET NULL');
            $table->string('title');
            $table->integer('likes');
            $table->integer('views');
            $table->softDeletes(); // add this column belong to soft delete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
