<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersRatingsSystemModel extends Model
{
    use HasFactory;
    protected $table = 'users_ratings_system';
    protected $fillable = [
        'user_id',
        'ratings_value'
    ];
}
