<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app.frontend')]
class FrontendComponent extends Component
{
    // Base component for all frontend pages
    // Child components can override the Layout attribute to set their own title
}
