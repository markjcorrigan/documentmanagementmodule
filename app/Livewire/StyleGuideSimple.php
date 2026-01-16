<?php

// app/Livewire/StyleGuide.php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Style Guide'])]
class StyleGuideSimple extends FrontendComponent
{
    public function render()
    {
        return view('livewire.style-guide-simple');
    }
}
