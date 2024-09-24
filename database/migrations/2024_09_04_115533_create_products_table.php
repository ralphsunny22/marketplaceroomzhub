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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('slug')->nullable();
            $table->string('uuid')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->float('price')->nullable(); //selling price
            $table->integer('quantity')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('alternate_images')->nullable();
            $table->longText('description')->nullable();
            $table->json('specifications')->nullable();

            // $table->json('sizes')->nullable();
            // $table->json('colors')->nullable();


            $table->string('status')->default('inactive');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
