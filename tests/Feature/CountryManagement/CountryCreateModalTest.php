<?php

namespace Tests\Feature\CountryManagement;

use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Country\CreateModal;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CountryCreateModalTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function country_management_page_contains_create_modal_livewire_component() {
        $this->actingAs($this->pretendToBeStaff());

        $this->get('/manage/countries')->assertSeeLivewire('country.create-modal');
    }

    /** @test */
    public function country_create_modal_emits_event() {
        $this->actingAs($this->pretendToBeStaff());

        Livewire::test(CreateModal::class)
            ->set('name', 'New country')
            ->call('emitEvent')
            ->assertEmitted('createCountry');
    }
}
