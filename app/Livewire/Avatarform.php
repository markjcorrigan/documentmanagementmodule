<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('components.layouts.app.frontend', ['title' => 'Manage Avatar'])]
class Avatarform extends NewBlogComponent
{
    use WithFileUploads;

    public $avatar;

    public function getAvatarPreviewProperty()
    {
        // If uploading a new file, show the temporary preview
        if ($this->avatar) {
            return $this->avatar->temporaryUrl();
        }

        // Otherwise, show the user's current saved avatar (accessor handles the path)
        if (auth()->check()) {
            return auth()->user()->avatar;
        }

        // Fallback to default image
        return '/storage/avatars/blogpostnewavatar_no-img-avatar.png';
    }

    public function mount(): void
    {
        //
    }

    public function save()
    {
        if (! auth()->check()) {
            abort(403, 'Unauthorized');
        }

        $user = auth()->user();

        // Keep original filename with prefix
        $originalName = pathinfo($this->avatar->getClientOriginalName(), PATHINFO_FILENAME);
        $filename = 'blogpostnewavatar_'.$originalName.'_'.$user->id.'.jpg';

        $manager = ImageManager::gd();
        $image = $manager->read($this->avatar);
        $imgData = $image->cover(120, 120)->toJpeg();

        // Save to avatars/ folder
        Storage::disk('public')->put('avatars/'.$filename, $imgData);

        $oldAvatar = $user->avatar;

        // Save only the filename (no path)
        $user->avatar = $filename;
        $user->save();

        // Delete old avatar if it exists
        if ($oldAvatar && $oldAvatar != 'blogpostnewavatar_no-img-avatar.png') {
            // Strip the path to get just the filename
            $oldFilename = basename($oldAvatar);
            if (Storage::disk('public')->exists('avatars/'.$oldFilename)) {
                Storage::disk('public')->delete('avatars/'.$oldFilename);
            }
        }

        // Flash success message
        session()->flash('success', 'Congrats on the new avatar.');

        // Dispatch browser event for toast notification
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Congrats on the new avatar!',
        ]);

        return $this->redirect('/manage-avatar', navigate: true);
    }

    public function render(): View
    {
        return view('livewire.avatarform');
    }
}
