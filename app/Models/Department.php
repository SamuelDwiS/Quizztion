<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Subject;
use App\Models\StudentClass;

class Department extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'code'
    ];

    public function studentClasses(): HasMany
    {
        return $this->hasMany(StudentClass::class);
    }

    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
}
