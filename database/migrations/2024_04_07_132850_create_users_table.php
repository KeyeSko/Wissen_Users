<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run migrations
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('username', 50)->unique();
            $table->string('password_hash', 128);
            $table->string('email', 100)->unique();
            $table->string('role', 20);
            $table->timestamps();
        });

        Schema::create('userbooks', function (Blueprint $table) {
            $table->id('record_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');
            $table->string('status', 50)->nullable();
            $table->date('read_date')->nullable();
            $table->date('abandon_date')->nullable();
            $table->integer('rating')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userbooks');
        Schema::dropIfExists('users');
    }
};
