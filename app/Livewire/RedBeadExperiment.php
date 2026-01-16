<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Red Bead Experiment - Deming\'s 14 Observations'])]
class RedBeadExperiment extends FrontendComponent
{
    public $showLessons = false;

    public $showDetailedExperiment = false;

    public $showObservations = false;

    public function render()
    {
        return view('livewire.red-bead-experiment');
    }
}
