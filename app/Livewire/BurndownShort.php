<?php

// app/Livewire/BurndownShort.php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Sprint Burndown - PMWay'])]
class BurndownShort extends FrontendComponent
{
    public function render()
    {
        return view('livewire.burndown-short');
    }
}
