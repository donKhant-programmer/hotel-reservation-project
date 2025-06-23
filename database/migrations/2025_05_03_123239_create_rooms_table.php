<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('rooms')) {
            Schema::create('rooms', function (Blueprint $table) {
                $table->id();
                $table->string('room_number');
                $table->unsignedBigInteger('room_type_id');
                $table->string('floor')->nullable();
                $table->enum('status', ['available', 'booked', 'maintenance'])->default('available');
                $table->timestamps();
            
                $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
            });
            
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
