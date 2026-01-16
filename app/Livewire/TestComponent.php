<?php

namespace App\Livewire;

use Livewire\Component;

class TestComponent extends Component
{
    public $message;

    public function mount()
    {
        $this->message = 'Hello, World!';
    }

    public function render()
    {
        return view('livewire.test-component');
    }

    public function updateMessage()
    {
        $this->message = 'Updated message!';
    }
}
