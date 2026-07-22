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
        Schema::create('quiz_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('quiz_id')->constrained('quizzes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('score', 5, 2)->default(0);
            $table->decimal('max_score', 5, 2)->default(1);
            $table->integer('attempt_number')->default(1);
            $table->jsonb('answers')->nullable()->comment('Structured answers: {question_id: {choice: A, text: ...}}');
            $table->string('status')->default('completed')->comment('in_progress, completed, aborted');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->integer('duration_seconds')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_attempts');
    }
};

