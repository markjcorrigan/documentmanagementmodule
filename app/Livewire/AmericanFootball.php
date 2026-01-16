<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'American Football - CM Level 2+ in Action'])]
class AmericanFootball extends FrontendComponent
{
    public function render()
    {
        return view('livewire.american-football');
    }
}
