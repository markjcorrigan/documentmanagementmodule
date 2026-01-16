<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class TWCSSTraining extends Component
{
    public function mount(): void
    {
        //
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        $html = file_get_contents(resource_path('csstraining/index.html'));

        return view('livewire.csstraining', ['html' => $html]);
    }
}
