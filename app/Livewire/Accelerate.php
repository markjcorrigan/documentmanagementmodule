<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Accelerate extends Component
{
    public function mount(): void
    {
        //
    }

    #[Layout('components.layouts.app.frontend', ['title' => 'Accelerate'])]
    public function render(): View
    {
        return view('livewire.accelerate');
    }
}
