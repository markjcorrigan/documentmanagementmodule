<div class="flex flex-col w-[500px] mx-auto py-16 p-4 bg-gray-100 rounded-lg shadow-md">
    <div class="flex gap-4 justify-between">
        <input type="text" wire:model="todoText" wire:keydown.enter="addTodo" placeholder="Type and hit enter" class="flex-1 p-2 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" >
        <button class="py-2 px-4 bg-indigo-500 hover:bg-indigo-600 rounded-lg text-white text-lg" wire:click="addTodo" > Add </button>
    </div>
    <div class="py-6">
        @if (count($todos) == 0)
            <p class="text-gray-500 text-center text-lg">There are no todos</p>
        @endif
        @foreach($todos as $index => $todo)
            @if($editingTodoId == $todo->id)
                <div class="flex gap-4 justify-between items-center py-2 border-b border-gray-200">
                    <input type="text" wire:model="editingTodoText" placeholder="Edit todo" class="flex-1 p-2 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" >
                    <button class="py-2 px-4 bg-indigo-500 hover:bg-indigo-600 rounded-lg text-white text-lg" wire:click="saveEditedTodo" > Save </button>
                    <button class="py-2 px-4 bg-gray-500 hover:bg-gray-600 rounded-lg text-white text-lg" wire:click="cancelEditing" > Cancel </button>
                </div>
            @else
                <div class="flex gap-4 justify-between items-center py-2 border-b border-gray-200">
                    <input type="checkbox" {{$todo->completed ? ' checked' : ''}} wire:change="toggleTodo({{$todo->id}})" class="h-5 w-5 text-indigo-500 focus:ring-indigo-500 border-gray-300 rounded" >
                    <label class="flex-1 {{$todo->completed ? 'line-through text-gray-500' : 'text-gray-900'}} text-lg">{{$todo->todo}}</label>
                    <div class="flex gap-2 justify-end">
                        <button wire:click="editTodo({{$todo->id}})" class="text-blue-500 hover:text-blue-700" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>
                        <button wire:click="deleteTodo({{$todo->id}})" class="text-red-500 hover:text-red-700" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>


