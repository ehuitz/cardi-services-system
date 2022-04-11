<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'management_access',
            ],
            [
                'id'    => 2,
                'title' => 'inventory_access',
            ],
            [
                'id'    => 3,
                'title' => 'seed_access',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'hr_access',
            ],
            [
                'id'    => 6,
                'title' => 'sick_access',
            ],
            [
                'id'    => 7,
                'title' => 'requests_access',
            ],


        ];


        Permission::insert($permissions);
    }
}
