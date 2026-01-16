<?php

// app/Livewire/EthosLogosPathos.php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Ethos, Logos, Pathos - PMWay'])]
class EthosLogosPathos extends FrontendComponent
{
    public function render()
    {
        return view('livewire.ethos-logos-pathos');
    }
}
