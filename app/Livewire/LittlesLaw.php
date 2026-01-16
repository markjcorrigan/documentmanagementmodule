<?php

// app/Livewire/LittlesLaw.php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => "Little's Law"])]
class LittlesLaw extends FrontendComponent
{
    public function render()
    {
        return view('livewire.littles-law');
    }
}
