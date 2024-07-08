<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UsersProfileMediaModel extends Model
{
    use HasFactory;
    protected $table = 'users_profile_media';
    protected $fillable = [
        'user_id',
        'profile_image',
    ];
    /**
     * Get user profile image by auth token
     */
    public static function user_media_file_return()
    {
        $usersMediaInfoModel = UsersProfileMediaModel::where('user_id', auth()->user()->id)->first();
        if ($usersMediaInfoModel && $usersMediaInfoModel->profile_image != null && Storage::disk('public')->exists('images/profile_image/' . $usersMediaInfoModel->profile_image)) {
            return $usersMediaInfoModel->profile_image;
        } else {
            return null;
        }
    }

    public static function user_media_file_return_bk_06_05_21()
    {
        $image_data_array = [];
        $usersMediaInfoModel = UsersProfileMediaModel::where('user_id', auth()->user()->id)->first();
        if ($usersMediaInfoModel && $usersMediaInfoModel->profile_image != null && Storage::disk('public')->exists('images/profile_image/' . $usersMediaInfoModel->profile_image)) {
            //return Storage::url('images/profile_image/' . $usersMediaInfoModel->profile_image);
            $image_data_array['profile_image_original'] = Storage::url('images/profile_image/' . $usersMediaInfoModel->profile_image);
            if (Storage::disk('public')->exists('images/profile_image/thumb/' . $usersMediaInfoModel->profile_image)) {
                $image_data_array['profile_image_thumb'] = Storage::url('images/profile_image/thumb/' . $usersMediaInfoModel->profile_image);
            }
            return $image_data_array;
        } else {
            return null;
        }
    }
    /**
     * Get user profile by user id
     */
    public static function userMediaFileReturnByUserId($user_id)
    {
        $usersMediaInfoModel = UsersProfileMediaModel::where('user_id', $user_id)->first();
        if ($usersMediaInfoModel && $usersMediaInfoModel->profile_image != null && Storage::disk('public')->exists('images/profile_image/' . $usersMediaInfoModel->profile_image)) {
            //return Storage::url('images/profile_image/' . $usersMediaInfoModel->profile_image);
            return $usersMediaInfoModel->profile_image;
        } else {
            return null;
        }
    }
        /**
     * Get user profile by user id
     */
    public static function userMediaWithThumbFileReturnByUserId($user_id)
    {
        $userMedia = DB::table('users')
            ->leftJoin('users_profile_media', 'users_profile_media.user_id', '=', 'users.id')
            ->select('users.id', 'users_profile_media.profile_image')
            ->where('users.id', $user_id)
            ->first();
        if($userMedia){
            return [
                'profile_image' => $userMedia->profile_image != null && Storage::disk('public')->exists('images/profile_image/' . $userMedia->profile_image) ? Storage::url('images/profile_image/' . $userMedia->profile_image) : '/images/avatar-profile-image.png',
                'profile_image_thumb' => $userMedia->profile_image != null && Storage::disk('public')->exists('images/profile_image/' . $userMedia->profile_image) ? Storage::url('images/profile_image/' . $userMedia->profile_image) : '/images/avatar-profile-image.png',
            ];
        } else{
            return null;
        }
    }
}
