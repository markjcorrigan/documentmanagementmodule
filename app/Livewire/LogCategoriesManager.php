<?php

namespace App\Livewire;

use App\Models\LogCategory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class LogCategoriesManager extends Component
{
    use AuthorizesRequests, WithPagination;

    protected $paginationTheme = 'tailwind';

    public $showModal = false;
    public $isEditing = false;
    public $categoryId;
    public $name = '';
    public $color = '#3B82F6';

    protected $rules = [
        'name' => 'required|string|max:255',
        'color' => 'required|string|max:7',
    ];

    public function render()
    {
        $categories = LogCategory::where('user_id', auth()->id())
            ->withCount('logs')
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.log-categories.log-categories-manager', [
            'categories' => $categories,
        ])->layout('components.layouts.app.logs');
    }

    public function openCreateModal()
    {
        $this->resetForm();
        $this->showModal = true;
        $this->isEditing = false;
    }

    public function openEditModal($categoryId)
    {
        $category = LogCategory::where('user_id', auth()->id())->findOrFail($categoryId);

        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->color = $category->color;

        $this->showModal = true;
        $this->isEditing = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->isEditing) {
            $category = LogCategory::where('user_id', auth()->id())->findOrFail($this->categoryId);
        } else {
            $category = new LogCategory();
            $category->user_id = auth()->id();
        }

        $category->name = $this->name;
        $category->color = $this->color;
        $category->save();

        session()->flash('message', $this->isEditing ? 'Category updated successfully!' : 'Category created successfully!');

        $this->closeModal();
        $this->resetPage();
    }

    public function deleteCategory($categoryId)
    {
        $category = LogCategory::where('user_id', auth()->id())->findOrFail($categoryId);
        $category->delete();

        session()->flash('message', 'Category deleted successfully!');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['categoryId', 'name', 'color']);
        $this->resetValidation();
    }
}