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
        Schema::create('profiles', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        $table->string('full_name')->nullable();
        $table->string('email')->nullable();
        $table->string('phone')->nullable();
        $table->string('address')->nullable();
        $table->text('image')->default('https://bootdey.com/img/Content/avatar/avatar7.png');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
