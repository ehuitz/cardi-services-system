<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Country\Management;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CountryManagementTest extends TestCase
{
    /** @test */
    public function non_staff_user_cannot_access_country_management_page() {
        $this->actingAs($this->createUser());

        $this->get('/manage/countries')->assertStatus(404);
    }

    /** @test */
    public function staff_user_can_access_country_management_page() {
        $this->actingAs($this->pretendToBeStaff());

        $this->get('/manage/countries')->assertStatus(200);
    }

    /** @test */
    public function country_management_page_contains_livewire_component() {
        $this->actingAs($this->pretendToBeStaff());

        $this->get('/manage/countries')->assertSeeLivewire('country.management');
    }

    /** @test */
    public function can_create_countries() {
        $this->actingAs($this->pretendToBeStaff());

        Livewire::test(Management::class)
            ->call('create', [
                'name' => 'Test Country'
            ])
            ->assertEmitted('flashSuccess');

        $this->assertDatabaseHas('countries', [
            'name' => 'Test Country'
        ]);
    }

    /** @test */
    public function can_edit_countries() {
        $this->actingAs($this->pretendToBeStaff());

        $country = \App\Models\Country::factory()->create();

        Livewire::test(Management::class)
            ->call('update', [
                'id' => $country->id,
                'name' => 'Updated country',
            ])
            ->assertEmitted('flashSuccess');

        $this->assertDatabaseHas('countries', [
            'name' => 'Updated country'
        ]);
    }

    /** @test */
    public function can_delete_countries() {
        $this->actingAs($this->pretendToBeStaff());

        $country = \App\Models\Country::factory()->create();

        Livewire::test(Management::class)
            ->call('delete', $country->id)
            ->assertEmitted('flashSuccess');

        $this->assertDeleted($country);
    }
}
