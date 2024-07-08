<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersContactDetailsModel extends Model
{
    use HasFactory;
    protected $table = 'users_contact_details';
    protected $fillable = [
        'user_id',
        'phone_number',
        'mobile_number',
        'isd_code'
    ];
    /**
     * Return user contact details
     */
    public static function getUserContactDetails(){
        return UsersContactDetailsModel::select('phone_number', 'mobile_number', 'isd_code')->where('user_id', auth()->user()->id)->first();
    }
    /**
     * Return user contact details by user id
     */
    public static function getUserContactDetailsByUserId($user_id){
        return UsersContactDetailsModel::select('phone_number', 'mobile_number', 'isd_code')->where('user_id', $user_id)->first();
    }
}
