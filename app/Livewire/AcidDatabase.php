<?php

// app/Livewire/AcidDatabase.php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'ACID Database Properties - PMWay'])]
class AcidDatabase extends FrontendComponent
{
    public function render()
    {
        return view('livewire.acid-database');
    }
}
