<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Capability Maturity Model'])]
class CapabilityMaturityModel extends FrontendComponent
{
    public function render()
    {
        return view('livewire.capability-maturity-model');
    }
}
