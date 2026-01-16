<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FileEntry extends Component
{
    public $file;

    public $subfolder;

    /**
     * Create a new component instance.
     *
     * @param  string  $file
     * @param  string  $subfolder
     */
    public function __construct($file, $subfolder = 'resources')
    {
        $this->file = $file;
        $this->subfolder = $subfolder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.file-entry');
    }
}
