<?php
/**
 * this model purpose is only validate the user data
 */
namespace App\Models\Api;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDataValidationModel extends Model
{
    use HasFactory;
    /**
     * check if the request has send to valid counsellor type user by counsellor id
     */
    public static function checkCounsellorIsValidById($counsellor_id)
    {
        $loadCounsellor = User::findOrfail($counsellor_id);
        if ($loadCounsellor->hasRole('counsellor') && $loadCounsellor->verified == 1) {
            return true;
        } else {
            throw new Exception('counsellor type user not valid');
        }
    }
}
