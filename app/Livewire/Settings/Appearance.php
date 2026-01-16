<?php

namespace App\Livewire\Settings;

use App\Livewire\FrontendComponent;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Settings: Appearance'])]
class Appearance extends FrontendComponent
{
    //    #[Layout('components.layouts.app.frontend')]

    public function render(): View
    {
        return view('livewire.settings.appearance');
    }
}
