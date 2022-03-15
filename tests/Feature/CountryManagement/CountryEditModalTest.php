<?php

namespace Tests\Feature\CountryManagement;

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Country;
use App\Http\Livewire\Country\EditModal;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CountryEditModalTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function country_management_page_contains_edit_modal_livewire_component() {
        $this->actingAs($this->pretendToBeStaff());

        $this->get('/manage/countries')->assertSeeLivewire('country.edit-modal');
    }

    /** @test */
    public function country_edit_modal_emits_event() {
        $this->actingAs($this->pretendToBeStaff());

        $country = Country::factory()->create();

        Livewire::test(EditModal::class)
            ->set('id_', $country->id)
            ->set('name', 'Update country')
            ->call('emitEvent')
            ->assertEmitted('updateCountry');
    }
}
