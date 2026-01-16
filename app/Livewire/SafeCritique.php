<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'SAFe is unsafe'])]
class SafeCritique extends FrontendComponent
{
    public function mount(): void
    {
        //
    }

    #[Layout('components.layouts.app')]
    public function render(): View
    {
        return view('livewire.safe-critique');
    }
}
