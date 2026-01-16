<?php

namespace App\Livewire;

use App\Models\SearchTerm;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app.frontend', ['title' => 'Search PMWay'])]
class PMWaySearch extends Component
{
    use WithPagination;

    public $searchTerm = '';

    protected $paginationTheme = 'tailwind';

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }

    public function updateChecked($id)
    {
        $searchTerm = SearchTerm::find($id);
        $searchTerm->checked = ! $searchTerm->checked;
        $searchTerm->save();
    }

    public function render(): View
    {
        $user = auth()->user();

        if ($user->can('pmwaysearch')) {
            // Super admin: show all rows if no search term
            if (! empty($this->searchTerm)) {
                $results = SearchTerm::search($this->searchTerm)->paginate(10);
            } else {
                $results = SearchTerm::query()->paginate(10);
            }
        } else {
            // Normal user: only show results if search term is present
            if (! empty($this->searchTerm)) {
                $results = SearchTerm::search($this->searchTerm)->paginate(10);
            } else {
                $results = new LengthAwarePaginator([], 0, 10, 1, [
                    'path' => request()->url(),
                    'query' => request()->query(),
                ]);
            }
        }

        return view('livewire.pmway-search', compact('results'));
    }
} // <-- Make sure this final brace closes the class

//
// namespace App\Livewire;
//
// use App\Models\SearchTerm;
// use Illuminate\Contracts\View\View;
// use Livewire\Attributes\Layout;
// use Livewire\Component;
//
// #[Layout('components.layouts.app')]
// class PMWaySearch extends Component
// {
//    public $searchTerm = '';
//
//    public function render(): View
//    {
//        $results = SearchTerm::search($this->searchTerm)->paginate(10);
//
//
//        return view('livewire.pmway-search', ['results' => $results]);
//    }
// }
