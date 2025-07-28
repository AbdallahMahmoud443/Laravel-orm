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
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number');
            $table->string('phone_type');
            // important foreign key should be same type of primary key of the table it references
            $table->unsignedBigInteger('user_id');
            /*
                foreign('ForeignKeyName')->references('column_name')->on('table_name')->onDelete('mode')
                cascade: delete the related record from the referenced table
                setNull: set the foreign key column to null
                restrict: prevent the deletion of the related record
            */
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
