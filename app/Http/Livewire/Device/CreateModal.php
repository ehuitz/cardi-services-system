<?php

namespace App\Http\Livewire\Device;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CreateModal extends Modal
{
    public $assetTag = '';
    public $deviceModel = '';
    public $country = '';
    public $serialNumber = '';
    public $macAddress = '';

    protected $listeners = [
        'createDeviceErrorBag' => 'createDeviceErrorBag',
        'showToggled' => 'resetValues',
        'openCreateModal' => 'show'
    ];

    public function emitEvent() {
        $this->emit('createDevice', [
            'asset_tag' => $this->assetTag,
            'model_id' => $this->deviceModel,
            'country_id' => $this->country,
            'serial_number' => $this->serialNumber,
            'mac_address'=> $this->macAddress
        ]);
    }

    public function createDeviceErrorBag($errorBag) {
        $this->setErrorBag($errorBag);
    }

    public function resetValues() {
        $this->assetTag = '';
        $this->deviceModel = '';
        $this->country = '';
        $this->serialNumber = '';
        $this->macAddress = '';
    }

    public function render()
    {
        return view('livewire.device.create-modal');
    }
}
