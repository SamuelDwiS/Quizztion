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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->constrained('quizzes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('type')->default('single')->comment('single, multiple, essay, numeric');
            $table->text('question');
            $table->decimal('max_score', 5, 2)->default(1.00);
            $table->jsonb('metadata')->nullable()->comment('hints, difficulty, source_span');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
