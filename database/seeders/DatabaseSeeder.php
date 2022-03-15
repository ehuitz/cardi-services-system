<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $country1 = \App\Models\Country::factory()->create([
            'name' => 'Antigua and Barbuda'
        ]);
        $country2 = \App\Models\Country::factory()->create([
            'name' => 'The Bahamas'
        ]);
        $country3 = \App\Models\Country::factory()->create([
            'name' => 'Barbados'
        ]);
        $country4 = \App\Models\Country::factory()->create([
            'name' => 'Belize'
        ]);
        $country5 = \App\Models\Country::factory()->create([
            'name' => 'Cayman Islands'
        ]);
        $country6 = \App\Models\Country::factory()->create([
            'name' => 'Dominica'
        ]);
        $country7 = \App\Models\Country::factory()->create([
            'name' => 'Greneda'
        ]);
        $country8 = \App\Models\Country::factory()->create([
            'name' => 'Guyana'
        ]);
        $country9 = \App\Models\Country::factory()->create([
            'name' => 'Jamaica'
        ]);
        $country10 = \App\Models\Country::factory()->create([
            'name' => 'Montserrat'
        ]);
        $country11 = \App\Models\Country::factory()->create([
            'name' => 'Saint Lucia'
        ]);
        $country12 = \App\Models\Country::factory()->create([
            'name' => 'St. Vincent and the Grenadines'
        ]);
        $country13 = \App\Models\Country::factory()->create([
            'name' => 'St. Kitts and Nevis'
        ]);
        $country14 = \App\Models\Country::factory()->create([
            'name' => 'Trinidad and Tobago'
        ]);




        $user_staff1 = \App\Models\User::factory()->create([
            'email' => 'admin@admin.com',
            'staff' => true,
            'country_id' => $country1->id
        ]);
        $user_staff2 = \App\Models\User::factory()->create([
            'email' => 'staff@staff.com',
            'staff' => true,
            'country_id' => $country3->id
        ]);
        $user_user1 = \App\Models\User::factory()->create([
            'email' => 'user@user.com',
            'country_id' => $country1->id
        ]);
        $user_user2 = \App\Models\User::factory()->create([
            'email' => 'user2@user.com',
            'country_id' => $country2->id
        ]);
        $user_user3 = \App\Models\User::factory()->create([
            'email' => 'user3@user.com',
            'country_id' => $country3->id
        ]);
        $user_user4 = \App\Models\User::factory()->create([
            'email' => 'user4@user.com',
            'country_id' => $country4->id
        ]);
        \App\Models\Category::factory()->create(['name' => 'Biometrics']);
        \App\Models\Category::factory()->create(['name' => 'Statistical Analysis']);
        \App\Models\Category::factory()->create(['name' => 'Market Research']);
        \App\Models\Category::factory()->create(['name' => 'Feasibilty Study for Agricultural Inputs']);
        \App\Models\Category::factory()->create(['name' => 'Value Chain Assessment']);
        \App\Models\Category::factory()->create(['name' => 'Other']);


        \App\Models\Status::factory()->create(['name' => 'Open',    'color' => '0']);
        \App\Models\Status::factory()->create(['name' => 'Pending', 'color' => '1']);
        \App\Models\Status::factory()->create(['name' => 'Closed',  'color' => '2']);
        $staff1 = \App\Models\Staff::factory()->create(['user_id' => $user_staff1->id]);
        $staff1->categories()->attach(['1','2','3']);
        $staff1->countries()->attach(['1', '2']);

        $staff2 = \App\Models\Staff::factory()->create(['user_id' => $user_staff2->id]);
        $staff2->categories()->attach(['1','2','3','4', '5']);
        $staff2->countries()->attach(['3', '4']);

        $tickets_1 = \App\Models\Ticket::factory(3)->create([
            'country_id' => $country1->id,
            'category_id' => '1',
            'status_id' => '1',
            'author_id' => $user_user1->id
        ]);
        $tickets_2 = \App\Models\Ticket::factory(7)->create([
            'country_id' => $country2->id,
            'category_id' => '3',
            'status_id' => '1',
            'author_id' => $user_user2->id
        ]);
        $tickets_3 = \App\Models\Ticket::factory(5)->create([
            'country_id' => $country3->id,
            'category_id' => '5',
            'status_id' => '1',
            'author_id' => $user_user3->id
        ]);
        $tickets_4 = \App\Models\Ticket::factory(2)->create([
            'country_id' => $country4->id,
            'category_id' => '4',
            'status_id' => '1',
            'author_id' => $user_user4->id
        ]);

        foreach($tickets_1 as $ticket)
            $ticket->staff()->attach($staff1->id);
        foreach($tickets_2 as $ticket)
            $ticket->staff()->attach($staff1->id);
        foreach($tickets_3 as $ticket)
            $ticket->staff()->attach($staff2->id);
        foreach($tickets_4 as $ticket)
            $ticket->staff()->attach($staff2->id);

        $charger = \App\Models\DeviceModel::create([
            'name' => 'USB-C Power Supply',
            'type' => 11,
            'manufacturer' => 9
        ]);
        $laptop1 = \App\Models\DeviceModel::create([
            'name' => 'Latitude 3390',
            'type' => 4,
            'manufacturer' => 9
        ]);
        $laptop2 = \App\Models\DeviceModel::create([
            'name' => 'Latitude 5310',
            'type' => 4,
            'manufacturer' => 9
        ]);
        $chromebook = \App\Models\DeviceModel::create([
            'name' => 'Chromebook 3100',
            'type' => 4,
            'manufacturer' => 9
        ]);
        $projector = \App\Models\DeviceModel::create([
            'name' => 'XJ-F101W',
            'type' => 7,
            'manufacturer' => 8
        ]);
        \App\Models\Device::factory(5)->create([
            'model_id' => $charger->id,
            'country_id' => $country1->id
        ]);
        \App\Models\Device::factory(5)->create([
            'model_id' => $charger->id,
            'country_id' => $country2->id
        ]);
        \App\Models\Device::factory(5)->create([
            'model_id' => $charger->id,
            'country_id' => $country3->id
        ]);
        \App\Models\Device::factory(2)->create([
            'model_id' => $laptop1->id,
            'country_id' => $country1->id,
        ]);
        \App\Models\Device::factory(3)->create([
            'model_id' => $laptop2->id,
            'country_id' => $country4->id,
        ]);
        \App\Models\Device::factory(7)->create([
            'model_id' => $chromebook->id,
            'country_id' => $country3->id
        ]);
        \App\Models\Device::factory(2)->create([
            'model_id' => $projector->id,
            'country_id' => $country3->id
        ]);

        \App\Models\Device::factory(5)->create([
            'model_id' => $charger->id,
            'country_id' => $country1->id
        ]);

        $hr = \App\Models\Department::create([
            'name' => 'Human Resources',
            'country_id' => 14
        ]);

        $it = \App\Models\Department::create([
            'name' => 'Information Technology',
            'country_id' => 14
        ]);
    }
}
