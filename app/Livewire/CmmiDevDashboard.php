<?php

// app/Livewire/CmmiDevDash.php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'CMMi Dev Dashboard - PMWay'])]
class CmmiDevDashboard extends FrontendComponent
{
    public function render()
    {
        return view('livewire.cmmi-dev-dashboard');
    }
}
