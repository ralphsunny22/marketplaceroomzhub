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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();

            $table->longText('business_name')->nullable();
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('business_link')->nullable();

            $table->string('featured_logo')->default('noimage.png');
            $table->string('featured_image')->default('noimage.png');
            $table->json('alternate_images')->nullable();

            $table->longText('business_city')->nullable();
            $table->longText('business_state')->nullable();
            $table->longText('business_country')->nullable();
            $table->longText('business_address')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();

            $table->longText('business_description')->nullable();

            $table->longText('stripe_public_key')->nullable();
            $table->longText('stripe_secret_key')->nullable();
            $table->longText('stripe_webhook_secret')->nullable();

            $table->string('status')->default('pending'); //confirmed, suspended

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
