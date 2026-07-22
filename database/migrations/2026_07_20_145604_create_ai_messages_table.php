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
        Schema::create('ai_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ai_session_id')->constrained('ai_sessions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('sender')->comment('user or model');
            $table->string('role')->nullable()->comment('assistant, user, system for API metadata');
            $table->longText('message');
            $table->jsonb('metadata')->nullable()->comment('tokens, model version, latency, etc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_messages');
    }
};
