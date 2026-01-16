<?php

namespace App\Livewire\Pmway\Itil;

use App\Livewire\FrontendComponent;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'ITIL 4 Practices'])]
class ItilFourPracticesLive extends FrontendComponent
{
    public $showCollapse = false;

    public $showCollapseElephant = false;

    public function mount(): void
    {
        //
    }

    public function toggleCollapse()
    {
        $this->showCollapse = ! $this->showCollapse;
    }

    public function toggleCollapseElephant()
    {
        $this->showCollapseElephant = ! $this->showCollapseElephant;
    }

    public function render(): View
    {
        return view('livewire.pmway.itil.itilfourpracticeslive');
    }
}
