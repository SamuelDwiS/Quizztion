<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizzAttempt extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'quiz_attempts';
    protected $fillable = [
        'user_id',
        'quiz_id',
        'score',
        'max_score',
        'attempt_number',
        'answers',
        'status',
        'started_at',
        'finished_at',
        'duration_seconds',
        'ip_address',
    ];

    protected $casts = [
        'answers' => 'json',
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
    ];

    /**
     * Attempt belongs to a user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Attempt belongs to a quiz
     */
    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quizz::class, 'quiz_id');
    }
}
