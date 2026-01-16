<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProductsSearch extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $productDeletedMessage = '';

    public $search = '';

    public $productSavedMessage = '';

    public $productId;

    public $title;

    public $image;

    public $price;

    public $isOpen = false;

    protected $rules = [
        'title' => 'required',
        'image' => 'image|mimes:jpg,jpeg,png|max:2048',
        'price' => 'required',
    ];

    public function render()
    {
        $products = Product::where('title', 'like', '%'.$this->search.'%')
            ->orWhere('price', 'like', '%'.$this->search.'%')
            ->paginate(5);

        return view('livewire.products-search', ['products' => $products]);
    }

    public function save()
    {
        $this->validate();
        if ($this->productId) {
            $product = Product::find($this->productId);
            if ($this->image) {
                $product->image = $this->image->store('products', 'public');
            }
            $product->update([
                'title' => $this->title,
                'price' => $this->price,
            ]);
        } else {
            $product = Product::create([
                'title' => $this->title,
                'price' => $this->price,
                'image' => $this->image->store('products', 'public'),
            ]);
        }
        $this->productSavedMessage = 'Product saved successfully.';
        $this->dispatch('closeModal');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $this->productId = $id;
        $this->title = $product->title;
        $this->price = $product->price;
        $this->isOpen = true;
    }

    public function resetInputFields()
    {
        $this->title = '';
        $this->image = '';
        $this->price = '';
        $this->productId = null;
        $this->productSavedMessage = '';
    }

    public function create()
    {
        $this->isOpen = true;
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        $this->productDeletedMessage = 'Product deleted successfully.';
        $this->dispatch('showMessage');
    }
}
