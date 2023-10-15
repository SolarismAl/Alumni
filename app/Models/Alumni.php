<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumni';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'graduation_year',
        'place',
        // Add other fields as needed
    ];
}
