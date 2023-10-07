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
        Schema::create('product_wheel_trims', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->boolean('is_default')->default(false);
            $table->foreignId('product_id')->constrained('products', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_wheel_trims');
    }
};
