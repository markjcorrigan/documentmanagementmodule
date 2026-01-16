<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Product Increment'])]
class ProductIncrement extends FrontendComponent
{
    public $showProductOwner = false;

    public $showGradient = false;

    public function toggleProductOwner()
    {
        $this->showProductOwner = ! $this->showProductOwner;
    }

    public function toggleGradient()
    {
        $this->showGradient = ! $this->showGradient;
    }

    public function render()
    {
        return view('livewire.product-increment');
    }
}
