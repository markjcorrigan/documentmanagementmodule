{{-- resources/views/livewire/logs/partials/share-modal.blade.php --}}
<div x-data="{ show: @entangle('showShareModal') }" 
     x-show="show"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-[60] overflow-y-auto"
     aria-labelledby="share-modal-title"
     role="dialog"
     aria-modal="true"
     style="display: none;">
    
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
    
    <!-- Modal Container -->
    <div class="flex min-h-screen items-center justify-center p-4">
        <!-- Modal Panel -->
        <div @click.away="$wire.closeShareModal()"
             x-show="show"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl w-full max-w-md">
            
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <i class="fa-solid fa-share mr-2 text-gray-600 dark:text-gray-400 text-lg"></i>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Share Log
                    </h3>
                </div>
                <button wire:click="closeShareModal"
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 rounded-lg p-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <form wire:submit="shareLog">
                <div class="p-6 max-h-[60vh] overflow-y-auto">
                    <!-- User Selection -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Share with User <span class="text-red-500">*</span>
                        </label>
                        <select wire:model="shareUserId"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('shareUserId') border-red-500 @enderror"
                                required>
                            <option value="">Select a user...</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                        @error('shareUserId')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Permission Level -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Permission Level</label>
                        <div class="space-y-3">
                            <label class="flex items-start p-3 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer">
                                <input class="mt-1 mr-3" type="radio" wire:model="sharePermission" value="view" id="permView">
                                <div>
                                    <div class="flex items-center font-medium text-gray-900 dark:text-white">
                                        <i class="fa-solid fa-eye mr-2 text-gray-600 dark:text-gray-400"></i>
                                        View Only
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">User can only view the log</p>
                                </div>
                            </label>
                            <label class="flex items-start p-3 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer">
                                <input class="mt-1 mr-3" type="radio" wire:model="sharePermission" value="edit" id="permEdit">
                                <div>
                                    <div class="flex items-center font-medium text-gray-900 dark:text-white">
                                        <i class="fa-solid fa-pencil mr-2 text-gray-600 dark:text-gray-400"></i>Can Edit
</div>
<p class="mt-1 text-sm text-gray-500 dark:text-gray-400">User can view and edit the log</p>
</div>
</label>
</div>
</div><!-- Can Reshare Option -->
                <div class="mb-6">
                    <label class="flex items-start p-3 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer">
                        <input class="mt-1 mr-3" type="checkbox" wire:model="shareCanReshare" id="canReshare">
                        <div>
                            <div class="flex items-center font-medium text-gray-900 dark:text-white">
                                <i class="fa-solid fa-arrows-rotate mr-2 text-gray-600 dark:text-gray-400"></i>
                                Allow user to reshare this log
                            </div>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">User can share this log with others</p>
                        </div>
                    </label>
                </div>

                <!-- Expiration Date -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fa-solid fa-calendar mr-1"></i>Expiration Date (Optional)
                    </label>
                    <input type="datetime-local"
                           wire:model="shareExpiresAt"
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                           min="{{ now()->format('Y-m-d\TH:i') }}">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Leave empty for permanent access</p>
                </div>

                <!-- Existing Shares -->
                @if($shareLogId)
                    @php
                        $log = \App\Models\Log::with('activeShares.sharedWith')->find($shareLogId);
                    @endphp
                    @if($log && $log->activeShares->count() > 0)
                        <div class="pt-6 mt-6 border-t border-gray-200 dark:border-gray-700">
                            <h6 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Currently Shared With:</h6>
                            <div class="space-y-2">
                                @foreach($log->activeShares as $share)
                                    <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <div>
                                            <div class="font-medium text-gray-900 dark:text-white">{{ $share->sharedWith->name }}</div>
                                            <div class="flex items-center mt-1 space-x-2">
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{ $share->permission === 'edit' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : 'bg-gray-100 text-gray-800 dark:bg-gray-600 dark:text-gray-300' }}">
                                                    {{ ucfirst($share->permission) }}
                                                </span>
                                                @if($share->expires_at)
                                                    <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                                        <i class="fa-solid fa-calendar mr-1"></i>
                                                        Expires: {{ $share->expires_at->format('M d, Y') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="button"
                                                wire:click="removeShare({{ $share->id }})"
                                                wire:confirm="Remove this share?"
                                                class="p-2 text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 hover:bg-red-50 dark:hover:bg-red-900/30 rounded-lg transition-colors">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endif
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end space-x-3 p-6 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                <button type="button"
                        wire:click="closeShareModal"
                        class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    <i class="fa-solid fa-xmark mr-1"></i>Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                    <i class="fa-solid fa-share mr-1"></i>Share Log
                </button>
            </div>
        </form>
    </div>
</div>
