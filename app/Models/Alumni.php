<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumni';

        protected $fillable = [
            'student_id',
            'email',
            'first_name',
            'middle_name',
            'last_name',
            'suffix',
            'phone',
            'address',
            'course',
            'section',
            'major',
            'year_graduated',
            'employment_status',
            'company_name',
            'position',
            'profile_picture',
            'achievements',
            'notes',
    ];

}
