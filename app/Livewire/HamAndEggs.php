<?php

// app/Livewire/HamAndEggs.php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'SCRUM Pigs and Chickens - PMWay'])]
class HamAndEggs extends FrontendComponent
{
    public function render()
    {
        return view('livewire.ham-and-eggs');
    }
}
