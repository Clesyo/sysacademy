<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'document',
        'gender',
        'registration',
        'email',
        'password',
        'cell_phone',
        'photo',
        'andress_id',
        'user_id',
        'course_id'
    ];
}
