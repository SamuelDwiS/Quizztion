<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $fillable = [
        'quiz_id',
        'type',
        'question',
        'max_score',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'json',
    ];

    /**
     * Question belongs to a quiz
     */
    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quizz::class, 'quiz_id');
    }

    /**
     * Question has many choices
     */
    public function choices(): HasMany
    {
        return $this->hasMany(Choice::class, 'question_id');
    }
}
