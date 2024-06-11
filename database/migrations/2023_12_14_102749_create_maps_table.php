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
        Schema::create('maps', function (Blueprint $table) {
            $table->id();
            $table->string('map_id');
            $table->string('map_pool_id');
            $table->string('name')->nullable();
            $table->string('star_rating')->nullable();
            $table->string('bpm')->nullable();
            $table->string('length')->nullable();
            $table->string('beatmapset_id')->nullable();
            $table->string('difficulty_name')->nullable();
            $table->string('artist')->nullable();
            $table->string('creator')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maps');
    }
};
