<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Seven Rules of Scrum - PMWay'])]
class SevenRulesOfScrum extends FrontendComponent
{
    public function render()
    {
        return view('livewire.seven-rules-of-scrum');
    }
}
