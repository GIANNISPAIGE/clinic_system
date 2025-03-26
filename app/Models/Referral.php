<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'address',
        'age',
        'sex',
        'date',
        'instruction',
        'source_clinic',
        'doctor'
    ];
}

