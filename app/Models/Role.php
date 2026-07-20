<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Role extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'role'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles')
            ->withTimestamps()
            ->withPivot('assigned_at');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission')
            ->withTimestamps();
    }
}
