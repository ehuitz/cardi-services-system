<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $administrator_permissions  = Permission::all();

        Role::findOrFail(1)->permissions()->sync($administrator_permissions ->pluck('id'));

        $head_unit_permissions = $administrator_permissions ->filter(function ($permission) {
            return substr($permission->title, 0, 11) != 'management_' && substr($permission->title, 0, 10) != 'executive_'
            && substr($permission->title, 0, 5) != 'manager_'


            ;
        });

        Role::findOrFail(2)->permissions()->sync($head_unit_permissions);

    }
}
