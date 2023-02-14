<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('variants', function (Blueprint $table) {
            //Identifiers
            $table->id();
            $table->string('key')->unique();

            //Information
            $table->string('name');
            $table->unsignedInteger('cost')->default(0);
            $table->unsignedInteger('retail')->default(0);
            $table->unsignedInteger('height')->nullable();
            $table->unsignedInteger('width')->nullable();
            $table->unsignedInteger('length')->nullable();
            $table->unsignedInteger('weight')->nullable();

            //Boolean flags
            $table->boolean('active');
            $table->boolean('shippable');

            //Relationships
            $table->foreignId('product_id')->nullable()->index()->constrained();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('variants');
    }
};
