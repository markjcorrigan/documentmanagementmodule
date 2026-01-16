<?php

// app/Livewire/PmbokProcessExample.php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'PMBOK 6 Process 4.1 Example'])]
class PmbokProcessExample extends FrontendComponent
{
    public $currentSlide = 0;

    public $totalSlides = 3;

    public function goToSlide($slideIndex)
    {
        if ($slideIndex >= 0 && $slideIndex < $this->totalSlides) {
            $this->currentSlide = $slideIndex;
        }
    }

    public function nextSlide()
    {
        $this->currentSlide = $this->currentSlide === $this->totalSlides - 1 ? 0 : $this->currentSlide + 1;
    }

    public function prevSlide()
    {
        $this->currentSlide = $this->currentSlide === 0 ? $this->totalSlides - 1 : $this->currentSlide - 1;
    }

    public function render()
    {
        return view('livewire.pmbok-process-example');
    }
}
