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
                'title' => 'seeds_access',
            ],
            [
                'id'    => 4,
                'title' => 'reports_access',
            ],
            [
                'id'    => 5,
                'title' => 'vacation_request_access',
            ],
            [
                'id'    => 6,
                'title' => 'sick_request_access',
            ],
            [
                'id'    => 7,
                'title' => 'charts_access',
            ],
            [ 'id'    => 8,
            'title' => 'management_user_access',

              ],
              [ 'id'    => 9,
              'title' => 'file_request_upload',

                ],
                [ 'id'    => 10,
                'title' => 'edit_request_details',

                  ],
                  [ 'id'    => 11,
                  'title' => 'department_unit_head_approve',

                    ],
                    [ 'id'    => 12,
                  'title' => 'manager_approve',

                    ],
                    [ 'id'    => 13,
                  'title' => 'executive_approve',

                    ],


        ];


        Permission::insert($permissions);
    }
}
