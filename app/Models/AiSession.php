<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AiSession extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'title'
    ];

    /**
     * Session belongs to a user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Session has many messages
     */
    public function messages(): HasMany
    {
        return $this->hasMany(AiMessage::class, 'ai_session_id');
    }
}
