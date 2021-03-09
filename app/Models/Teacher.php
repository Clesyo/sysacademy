<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory,Uuid;

    protected $keyType = 'string';
    protected $uuidVersion = 3;
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'document',
        'joining_date',
        'gender',
        'registration',
        'email',
        'password',
        'telephone',
        'cell_phone',
        'photo',
        'andress_id',
        'user_id',
        'course_id'
    ];
}
