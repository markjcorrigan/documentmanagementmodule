<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'KanBan Coffee - Process Demonstration'])]
class KanbanCoffee extends FrontendComponent
{
    public function render()
    {
        return view('livewire.kanban-coffee');
    }
}
