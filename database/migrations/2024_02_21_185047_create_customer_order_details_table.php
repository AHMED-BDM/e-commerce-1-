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
        Schema::create('customer_order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->nullable(true);
            $table->string('email')->nullable(true);
            $table->text('address');
            $table->string('phone')->nullable(true);
            $table->text('comment')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_order_details');
    }
};
