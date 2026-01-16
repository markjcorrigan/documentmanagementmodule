<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Header -->
    <div class="mb-8 bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center">
                    <i class="fa-solid fa-folder-open text-blue-600 mr-3"></i>
                    My PMBOK Projects
                </h1>
                <p class="mt-2 text-gray-600 dark:text-gray-400">
                    Total: {{ $projects->count() }} projects
                </p>
            </div>
            <button wire:click="openCreateModal"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold shadow-lg">
                <i class="fa-solid fa-plus mr-2"></i>
                Create New Project
            </button>
        </div>
    </div>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-800 px-6 py-4 rounded-lg">
            <span class="font-semibold">{{ session('message') }}</span>
        </div>
    @endif

    <!-- Projects List -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        @if($projects->count() > 0)
            <div class="space-y-4">
                @foreach($projects as $project)
                    <div class="border-2 border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $project->name }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $project->description }}</p>
                                <p class="text-sm text-gray-500 mt-2">
                                    Notes: {{ $project->pmbok_notes_count }} / 49 processes
                                </p>
                            </div>
                            <div class="flex gap-2">
                                <button wire:click="selectProject({{ $project->id }})"
                                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold">
                                    Open
                                </button>
                                <button wire:click="openEditModal({{ $project->id }})"
                                        class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-lg">
                                    Edit
                                </button>
                                <button wire:click="deleteProject({{ $project->id }})"
                                        wire:confirm="Delete this project?"
                                        class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <i class="fa-solid fa-folder-open text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No projects yet</h3>
                <p class="text-gray-500 mb-4">Create your first project to get started</p>
                <button wire:click="openCreateModal"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold">
                    <i class="fa-solid fa-plus mr-2"></i>
                    Create Your First Project
                </button>
            </div>
        @endif
    </div>

    <!-- Create/Edit Modal -->
    <!-- Create/Edit Modal -->
    @if($showCreateModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" wire:click="closeModal">
            <div class="flex items-center justify-center min-h-screen px-4">
                <!-- Backdrop -->
                <div class="fixed inset-0 bg-gray-900 opacity-75"></div>

                <!-- Modal Content -->
                <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-lg w-full p-6"
                     wire:click.stop>

                    <!-- Close X button -->
                    <button wire:click="closeModal"
                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <i class="fa-solid fa-times text-2xl"></i>
                    </button>

                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                        {{ $editingProject ? 'Edit Project' : 'Create New Project' }}
                    </h3>

                    <div class="space-y-4">
                        <!-- Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Project Name *
                            </label>
                            <input type="text" wire:model="name"
                                   class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Description
                            </label>
                            <textarea wire:model="description" rows="3"
                                      class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"></textarea>
                            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Dates -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    Start Date
                                </label>
                                <input type="date" wire:model="start_date"
                                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                                @error('start_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    End Date
                                </label>
                                <input type="date" wire:model="end_date"
                                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                                @error('end_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Status *
                            </label>
                            <select wire:model="status"
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                                <option value="active">Active</option>
                                <option value="on-hold">On Hold</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                            @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="mt-6 flex gap-2 justify-end">
                        <button wire:click="closeModal"
                                type="button"
                                class="px-6 py-2 bg-gray-300 hover:bg-gray-400 dark:bg-gray-600 dark:hover:bg-gray-500 text-gray-700 dark:text-gray-200 rounded-lg font-semibold">
                            Cancel
                        </button>
                        <button wire:click="saveProject"
                                type="button"
                                class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold">
                            {{ $editingProject ? 'Update' : 'Create' }} Project
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
