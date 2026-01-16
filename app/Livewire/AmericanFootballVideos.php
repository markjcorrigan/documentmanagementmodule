<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'American Football Videos - Super Bowl 2019 & 2020'])]
class AmericanFootballVideos extends FrontendComponent
{
    public function render()
    {
        return view('livewire.american-football-videos');
    }
}
