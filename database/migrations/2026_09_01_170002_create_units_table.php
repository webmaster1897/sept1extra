<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties')->cascadeOnDelete();
            $table->string('unit_code', 50);
            $table->string('name');
            $table->string('floor', 50)->nullable();
            $table->unsignedInteger('bedrooms')->nullable();
            $table->unsignedInteger('bathrooms')->nullable();
            $table->decimal('area', 10, 2)->nullable();
            $table->decimal('rent_amount', 15, 2)->nullable();
            $table->decimal('sale_price', 15, 2)->nullable();
            $table->string('status', 30)->default('available');
            $table->timestamps();

            $table->unique(['property_id', 'unit_code']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
