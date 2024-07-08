<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersPersonalDetailsModel extends Model
{
    use HasFactory;
    protected $table = 'users_personal_details';
    protected $fillable = [
        'user_id',
        'gender',
        'date_of_birth',
        'marital_status'
    ];
    /**
     * Get user personal data
     */
    public static function return_users_personal_details_data(){
        return UsersPersonalDetailsModel::where('user_id', auth()->user()->id)->select('gender', 'date_of_birth', 'marital_status')->first();
    }
    /**
     * Get user personal data by User id
     */
    public static function returnUsersPersonalDetailsDataById($user_id){
        return UsersPersonalDetailsModel::where('user_id', $user_id)->select('gender', 'date_of_birth', 'marital_status')->first();
    }
}
