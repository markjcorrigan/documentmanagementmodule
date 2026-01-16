<?php

// app/Livewire/PersonalKanban.php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Personal Kanban - Kanban Made Simple'])]
class PersonalKanban extends FrontendComponent
{
    public function render()
    {
        return view('livewire.personal-kanban');
    }
}
