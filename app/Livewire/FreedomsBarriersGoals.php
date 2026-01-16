<?php

// app/Livewire/FreedomsBarriersGoals.php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Freedoms, Barriers and Goals'])]
class FreedomsBarriersGoals extends FrontendComponent
{
    public function render()
    {
        return view('livewire.freedoms-barriers-goals');
    }
}
