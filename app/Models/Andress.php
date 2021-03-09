<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Andress extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'zip_code',
        'andress',
        'complement',
        'district',
        'zone',
        'state'
    ];
}
