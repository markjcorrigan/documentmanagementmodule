<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'CMMi'])]
class CMMiLanding extends FrontendComponent
{
    public $showLevel1 = false;

    public function render()
    {
        return view('livewire.cmmi-landing');
    }

    public function toggleLevel1()
    {
        $this->showLevel1 = ! $this->showLevel1;
    }
}
