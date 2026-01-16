<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => '3 P\'s & 7 F\'s - Development that Pays'])]
class SevenFs extends FrontendComponent
{
    public function render()
    {
        return view('livewire.seven-fs');
    }
}
