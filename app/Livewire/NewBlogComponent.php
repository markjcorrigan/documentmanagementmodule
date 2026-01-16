<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

/**
 * Base component for all new blog pages
 * Automatically applies the Tailwind frontend layout
 */
#[Layout('components.layouts.app.frontend')]
class NewBlogComponent extends Component
{
    /**
     * All blog components inherit the frontend layout
     * Individual components can override the title:
     *
     * #[Layout('components.layouts.app.frontend', ['title' => 'Your Page Title'])]
     */
}
