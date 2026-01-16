<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'ATemplate'])]
class ATemplate extends FrontendComponent
{
    public function mount(): void
    {
        //
    }

    public function render(): View
    {
        return view('livewire.a-template');
    }
}
