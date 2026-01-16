<?php

namespace App\Livewire;

use App\Models\Image;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUpload extends Component
{
    use WithFileUploads;

    /**
     * @var \Livewire\TemporaryUploadedFile[]
     */
    public $image = [];



    public function save()
    {
        $this->validate([
            'image.*' => 'image|max:1024', // 1MB Max
        ]);

        foreach ($this->image as $image) {
            $path = $image->getRealPath();
            $filename = $image->getClientOriginalName();
            Storage::disk('public')->put('images/' . $filename, file_get_contents($path));
        }

        $this->image = [];
    }



    //    public function render()
    //    {
    //        return view('livewire.image-upload', [
    //            'images' => collect(Storage::disk('public')->files('images'))
    //                ->map(function ($file) {
    //                    return asset('storage/' . $file);
    //                })
    //        ]);
    //    }

    //    public function render()
    //    {
    //        $files = Storage::disk('public')->files('images');
    //        $images = collect($files)->map(function ($file) {
    //            return asset('storage/' . $file);
    //        });
    //
    //        $currentPage = Paginator::resolveCurrentPage();
    //        $perPage = 10;
    //        $paginatedImages = new \Illuminate\Pagination\LengthAwarePaginator(
    //            $images->forPage($currentPage, $perPage),
    //            $images->count(),
    //            $perPage,
    //            $currentPage,
    //            ['path' => Paginator::resolveCurrentPath()]
    //        );
    //
    //        return view('livewire.image-upload', [
    //            'images' => $paginatedImages,
    //        ]);
    //    }

    public function render()
    {
        $files = Storage::disk('public')->files('images');
        $images = collect($files)->map(function ($file) {
            return asset('storage/' . $file);
        });

        $currentPage = Paginator::resolveCurrentPage();
        $perPage = 10;
        $paginatedImages = new \Illuminate\Pagination\LengthAwarePaginator(
            $images->forPage($currentPage, $perPage),
            $images->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()]
        );
        //
        //        return view('livewire.image-upload', [
        //            'images' => $paginatedImages,
        //        ]);

        return view('livewire.image-upload', ['images' => $paginatedImages,]);
    }


}
