<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Snowbird Playlist'])]
class Snowbird extends FrontendComponent
{
    public $videos = [
        [
            'id' => 'snowbird',
            'title' => 'Alistair Cockburn recollections of Snowbird and the last 3 decades',
            'video_path' => 'assets/ablevids/snowbird/snowbird.mp4',
            'poster_path' => 'images/agilemembers.jpg',
            'width' => 480,
            'height' => 360,
            'alt' => 'Agile Members',
        ],
        [
            'id' => 'heart',
            'title' => 'Alistair Cockburn heart of agile',
            'video_path' => 'assets/ablevids/snowbird/heartofagile.mp4',
            'poster_path' => 'images/heartofagile.png',
            'width' => 480,
            'height' => 360,
            'alt' => 'Heart of Agile',
        ],
    ];

    public function render()
    {
        return view('livewire.snowbird');
    }
}
