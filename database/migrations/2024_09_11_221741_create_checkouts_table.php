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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('created_by')->nullable();  // If users are logged in
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name')->nullable();
            $table->string('country');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('phone');
            $table->string('email');
            $table->text('notes')->nullable();
            $table->enum('shipping_method', ['free_shipping', 'local', 'flat_rate']);
            $table->enum('payment_method', ['bank_transfer', 'cod', 'stripe']);
            $table->decimal('total', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
