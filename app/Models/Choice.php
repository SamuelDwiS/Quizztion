<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Choice extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'id';
    protected $fillable = [
        'question_id',
        'key',
        'content',
        'is_correct',
    ];

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    /**
     * Choice belongs to a question
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
