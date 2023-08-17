<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';
    use HasFactory;
    protected $fillable = ['institution', 'degree', 'major', 'start_date', 'end_date', 'description','user_id'];
}
