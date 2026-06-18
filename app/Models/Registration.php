<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_place',
        'birth_date',
        'gender',
        'address_majene',
        'address_kalukku',
        'high_school',
        'university',
        'faculty',
        'study_program',
        'entry_year',
        'phone',
        'parent_permit_file',
    ];
}
