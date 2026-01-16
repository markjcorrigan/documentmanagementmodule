<?php

namespace App\Livewire;

use App\Models\BlogPost;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class BlogPostVotes extends Component
{
    public int $sumVotes = 0;

    public BlogPost $blogPost;

    public ?int $userVote = null;

    public string $designTemplate = 'tailwind';

    public function mount(BlogPost $blogPost): void
    {
        $this->blogPost = $blogPost;
        $this->calculateVotes();
    }

    public function render(): View
    {
        return view('livewire.'.$this->designTemplate.'.blog-post-votes');
    }

    public function vote(int $voteValue): void
    {
        // Must be logged in to vote
        if (! auth()->check()) {
            $this->dispatch('show-login-modal');

            return;
        }

        // Validate vote value
        if (! in_array($voteValue, [-1, 1])) {
            return;
        }

        $userId = auth()->id();

        // Check if user already voted
        $existingVote = $this->blogPost->votes()
            ->where('user_id', $userId)
            ->first();

        if ($existingVote) {
            // If clicking the same vote button, remove the vote (unvote)
            if ($existingVote->vote === $voteValue) {
                $existingVote->delete();
                $this->userVote = null;
                $this->calculateVotes();

                return;
            }

            // If clicking opposite button, update the vote
            $existingVote->update(['vote' => $voteValue]);
            $this->userVote = $voteValue;
            $this->calculateVotes();

            return;
        }

        // Create new vote
        $this->blogPost->votes()->create([
            'user_id' => $userId,
            'vote' => $voteValue,
        ]);

        $this->userVote = $voteValue;
        $this->calculateVotes();
    }

    private function calculateVotes(): void
    {
        // Refresh the relationship to get latest votes
        $this->blogPost->load('votes');

        // Calculate sum of all votes
        $this->sumVotes = $this->blogPost->votes->sum('vote');

        // Get current user's vote if logged in
        if (auth()->check()) {
            $userVoteRecord = $this->blogPost->votes()
                ->where('user_id', auth()->id())
                ->first();

            $this->userVote = $userVoteRecord?->vote;
        }
    }
}
