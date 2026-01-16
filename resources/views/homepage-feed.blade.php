<x-layout>
    @php

    $approvedCount = \App\Models\BlogPost::approvedCount();

    @endphp

    <div class="col-lg-10 offset-lg-1 py-3 py-md-5">
        <h4 class="display-4 lead text-muted">Remember Writing?</h4>
        <div wire:ignore>
            <p class="lead text-muted">Are you sick of short tweets and impersonal &ldquo;shared&rdquo; posts that
                are reminiscent of the late 90&rsquo;s email forwards? We believe getting back to actually writing is
                the key to enjoying the internet again. Our users have authored {{ $approvedCount }} posts.</p>
            <p class="lead text-muted">Your feed below displays the latest posts from the people you follow. If you
                don&rsquo;t have any friends to follow that&rsquo;s okay; you can use the &ldquo;Search&rdquo;
                feature in the top menu bar to find content written by people with similar interests and then follow
                them.
            </p>
        </div>


    </div>

    <div class="container py-md-5 container">
        <h2><img class="avatar-small" src="{{ auth()->user()->avatar }}" />{{ auth()->user()->name }}</h2>
        <p>Below is your feed
            of posts you are following:</p>
        @unless($posts->isEmpty())
        <livewire:post-following-list />
        @else
        <div class="text-center">
            <h2>Hello <strong>{{ auth()->user()->name }}</strong>, your feed is empty.</h2>
        </div>
        @endunless



    </div>
</x-layout>