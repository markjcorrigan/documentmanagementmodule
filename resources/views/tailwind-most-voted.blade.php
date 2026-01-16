<x-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-8 dark:text-white">
            🏆 Community's Top Voted Posts
        </h1>

        <livewire:most-voted-posts
            :limit="20"
            designTemplate="tailwind"
        />
    </div>
</x-layout>
