<?php

// app/Livewire/SpeedboatTool.php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Speedboat (Sailboat) Tool'])]
class SpeedboatTool extends FrontendComponent
{
    public function render()
    {
        return view('livewire.speedboat-tool');
    }
}
