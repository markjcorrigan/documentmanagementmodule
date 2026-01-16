<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Scrum RCA'])]
class Scrumfix extends FrontendComponent
{
    public function mount(): void
    {
        //
    }

    //    #[Layout('components.layouts.app')]
    public function render(): View
    {
        return view('livewire.scrumfix');
    }
}
