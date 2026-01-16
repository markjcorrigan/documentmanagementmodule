<?php

// app/Livewire/CrocodileHunter.php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'How to Catch a Crocodile - PMWay'])]
class CrocodileHunter extends FrontendComponent
{
    public function render()
    {
        return view('livewire.crocodile-hunter');
    }
}
