<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentClass extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['level', 'department_id'];
    
    
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
