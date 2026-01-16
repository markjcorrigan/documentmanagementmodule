<?php

namespace App\Livewire\Pmway;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class About extends Component
{
    public function mount(): void
    {
        //
    }

    #[Layout('components.layouts.app.frontend', ['title' => 'About'])]
    public function render(): View
    {
        return view('livewire.pmway.about');
    }
}
