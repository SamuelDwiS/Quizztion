<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Role extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'role',
        'permission'
    ];

}
