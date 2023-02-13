<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->string('house');
            $table->string('street');
            $table->string('parish')->nullable();
            $table->string('ward')->nullable();
            $table->string('district')->nullable();
            $table->string('county')->nullable();
            $table->string('postcode');
            $table->string('country')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
