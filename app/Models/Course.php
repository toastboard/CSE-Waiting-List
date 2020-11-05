<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    function getFullNameAttribute()
    {
        return "{$this->field} {$this->course_number} {$this->course_name}";
    }
}
