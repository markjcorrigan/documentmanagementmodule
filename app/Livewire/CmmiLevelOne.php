<?php

// app/Livewire/CmmiLevelOne.php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'CMMi Level 1 Rules - PMWay'])]
class CmmiLevelOne extends FrontendComponent
{
    public function render()
    {
        return view('livewire.cmmi-level-one');
    }
}
