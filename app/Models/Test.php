<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'code_test',
        'status_test',
        'teacher_id',
        'subject_id'
    ];
}
