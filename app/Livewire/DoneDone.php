<?php

// app/Livewire/DoneDone.php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Done Done - It ain\'t over till it\'s over - PMWay'])]
class DoneDone extends FrontendComponent
{
    public function render()
    {
        return view('livewire.done-done');
    }
}
