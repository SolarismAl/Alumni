<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'user_profiles';
    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'graduation_year',
        'status',
        'location',
        'work',
        
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
