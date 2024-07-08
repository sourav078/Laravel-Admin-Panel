<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_param = array(
            array('email' => 'cmssuperadmin@email.com', 'name' => 'superadmin', 'password' => 'password')
            /**
             * here any superadmin related role will be placed
             */
        );
        foreach ($user_param as $row) {
            $user_data = User::where('email', $row['email'])->first();
            if (is_null($user_data)) {
                $userModel = new User();
                $userModel->name = $row['name'];
                $userModel->email = $row['email'];
                $userModel->password = Hash::make($row['password']);
                $userModel->isAdmin = true;
                $userModel->uid = (string) Str::uuid();
                $userModel->save();
                //assigning superadmin roles to this user by default
                $userModel->assignRole('superadmin');
                //$userModel->syncPermissions();
            }
        }
        /**
         * Seeker user seeder
         */
        $admin_user_param = array(
            array('email' => 'cmsadmin@email.com', 'name' => 'admin', 'password' => 'password')
            /**
             * here any admin related role will be placed
             */
        );
        foreach ($admin_user_param as $row) {
            $user_data = User::where('email', $row['email'])->first();
            if (is_null($user_data)) {
                $userModel = new User();
                $userModel->name = $row['name'];
                $userModel->email = $row['email'];
                $userModel->password = Hash::make($row['password']);
                $userModel->isAdmin = true;
                $userModel->uid = (string) Str::uuid();
                $userModel->save();
                //assigning superadmin roles to this user by default
                $userModel->assignRole('admin');
                //$userModel->syncPermissions();
            }
        }
    }
}
