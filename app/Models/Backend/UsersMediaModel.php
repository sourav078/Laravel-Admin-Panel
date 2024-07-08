<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersMediaModel extends Model
{
    use HasFactory;
    protected $table = 'users_profile_media';
    protected $fillable = [
        'user_id',
        'profile_image',
    ];
}
