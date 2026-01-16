<?php

// app/Livewire/AgileMethodsCarousel.php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Agile Methods - High Level Overview'])]
class AgileMethodsCarousel extends FrontendComponent
{
    public $currentSlide = 0;

    public $totalSlides = 13;

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

    public function previousSlide()
    {
        $this->currentSlide = $this->currentSlide === 0 ? $this->totalSlides - 1 : $this->currentSlide - 1;
    }

    public function mount()
    {
        // Check for slide parameter in URL
        if (request()->has('slide')) {
            $slide = request()->get('slide');
            if (is_numeric($slide) && $slide >= 1 && $slide <= $this->totalSlides) {
                $this->currentSlide = $slide - 1;
            }
        }
    }

    public function render()
    {
        return view('livewire.agile-methods-carousel');
    }
}
