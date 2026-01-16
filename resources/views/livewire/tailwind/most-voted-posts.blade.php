<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
    <div class="bg-gradient-to-r from-blue-500 to-purple-600 px-6 py-4">
        <h4 class="text-white font-bold text-lg mb-0 flex items-center">
            <i class="fa fa-trophy text-yellow-300 mr-2"></i> Most Voted Posts
        </h4>
    </div>

    <div class="divide-y divide-gray-200 dark:divide-gray-700">
        @if($mostVoted->isEmpty())
            <div class="p-6 text-center text-gray-500 dark:text-gray-400">
                <i class="fa fa-inbox fa-2x mb-2"></i>
                <p class="mb-0">No voted posts yet. Be the first to vote!</p>
            </div>
        @else
            @foreach($mostVoted as $index => $item)
                <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full text-sm font-bold
                                {{ $index === 0 ? 'bg-yellow-400 text-gray-900' : ($index === 1 ? 'bg-gray-400 text-white' : ($index === 2 ? 'bg-orange-400 text-white' : 'bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300')) }}">
                                #{{ $index + 1 }}
                            </span>
                        </div>
                        <div class="flex-grow min-w-0">
                            <h6 class="font-semibold mb-1 text-gray-900 dark:text-white">
                                <a href="{{ route('blog.show', $item['post']->post_slug) }}"
                                   class="hover:text-blue-600 dark:hover:text-blue-400 no-underline">
                                    {{ $item['post']->post_title }}
                                </a>
                            </h6>
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400 space-x-3">
                                <span class="flex items-center">
                                    <i class="fa fa-arrow-up text-green-600 dark:text-green-500 mr-1"></i>
                                    <strong>{{ $item['vote_sum'] }}</strong> points
                                </span>
                                <span class="text-gray-400">•</span>
                                <span class="flex items-center">
                                    <i class="fa fa-users mr-1"></i>
                                    {{ $item['voter_count'] }} voters
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
