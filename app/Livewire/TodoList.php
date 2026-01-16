<?php

namespace App\Livewire;

use App\Models\TodoItem;
use Livewire\Component;

class TodoList extends Component
{
    public $todos;

    public string $todoText = '';

    public $editingTodoId;

    public string $editingTodoText = '';

    public function mount()
    {
        $this->selectTodos();
    }

    public function render()
    {
        return view('livewire.todo-list');
    }

    public function addTodo()
    {
        $todo = new TodoItem;
        $todo->todo = $this->todoText;
        $todo->completed = false;
        $todo->save();
        $this->todoText = '';
        $this->selectTodos();
    }

    public function toggleTodo($id)
    {
        $todo = TodoItem::where('id', $id)->first();
        if (! $todo) {
            return;
        }
        $todo->completed = ! $todo->completed;
        $todo->save();
        $this->selectTodos();
    }

    public function deleteTodo($id)
    {
        $todo = TodoItem::where('id', $id)->first();
        if (! $todo) {
            return;
        }
        $todo->delete();
        $this->selectTodos();
    }

    public function editTodo($id)
    {
        $todo = TodoItem::where('id', $id)->first();
        if (! $todo) {
            return;
        }
        $this->editingTodoId = $id;
        $this->editingTodoText = $todo->todo;
    }

    public function saveEditedTodo()
    {
        $todo = TodoItem::where('id', $this->editingTodoId)->first();
        if (! $todo) {
            return;
        }
        $todo->todo = $this->editingTodoText;
        $todo->save();
        $this->editingTodoId = null;
        $this->selectTodos();
    }

    public function cancelEditing()
    {
        $this->editingTodoId = null;
    }

    public function selectTodos()
    {
        $this->todos = TodoItem::orderBy('created_at', 'DESC')->get();
    }
}
