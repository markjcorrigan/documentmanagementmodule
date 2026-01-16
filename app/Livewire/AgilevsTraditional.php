<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Traditional vs Agile'])]
class AgilevsTraditional extends FrontendComponent
{
    public function render()
    {
        return view('livewire.agile-traditional');
    }
}
