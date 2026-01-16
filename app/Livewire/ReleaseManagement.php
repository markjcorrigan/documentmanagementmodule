<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Release Management'])]
class ReleaseManagement extends FrontendComponent
{
    public function render()
    {
        return view('livewire.release-management');
    }
}
