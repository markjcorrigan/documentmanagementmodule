<?php

namespace App\Livewire;

use App\Models\BlogPost;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Articles')]
class ArticleIndex extends Component
{
    public function render()
    {
        return view('livewire.article-index', [
            'articles' => BlogPost::all(),
        ]);
    }
}
