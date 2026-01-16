<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductForm extends Component
{
    use WithFileUploads;

    public $productId;

    public $title;

    public $image;

    public $price;

    protected $rules = [
        'title' => 'required',
        'price' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ];

    public function render()
    {
        return view('livewire.product-form');
    }

    public function save()
    {
        $this->validate();

        if ($this->productId) {
            $product = Product::find($this->productId);
            $product->update([
                'title' => $this->title,
                'price' => $this->price,
            ]);
            if ($this->image) {
                $product->image = $this->image->store('products', 'public');
                $product->save();
            }
        } else {
            $product = Product::create([
                'title' => $this->title,
                'price' => $this->price,
                'image' => $this->image->store('products', 'public'),
            ]);
        }

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $this->productId = $id;
        $this->title = $product->title;
        $this->image = null;
        $this->price = $product->price;
    }

    public function resetInputFields()
    {
        $this->title = '';
        $this->image = null;
        $this->price = '';
        $this->productId = null;
    }
}
