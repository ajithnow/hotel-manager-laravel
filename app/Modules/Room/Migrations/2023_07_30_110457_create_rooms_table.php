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
        Schema::create('rooms', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->timestamps();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->uuid('room_type_id');
            $table->foreign('room_type_id')->references('uuid')->on('room_types');
            $table->decimal('price')->default(0.0);
            $table->integer('max_pax')->default(2);
            $table->uuid('floor_id');
            $table->foreign('floor_id')->references('uuid')->on('floors');
            $table->json('meta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
