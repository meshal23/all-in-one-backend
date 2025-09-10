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
        Schema::create('item_masters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code');
            $table->bigInteger('brand_code');
            $table->bigInteger('category_code');
            $table->string('name');
            $table->integer('min_stock')->nullable();
            $table->integer('max_stock')->nullable();
            $table->decimal('cost_price');
            $table->decimal('retail_price');
            $table->decimal('discount_amount')->nullable();
            $table->decimal('discount_percent')->nullable();
            $table->boolean('is_batch')->default(1);
            $table->boolean('is_active')->default(1);
            $table->enum('item_type', ['product', 'service'])->default('product');
            $table->string('image')->nullable();
            $table->longText('description')->nullable();

            $table->foreign('brand_code')->references('code')->on('item_brands')->onDelete('cascade');
            $table->foreign('category_code')->references('code')->on('item_categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_masters');
    }
};
