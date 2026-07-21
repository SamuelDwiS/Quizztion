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
        Schema::create('login_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('ip_address', 45);
            $table->integer('attempt_count')->default(1)->comment('Number of failed login attempts');
            $table->timestamp('last_attempt_at')->nullable();
            $table->timestamp('locked_until')->nullable()->comment('Brute force rate limiting');
            $table->timestamps();
            $table->index(['ip_address', 'last_attempt_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_attempts');
    }
};
