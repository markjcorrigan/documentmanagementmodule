<div wire:poll.5s>
    <!-- Incoming Chat Requests -->
    @if ($pendingRequests->count() > 0)
        <div class="mb-6 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Incoming Chat Requests</h3>
            <div class="space-y-3">
                @foreach ($pendingRequests as $request)
                    <div class="flex items-center justify-between p-4 bg-blue-50 dark:bg-blue-900/30 rounded-lg border border-blue-200 dark:border-blue-800">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold">
                                {{ substr($request->sender->name, 0, 1) }}
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">{{ $request->sender->name }}</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">wants to chat with you</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button
                                wire:click="acceptRequest({{ $request->id }})"
                                class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors"
                            >
                                Accept
                            </button>
                            <button
                                wire:click="rejectRequest({{ $request->id }})"
                                class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors"
                            >
                                Reject
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Sent Chat Requests -->
    @if ($sentRequests->count() > 0)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Pending Requests Sent</h3>
            <div class="space-y-3">
                @foreach ($sentRequests as $request)
                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full bg-gray-500 flex items-center justify-center text-white font-semibold">
                                {{ substr($request->receiver->name, 0, 1) }}
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">{{ $request->receiver->name }}</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Waiting for response...</p>
                            </div>
                        </div>
                        <button
                            wire:click="cancelRequest({{ $request->id }})"
                            class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors"
                        >
                            Cancel
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
