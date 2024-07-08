<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersAddressDetailsModel extends Model
{
    use HasFactory;
    protected $table = 'users_address_details';
    protected $fillable = [
        'user_id',
        'address_line_one',
        'address_line_two',
        'district',
        'city',
        'state',
        'postal_code',
        'country',
    ];

    public static function address_data_return()
    {
        $userAddressModel = UsersAddressDetailsModel::where('user_id', auth()->user()->id)->first();
        if ($userAddressModel) {
            return [
                'address_id' => $userAddressModel->id,
                'address_line_one' => $userAddressModel->address_line_one,
                'address_line_two' => $userAddressModel->address_line_two,
                'district' => $userAddressModel->district,
                'city' => $userAddressModel->city,
                'state' => $userAddressModel->state,
                'postal_code' => $userAddressModel->postal_code,
                'country' => $userAddressModel->country,
            ];
        } else {
            return [];
        }
    }
    /**
     * return address return by id
     */
    public static function returnUserAddressDetailsByUserId($user_id)
    {
        $userAddressModel = UsersAddressDetailsModel::where('user_id', $user_id)->first();
        if ($userAddressModel) {
            return [
                'address_id' => $userAddressModel->id,
                'address_line_one' => $userAddressModel->address_line_one,
                'address_line_two' => $userAddressModel->address_line_two,
                'district' => $userAddressModel->district,
                'city' => $userAddressModel->city,
                'state' => $userAddressModel->state,
                'postal_code' => $userAddressModel->postal_code,
                'country' => $userAddressModel->country,
            ];
        } else {
            return [];
        }
    }
}
