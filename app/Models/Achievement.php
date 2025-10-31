<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'date_started',
        'date_finished',
        'project_photo',
        'credit_to',   // Could be alumni_id if you add foreign key
    ];
}
