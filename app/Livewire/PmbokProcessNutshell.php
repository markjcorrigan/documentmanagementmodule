<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'PMBOK6 Nutshell'])]
class PmbokProcessNutshell extends FrontendComponent
{
    public function mount(): void
    {
        //
    }

    #[Layout('components.layouts.app')]
    public function render(): View
    {
        return view('livewire.pmbok-process-nutshell');
    }
}
