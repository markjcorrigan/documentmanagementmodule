<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Livewireprocs extends Component
{
    public $siteSettings;

    public $diagram;

    public $pinId;

    public $pinImage;

    public function mount(): void
    {
        //
    }

    public function loadSettings()
    {
        // Example vision & mission
        $this->siteSettings = [
            'vision' => [
                'benefits' => [
                    ['icon' => 'fas fa-anchor', 'title' => 'Seek perfection of character', 'desc' => 'Aim to develop a strong moral character...'],
                    ['icon' => 'ti ti-heart', 'title' => 'Be faithful', 'desc' => 'Cultivate loyalty and dedication...'],
                    ['icon' => 'ti ti-target', 'title' => 'Endeavor', 'desc' => 'Strive for continuous improvement...'],
                    ['icon' => 'fas fa-handshake', 'title' => 'Respect others', 'desc' => 'Show respect to instructors...'],
                    ['icon' => 'fas fa-balance-scale', 'title' => 'Self Control', 'desc' => 'Use your skills responsibly...'],
                ],
            ],
            'mission' => [
                'title' => 'At PMWay',
                'description' => 'My mission is simple: to provide you with the best project management solutions...',
                'signature' => asset('PMWayLanding/assets/images/signature.png'),
            ],
        ];

        // Set diagram and pin based on authentication
        if (auth()->check()) {
            $this->pinId = 'pinauthed';
            $this->pinImage = asset('/images/pinlarge.png');
            $this->diagram = asset('/images/dunningkrugercorruption.jpg');
        } else {
            $this->pinId = 'pin-1';
            $this->pinImage = asset('PMWayLanding/assets/images/pin.png');
            $this->diagram = asset('PMWayLanding/assets/images/diagram.png');
        }

        // Notify frontend AlpineJS that loading is finished
        $this->dispatch('loadSettingsFinished');
    }

    #[Layout('components.layouts.app')]
    public function render(): View
    {
        return view('livewire.livewireprocs');
    }
}
