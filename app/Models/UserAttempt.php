<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAttempt extends Model
{
    protected $table = 'login_attempts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'ip_address',
        'attempt_count',
        'last_attempt_at',
        'locked_until',
    ];

    protected $casts = [
        'last_attempt_at' => 'datetime',
        'locked_until' => 'datetime',
    ];

    /**
     * Login attempt belongs to a user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
