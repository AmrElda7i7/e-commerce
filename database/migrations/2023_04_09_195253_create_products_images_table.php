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
        Schema::create('products_images', function (Blueprint $table) {
            $table->id();
            $table->string('image_name',255);
            $table->foreignId('product_id')->constrained('products','id')->cascadeOnDelete()->cascadeOnUpdate();
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_images');
    }
};
