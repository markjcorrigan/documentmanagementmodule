<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PageRefresh extends Component
{
    public function refreshPage()
    {
        $this->dispatch('refresh-page');
    }

    public function mount(): void
    {
        //
    }

    #[Layout('components.layouts.app')]
    public function render(): View
    {
        return view('livewire.page-refresh');
    }
}
