<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Working Software'])]
class WorkingSoftware extends FrontendComponent
{
    public $showAnswer = false;

    public function toggleAnswer()
    {
        $this->showAnswer = ! $this->showAnswer;
    }

    public function render()
    {
        return view('livewire.working-software');
    }
}
