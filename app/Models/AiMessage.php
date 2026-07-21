<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AiMessage extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'ai_session_id',
        'sender',
        'role',
        'message',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'json',
    ];

    /**
     * Message belongs to an ai session
     */
    public function session(): BelongsTo
    {
        return $this->belongsTo(AiSession::class, 'ai_session_id');
    }
}
