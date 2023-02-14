<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            //Identifiers
            $table->id();
            $table->string('key')->unique();

            //Information
            $table->string('name');
            $table->mediumText('description');
            $table->boolean('active')->default(true);
            $table->timestamps();


        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
