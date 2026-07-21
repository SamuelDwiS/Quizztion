<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quizz extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'quizzes';
    protected $fillable = [
        'material_id',
        'title',
        'type',
    ];

    /**
     * Quiz belongs to a material
     */
    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    /**
     * Quiz has many questions
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'quiz_id');
    }

    /**
     * Quiz has many attempts
     */
    public function attempts(): HasMany
    {
        return $this->hasMany(QuizzAttempt::class, 'quiz_id');
    }
}
