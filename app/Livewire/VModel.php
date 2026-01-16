<?php

// app/Livewire/VModel.php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'V Model - PMWay'])]
class VModel extends FrontendComponent
{
    public function render()
    {
        return view('livewire.v-model');
    }
}
