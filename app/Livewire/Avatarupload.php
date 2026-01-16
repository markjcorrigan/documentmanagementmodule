<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;

class Avatarupload extends Component
{
    use WithFileUploads;

    public $avatar;

    public function save()
    {
        if (! auth()->check()) {
            abort(403, 'Unauthorized');
        }

        // Add validation to prevent the null error
        $this->validate([
            'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $user = auth()->user();

        // Keep original filename with prefix
        $originalName = pathinfo($this->avatar->getClientOriginalName(), PATHINFO_FILENAME);
        $filename = 'blogpostnewavatar_'.$originalName.'_'.$user->id.'.jpg';

        $manager = new ImageManager(new Driver);
        $image = $manager->read($this->avatar);
        $imgData = $image->cover(120, 120)->toJpeg();

        // Save to avatars/ folder
        Storage::disk('public')->put('avatars/'.$filename, $imgData);

        $oldAvatar = $user->avatar;

        $user->avatar = $filename;
        $user->save();

        if ($oldAvatar && $oldAvatar != '/fallback-avatar.jpg') {
            if (Storage::disk('public')->exists('avatars/'.$oldAvatar)) {
                Storage::disk('public')->delete('avatars/'.$oldAvatar);
            }
        }

        session()->flash('success', 'Congrats on the new avatar.');

        return $this->redirect('/manage-avatar', navigate: true);
    }

    public function render()
    {
        return view('livewire.avatarupload');
    }
}
