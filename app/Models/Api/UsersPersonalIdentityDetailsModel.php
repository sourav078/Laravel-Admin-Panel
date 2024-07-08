<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersPersonalIdentityDetailsModel extends Model
{
    use HasFactory;
    protected $table = 'users_personal_identity_details';
    protected $fillable = [
        'user_id',
        'identity_number',
        'identity_type',
        'front_side_image',
        'back_side_image'
    ];
}
