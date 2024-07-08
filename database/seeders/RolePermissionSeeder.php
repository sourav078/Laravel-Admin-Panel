<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Modified with web guard
         */
        $roleSuperAdmin = Role::create(['guard_name' => 'web', 'name' => 'superadmin']);
        /**
         * Create admin role
         */
        $roleAdmin = Role::create(['guard_name' => 'web', 'name' => 'admin']);
        /**
         * Create a blank role for frontend user
         */
        Role::create(['guard_name' => 'web', 'name' => 'user']);
        /**
         * End of create role for frontend user
         */
        DB::table('permissions_group')->insert([
            ['group_name' => 'dashboard'],
            ['group_name' => 'users'],
            ['group_name' => 'roles'],
            ['group_name' => 'group'],
            ['group_name' => 'permission'],
            ['group_name' => 'account'],
            ['group_name' => 'blog'],
            ['group_name' => 'portfolio'],
            ['group_name' => 'projects'],
            ['group_name' => 'service'],

        ]);
        /**
         * set permission lists
         */
        $permissions = [
            [
                'group_id' => 1,
                'permissions' => [
                    'dashboard.view',
                ],
            ],
            [
                'group_id' => 2,
                'permissions' => [
                    'users.list',
                    'users.create.form',
                    'users.save',
                    'users.edit.form.view',
                    'users.update',
                    'users.delete',
                    'users.destroyByHardDelete',
                    'users.restore',
                    'users.restoreUserProcessing',
                ],
            ],
            [
                'group_id' => 3,
                'permissions' => [
                    'roles.list',
                    'roles.create.form.view',
                    'roles.save',
                    'roles.edit.form.view',
                    'roles.update',
                    'roles.delete',
                    'multiple.roles.permission.update',
                ],
            ],
            [
                'group_id' => 4,
                'permissions' => [
                    'group.list',
                    'group.create.form.view',
                    'group.save',
                    'group.edit.form.view',
                    'group.update',
                    'group.delete',
                ],
            ],
            [
                'group_id' => 5,
                'permissions' => [
                    'permission.list',
                    'permission.create.form.view',
                    'permission.save',
                    'permission.edit.form.view',
                    'permission.update',
                    'permission.delete',
                ],
            ],
            [
                'group_id' => 6,
                'permissions' => [
                    'account.settings'
                ],
            ],
            [
                'group_id' => 7,
                'permissions' => [
                    'blog.list',
                    'blog.create.form',
                    'blog.save',
                    'blog.edit.form.view',
                    'blog.update',
                    'blog.delete'

                ],
            ],
              [
                'group_id' => 8,
                'permissions' => [
                    'portfolio.list',
                    'portfolio.create.form',
                    'portfolio.save',
                    'portfolio.edit.form.view',
                    'portfolio.update',
                    'portfolio.delete'

                ],
            ],
              [
                'group_id' => 9,
                'permissions' => [
                    'projects.list',
                    'projects.create.form',
                    'projects.save',
                    'projects.edit.form.view',
                    'projects.update',
                    'projects.delete'

                ],
            ],
              [
                'group_id' => 10,
                'permissions' => [
                    'service.list',
                    'service.create.form',
                    'service.save',
                    'service.edit.form.view',
                    'service.update',
                    'service.delete'

                ],
            ],



        ];
        /**
         * create group
         */
        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_id'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_id' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                // assigning role for admin user
                if ($permissionGroup == 3 && $permissions[$i]['permissions'][$j] == 'roles.list') {
                    $roleAdmin->givePermissionTo($permission);
                }
                if ($permissionGroup != 3 && $permissionGroup != 4 && $permissionGroup != 5) {
                    $roleAdmin->givePermissionTo($permission);
                }
            }
        }
    }
}
