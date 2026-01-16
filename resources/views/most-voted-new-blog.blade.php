<x-layout>
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-4">
                <i class="fa fa-trophy text-warning"></i> Community's Favorite Posts
            </h1>
            <p class="lead text-muted">Posts ranked by community votes</p>
            <hr style="max-width: 200px; margin: 20px auto;">
        </div>

        <livewire:most-voted-posts
            :limit="50"
            designTemplate="bootstrap"
        />

        <div class="text-center mt-5">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                <i class="fa fa-arrow-left"></i> Go Back
            </a>
        </div>
    </div>
</x-layout>
