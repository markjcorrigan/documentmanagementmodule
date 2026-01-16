<?php

namespace App\Livewire;

use App\Models\BlogPost;
use Livewire\Attributes\Isolate;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

#[Isolate]
class LWSearch extends FrontendComponent
{
    #[Url(as: 'q', except: '')]
    public $searchText = '';

    public $placeholder;

    #[On('search:clear-results')]
    public function clear()
    {
        $this->reset('searchText');
    }

    protected function queryString()
    {
        return [
            'searchText' => [
                'as' => 'q',
                'history' => true,
                'except' => '',
            ],
        ];
    }

    //    public function render()
    //    {
    //        return view('livewire.lwsearch', [
    //            'results' => BlogPost::where('post_title', 'LIKE', "%{$this->searchText}%")->get()
    //        ]);
    //    }

    public function render()
    {
        return view('livewire.lwsearch', [
            'results' => BlogPost::where('approved', 1) // Only show approved posts
                ->where(function ($query) {
                    $query->where('post_title', 'LIKE', "%{$this->searchText}%")
                        ->orWhere('post_description', 'LIKE', "%{$this->searchText}%")
                        ->orWhere('post_slug', 'LIKE', "%{$this->searchText}%")
                        ->orWhere('post_tags', 'LIKE', "%{$this->searchText}%");
                })->get(),
        ]);
    }
}
