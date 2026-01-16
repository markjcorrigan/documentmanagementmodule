<?php

// app/Livewire/ScrumStudyVids.php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Scrum Study Videos'])]
class ScrumStudyVids extends FrontendComponent
{
    public function render()
    {
        return view('livewire.scrum-study-vids');
    }
}
