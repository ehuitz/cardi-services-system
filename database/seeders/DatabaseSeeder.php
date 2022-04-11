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


        $this->call([
            PermissionsTableSeeder::class,

        ]);

        $country1 = \App\Models\Country::factory()->create([
            'name' => 'Antigua and Barbuda',
            'code' => 'ag',
            'type' => 'External'
        ]);
        $country2 = \App\Models\Country::factory()->create([
            'name' => 'The Bahamas',
            'code' => 'bs',
            'type' => 'External'
        ]);
        $country3 = \App\Models\Country::factory()->create([
            'name' => 'Barbados',
            'code' => 'bb',
            'type' => 'External'
        ]);
        $country4 = \App\Models\Country::factory()->create([
            'name' => 'Belize',
            'code' => 'bz',
            'type' => 'External'
        ]);
        $country5 = \App\Models\Country::factory()->create([
            'name' => 'Cayman Islands',
            'code' => 'ky',
            'type' => 'External'
        ]);
        $country6 = \App\Models\Country::factory()->create([
            'name' => 'Dominica',
            'code' => 'dm',
            'type' => 'External'
        ]);
        $country7 = \App\Models\Country::factory()->create([
            'name' => 'Grenada',
            'code' => 'gd',
            'type' => 'External'
        ]);
        $country8 = \App\Models\Country::factory()->create([
            'name' => 'Guyana',
            'code' => 'gy',
            'type' => 'External'
        ]);
        $country9 = \App\Models\Country::factory()->create([
            'name' => 'Jamaica',
            'code' => 'jm',
            'type' => 'External'
        ]);
        $country10 = \App\Models\Country::factory()->create([
            'name' => 'Montserrat',
            'code' => 'ms',
            'type' => 'External'
        ]);
        $country11 = \App\Models\Country::factory()->create([
            'name' => 'St. Lucia',
            'code' => 'lc',
            'type' => 'External'
        ]);
        $country12 = \App\Models\Country::factory()->create([
            'name' => 'St. Vincent and the Grenadines',
            'code' => 'vc',
            'type' => 'External'
        ]);
        $country13 = \App\Models\Country::factory()->create([
            'name' => 'St. Kitts and Nevis',
            'code' => 'kn',
            'type' => 'External'
        ]);
        $country14 = \App\Models\Country::factory()->create([
            'name' => 'Trinidad and Tobago',
            'code' => 'tt',
            'type' => 'External'
        ]);
        $country15 = \App\Models\Country::factory()->create([
            'name' => 'Communications',
            'code' => '1',
            'type' => 'Internal'
        ]);
        $country16 = \App\Models\Country::factory()->create([
            'name' => 'Headquarters',
            'code' => '0',
            'type' => 'Internal'
        ]);
        $country17 = \App\Models\Country::factory()->create([
            'name' => 'Library',
            'code' => '2',
            'type' => 'Internal'
        ]);
        $country18 = \App\Models\Country::factory()->create([
            'name' => 'Biometrics',
            'code' => '3',
            'type' => 'Internal'
        ]);
        $country19 = \App\Models\Country::factory()->create([
            'name' => 'Finance',
            'code' => '4',
            'type' => 'Internal'
        ]);
        $country20 = \App\Models\Country::factory()->create([
            'name' => 'CACSH',
            'code' => '5',
            'type' => 'Internal'
        ]);
        $country21 = \App\Models\Country::factory()->create([
            'name' => 'Human Resources',
            'code' => '6',
            'type' => 'Internal'
        ]);
        $country22 = \App\Models\Country::factory()->create([
            'name' => 'Resource Mobilization',
            'code' => '7',
            'type' => 'Internal'
        ]);
        $country23 = \App\Models\Country::factory()->create([
            'name' => 'Information Technology',
            'code' => '8',
            'type' => 'Internal'
        ]);
        $country24 = \App\Models\Country::factory()->create([
            'name' => 'Executive Directorate',
            'code' => '9',
            'type' => 'Internal'
        ]);
        $country25 = \App\Models\Country::factory()->create([
            'name' => 'Research and Development',
            'code' => '10',
            'type' => 'Internal'
        ]);




        $user_staff1 = \App\Models\User::factory()->create([
            'email' => 'admin@admin.com',
            'staff' => true,
            'country_id' => $country1->id
        ]);

        \App\Models\Category::factory()->create(['name' => 'Biometrics']);
        \App\Models\Category::factory()->create(['name' => 'Statistical Analysis']);
        \App\Models\Category::factory()->create(['name' => 'Market Research']);
        \App\Models\Category::factory()->create(['name' => 'Feasibilty Study for Agricultural Inputs']);
        \App\Models\Category::factory()->create(['name' => 'Value Chain Assessment']);
        \App\Models\Category::factory()->create(['name' => 'Other']);


        \App\Models\Status::factory()->create(['name' => 'Ongoing',    'color' => '0']);
        \App\Models\Status::factory()->create(['name' => 'Pending Review', 'color' => '1']);
        \App\Models\Status::factory()->create(['name' => 'Rejected',  'color' => '2']);
        \App\Models\Status::factory()->create(['name' => 'Pending Quotation',  'color' => '3']);
        \App\Models\Status::factory()->create(['name' => 'Pending Quotation Approval',  'color' => '4']);
        \App\Models\Status::factory()->create(['name' => 'Pending Contract',  'color' => '5']);
        \App\Models\Status::factory()->create(['name' => 'Pending Signature',  'color' => '6']);
        \App\Models\Status::factory()->create(['name' => 'Completed',  'color' => '9']);



        $staff1 = \App\Models\Staff::factory()->create(['user_id' => $user_staff1->id]);
        $staff1->categories()->attach(['1','2','3']);
        $staff1->countries()->attach(['1', '2']);


        $tickets_1 = \App\Models\Ticket::factory(1)->create([
            'country_id' => $country1->id,
            'category_id' => '1',
            'status_id' => '1',
            'author_id' => $user_staff1->id
        ]);

        foreach($tickets_1 as $ticket)
            $ticket->staff()->attach($staff1->id);



        $dept1 = \App\Models\Department::create([
            'name' => 'CARDI Antigua and Barbuda',
            'country_id' => 1
        ]);

        $dept2 = \App\Models\Department::create([
            'name' => 'CARDI Bahamas',
            'country_id' => 2
        ]);
        $dept3 = \App\Models\Department::create([
            'name' => 'CARDI Barbados',
            'country_id' => 3
        ]);
        $dept4 = \App\Models\Department::create([
            'name' => 'CARDI Belize',
            'country_id' => 4
        ]);
        $dept5 = \App\Models\Department::create([
            'name' => 'CARDI Cayman Islands',
            'country_id' => 5
        ]);
        $dept6 = \App\Models\Department::create([
            'name' => 'CARDI Dominica',
            'country_id' => 6
        ]);
        $dept7 = \App\Models\Department::create([
            'name' => 'CARDI Grenada',
            'country_id' => 7
        ]);
        $dept8 = \App\Models\Department::create([
            'name' => 'CARDI Guyana',
            'country_id' => 8
        ]);
        $dept9 = \App\Models\Department::create([
            'name' => 'CARDI Jamaica',
            'country_id' => 9
        ]);
        $dept10 = \App\Models\Department::create([
            'name' => 'CARDI Montserrat',
            'country_id' => 10
        ]);
        $dept11 = \App\Models\Department::create([
            'name' => 'CARDI St. Kitts and Nevis',
            'country_id' => 13
        ]);
        $dept12 = \App\Models\Department::create([
            'name' => 'CARDI St. Lucia',
            'country_id' => 11
        ]);
        $dept13 = \App\Models\Department::create([
            'name' => 'CARDI St. Vincent and the Grenadines',
            'country_id' => 12
        ]);
        $dept14 = \App\Models\Department::create([
            'name' => 'CARDI Trinidad and Tobago',
            'country_id' => 14
        ]);
        $dept22 = \App\Models\Department::create([
            'name' => 'Biometrics',
            'country_id' => 18
        ]);
        $dept15 = \App\Models\Department::create([
            'name' => 'Communications',
            'country_id' => 15
        ]);
        $dept16 = \App\Models\Department::create([
            'name' => 'Executive Directorate',
            'country_id' => 24
        ]);
        $dept17 = \App\Models\Department::create([
            'name' => 'Finance',
            'country_id' => 19
        ]);
        $dept18 = \App\Models\Department::create([
            'name' => 'Headquarters',
            'country_id' => 16
        ]);
        $dept19 = \App\Models\Department::create([
            'name' => 'Human Resources',
            'country_id' => 21
        ]);
        $dept23 = \App\Models\Department::create([
            'name' => 'Information Technology',
            'country_id' => 23
        ]);
        $dept20 = \App\Models\Department::create([
            'name' => 'Research and Development',
            'country_id' => 25
        ]);
        $dept21 = \App\Models\Department::create([
            'name' => 'Resource Mobilization',
            'country_id' => 22
        ]);


        $currency1 = \App\Models\Currency::create([
            'code' => 'BZD'
        ]);
        $currency2 = \App\Models\Currency::create([
            'code' => 'JMD'
        ]);
        $currency3 = \App\Models\Currency::create([
            'code' => 'XCD'
        ]);
        $currency4 = \App\Models\Currency::create([
            'code' => 'BSD'
        ]);
        $currency5 = \App\Models\Currency::create([
            'code' => 'BBD'
        ]);
        $currency6 = \App\Models\Currency::create([
            'code' => 'USD'
        ]);
        $currency7 = \App\Models\Currency::create([
            'code' => 'GYD'
        ]);
        $currency8 = \App\Models\Currency::create([
            'code' => 'KYD'
        ]);


    }
}
