<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'file_path',
        'subject_id',
    ];

    /**
     * Material was created by a user (teacher/admin)
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Material belongs to a subject
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    /**
     * Material has many quizzes
     */
    public function quizzes(): HasMany
    {
        return $this->hasMany(Quizz::class, 'material_id');
    }
}
