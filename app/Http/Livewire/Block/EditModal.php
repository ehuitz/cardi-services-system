<?php

namespace App\Http\Livewire\Block;

use App\Models\Block;
use Livewire\Component;
use App\Http\Livewire\Modal;

class EditModal extends Modal
{
    public $oid = '';
    public $location = '';
    public $country = '';
    public $area = '';
    public $description = '';


	protected $listeners = [
		'openEditModal' => 'show',
		'showToggled' => 'showToggled',
		'editBlockErrorBag' => 'editBlockErrorBag'
	];

	public function showToggled($params) {
		if ($params) {
			$this->oid = $params['id'];
			$block = Block::find($this->oid);
			$this->location = $block->location;
			$this->country = $block->country_id;
            $this->area = $block->area;
            $this->description = $block->description;

        }
	}

	public function emitEvent() {
		$this->emit('updateBlock', [
			'id' => $this->oid,
			'location' => $this->location,
            'country_id' => $this->country == '0' ? null : $this->country,
            'area' => $this->area,
            'description' => $this->description,
		]);
	}

	public function editBlockErrorBag($errorBag) {
		$this->setErrorBag($errorBag);
	}

    public function render()
    {
        return view('livewire.block.edit-modal');
    }
}
