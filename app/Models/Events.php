<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'event_name',
        'description',
        'last_name',
        'location',
        'event_date',
    ];
}
