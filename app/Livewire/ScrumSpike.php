<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'The Spike: Understanding Agile Research Stories'])]
class ScrumSpike extends FrontendComponent
{
    public function render()
    {
        return view('livewire.scrum-spike');
    }
}
