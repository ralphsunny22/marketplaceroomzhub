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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('created_by')->nullable(); // Assuming users can be guests
            $table->json('products')->nullable();
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('billing_address1')->nullable();
            $table->string('billing_address2')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_email')->nullable();

            $table->string('different_ship')->default('same');
            $table->string('shipping_country')->nullable();
            $table->string('shipping_address1')->nullable();
            $table->string('shipping_address2')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_phone')->nullable();

            $table->longText('note')->nullable();

            $table->decimal('total', 10, 2);
            $table->enum('shipping_method', ['free_shipping', 'local', 'flat_rate']);
            $table->enum('payment_method', ['bank_transfer', 'cash_on_delivery', 'stripe']);
            $table->string('status')->default('pending'); //processing, shipped, delivered, cancelled

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
