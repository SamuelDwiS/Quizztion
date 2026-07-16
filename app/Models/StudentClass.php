<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'department_id'];
}
