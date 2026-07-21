<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\PasskeyUser;
use Laravel\Fortify\PasskeyAuthenticatable;
use Laravel\Fortify\TwoFactorAuthenticatable;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property Carbon|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'two_factor_secret', 'two_factor_recovery_codes', 'remember_token'])]
class User extends Authenticatable implements PasskeyUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, PasskeyAuthenticatable, TwoFactorAuthenticatable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        $initials = Str::initials($this->name, true);

        return Str::length($initials) > 1
            ? Str::substr($initials, 0, 1) . Str::substr($initials, -1)
            : $initials;
    }

    /**
     * User has many roles
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles')
            ->withTimestamps()
            ->withPivot('assigned_at');
    }

    /**
     * User has authored many materials
     */
    public function materials()
    {
        return $this->hasMany(Material::class, 'user_id');
    }

    /**
     * User has many quiz attempts
     */
    public function quizAttempts()
    {
        return $this->hasMany(QuizzAttempt::class, 'user_id');
    }

    /**
     * User has many ai sessions
     */
    public function aiSessions()
    {
        return $this->hasMany(AiSession::class, 'user_id');
    }

    /**
     * User has many login attempts
     */
    public function loginAttempts()
    {
        return $this->hasMany(UserAttempt::class, 'user_id');
    }
}
