<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Game Stats'])]
class GameStatsNew extends FrontendComponent
{
    public function mount(): void
    {
        //
    }

    public function render(): View
    {
        return view('livewire.game-stats-new');
    }
}
