<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesManager extends Component
{
    use WithPagination;

    // Pagination
    protected $paginationTheme = 'bootstrap';

    public $categoryId;

    public $name = '';

    public $color = '#3b82f6';

    public $showModal = false;

    public $isEditing = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'color' => 'required|string',
    ];

    public function render()
    {
        $categories = Category::where('user_id', auth()->id())
            ->withCount('notes')
            ->orderBy('name')
            ->paginate(12);

        return view('livewire.categories.categories-manager', [
            'categories' => $categories,
        ])->layout('layouts.app');
    }

    public function openCreateModal()
    {
        $this->resetForm();
        $this->showModal = true;
        $this->isEditing = false;
    }

    public function openEditModal($categoryId)
    {
        $category = Category::where('user_id', auth()->id())
            ->findOrFail($categoryId);

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
            $category = Category::where('user_id', auth()->id())
                ->findOrFail($this->categoryId);

            $category->update([
                'name' => $this->name,
                'color' => $this->color,
            ]);

            session()->flash('message', 'Category updated successfully!');
        } else {
            Category::create([
                'name' => $this->name,
                'color' => $this->color,
                'user_id' => auth()->id(),
            ]);

            session()->flash('message', 'Category created successfully!');
        }

        $this->closeModal();
    }

    public function deleteCategory($categoryId)
    {
        $category = Category::where('user_id', auth()->id())
            ->findOrFail($categoryId);

        // Notes will have category_id set to null due to onDelete('set null')
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
        $this->color = '#3b82f6';
        $this->resetValidation();
    }
}
