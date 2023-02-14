<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            //Identifiers
            $table->id();
            $table->string('key')->unique();

            //Information
            $table->string('name');
            $table->mediumText('description');
            $table->unsignedInteger('cost');
            $table->unsignedInteger('retail');

            //Boolean Flags
            $table->boolean('active')->default(true);
            $table->boolean('vat')->default(config('shop.vat'));

            //Json Columns

            //Relationships
            $table->foreignId('category_id')->nullable()->index()->constrained();
            $table->foreignId('range_id')->nullable()->index()->constrained(); //TODO change this concept

            // Date stamps
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
