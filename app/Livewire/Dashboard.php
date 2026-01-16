<?php

namespace App\Livewire;

// LW Original Dashboard Controller from Tall Starter

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    public function mount()
    {
        if (Auth::check()) {
            return redirect()->to('/profile/'.Auth::user()->name);
        } else {
            return redirect()->to('/login');
        }
    }

    #[Layout('components.layouts.app')]
    public function render(): View
    {
        return view('livewire.dashboard');
    }
}

/* <?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\BlogPost;

class Dashboard extends Component
{
    use WithPagination;

    #[Layout('components.layouts.app')]
    public function render()
    {
        $sharedData = [
            'avatar' => Auth::user()->avatar,
            'name' => Auth::user()->name,
            'currentlyFollowing' => false,
            'postCount' => BlogPost::where('user_id', Auth::id())->count(),
            'followerCount' => 0, // You'll need to implement logic to get the follower count
            'followingCount' => 0, // You'll need to implement logic to get the following count
        ];

        return view('livewire.dashboard', [
            'posts' => BlogPost::where('approved', 1)
                ->latest()
                ->paginate(10),
            'sharedData' => $sharedData,
        ]);
    }


}
*/
