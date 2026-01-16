<?php

namespace App\Livewire;

use App\Models\BlogPost;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class MostVotedPosts extends Component
{
    public int $limit = 10;

    public string $designTemplate = 'tailwind';

    public function mount(int $limit = 10): void
    {
        $this->limit = $limit;
    }

    public function render(): View
    {
        $mostVoted = $this->getMostVotedPosts();

        return view('livewire.'.$this->designTemplate.'.most-voted-posts', [
            'mostVoted' => $mostVoted,
        ]);
    }

    private function getMostVotedPosts(): Collection
    {
        return BlogPost::query()
            ->where('approved', 1)
            ->withSum('votes', 'vote')
            ->withCount('votes')
            ->having('votes_sum_vote', '>', 0)
            ->orderByDesc('votes_sum_vote')
            ->orderByDesc('votes_count')
            ->limit($this->limit)
            ->get()
            ->map(function ($post) {
                return [
                    'post' => $post,
                    'vote_sum' => $post->votes_sum_vote ?? 0,
                    'voter_count' => $post->votes_count ?? 0,
                ];
            });
    }
}
