<?php

// app/Livewire/ScrumDashboards.php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Scrum Dashboards'])]
class ScrumDashboards extends FrontendComponent
{
    public $showTruth = false;

    public $showScrumGovernance = false;

    public $showScrumValueEssence = false;

    public $showShootHorses = false;

    public $showOutOfSaddle = false;

    public $showScrumFlow = false;

    public function render()
    {
        return view('livewire.scrum-dashboards');
    }
}
