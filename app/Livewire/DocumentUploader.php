<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

#[Layout('components.layouts.app.frontend', ['title' => 'Document Man'])]
class DocumentUploader extends FrontendComponent
{
    use WithFileUploads;

    public $uploads = [];
    public $uploadedFiles = [];
    public $currentFolder = 'pending';
    public $folders = [];
    public $selectedFiles = [];
    public $newFolderName = '';
    public $moveToFolder = '';
    public $searchTerm = '';
    public $sortBy = 'date';
    public $sortDirection = 'desc';

    protected $rules = [
        'uploads.*' => 'file|max:102400', // 100MB max per file
        'newFolderName' => 'required|string|max:255|regex:/^[\w\-\s]+$/',
    ];

    public function mount()
    {
        $this->loadFolders();
        $this->loadFiles();
    }

    public function loadFolders()
    {
        $basePath = 'uploads';
        $directories = Storage::disk('private')->directories($basePath);

        $this->folders = collect($directories)
            ->map(fn($dir) => basename($dir))
            ->sort()
            ->values()
            ->toArray();

        // Ensure 'pending' folder exists
        if (!in_array('pending', $this->folders)) {
            Storage::disk('private')->makeDirectory('uploads/pending');
            $this->folders[] = 'pending';
        }
    }

    public function loadFiles()
    {
        $path = "uploads/{$this->currentFolder}";

        if (!Storage::disk('private')->exists($path)) {
            Storage::disk('private')->makeDirectory($path);
        }

        $files = Storage::disk('private')->files($path);

        $this->uploadedFiles = collect($files)->map(function($file) {
            return [
                'name' => basename($file),
                'path' => $file,
                'size' => Storage::disk('private')->size($file),
                'mime' => Storage::disk('private')->mimeType($file),
                'modified' => Storage::disk('private')->lastModified($file),
                'extension' => pathinfo($file, PATHINFO_EXTENSION),
            ];
        })->when($this->searchTerm, function($collection) {
            return $collection->filter(fn($file) =>
            str_contains(strtolower($file['name']), strtolower($this->searchTerm))
            );
        })->sortBy(function($file) {
            return match($this->sortBy) {
                'name' => $file['name'],
                'size' => $file['size'],
                default => $file['modified'],
            };
        }, SORT_REGULAR, $this->sortDirection === 'desc')
            ->values()
            ->toArray();
    }

    public function updatedUploads()
    {
        $this->validate();
    }

    public function updatedCurrentFolder()
    {
        $this->selectedFiles = [];
        $this->loadFiles();
    }

    public function updatedSearchTerm()
    {
        $this->loadFiles();
    }

    public function toggleSort($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
        $this->loadFiles();
    }

    public function save()
    {
        try {
            Log::info('Save method called', [
                'uploads_count' => count($this->uploads),
                'current_folder' => $this->currentFolder
            ]);

            $this->validate([
                'uploads.*' => 'required|file|max:102400'
            ]);

            if (empty($this->uploads)) {
                session()->flash('error', 'No files selected!');
                return;
            }

            $uploadCount = 0;
            $errors = [];

            foreach ($this->uploads as $upload) {
                try {
                    // Keep original filename
                    $originalName = $upload->getClientOriginalName();
                    $filename = $originalName;
                    $path = "uploads/{$this->currentFolder}";
                    $fullPath = "{$path}/{$filename}";

                    // Check if file already exists and append number if needed
                    $counter = 1;
                    while (Storage::disk('private')->exists($fullPath)) {
                        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                        $nameWithoutExt = pathinfo($originalName, PATHINFO_FILENAME);
                        $filename = "{$nameWithoutExt} ({$counter}).{$extension}";
                        $fullPath = "{$path}/{$filename}";
                        $counter++;
                    }

                    // Store with the final filename
                    $storedPath = $upload->storeAs($path, $filename, 'private');

                    if ($storedPath) {
                        $uploadCount++;

                        Log::info('File uploaded successfully', [
                            'filename' => $filename,
                            'path' => $storedPath,
                            'size' => $upload->getSize()
                        ]);
                    } else {
                        $errors[] = $originalName;
                        Log::error('Failed to store file', ['filename' => $originalName]);
                    }

                } catch (\Exception $e) {
                    $errors[] = $originalName . ': ' . $e->getMessage();
                    Log::error('Upload error', [
                        'filename' => $originalName,
                        'error' => $e->getMessage()
                    ]);
                }
            }

            // Clear uploads array
            $this->uploads = [];

            // Reload files
            $this->loadFiles();

            // Set success message
            if ($uploadCount > 0) {
                $message = "{$uploadCount} file(s) uploaded successfully to {$this->currentFolder}!";
                if (!empty($errors)) {
                    $message .= " Failed: " . implode(', ', $errors);
                }
                session()->flash('message', $message);
            } else {
                session()->flash('error', 'All uploads failed: ' . implode(', ', $errors));
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', 'Validation failed: ' . $e->getMessage());
            Log::error('Validation error', ['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            session()->flash('error', 'Upload failed: ' . $e->getMessage());
            Log::error('Save method error', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
        }
    }

    public function createFolder()
    {
        $this->validate(['newFolderName' => 'required|string|max:255|regex:/^[\w\-\s]+$/']);

        $folderPath = "uploads/{$this->newFolderName}";

        if (Storage::disk('private')->exists($folderPath)) {
            session()->flash('error', 'Folder already exists!');
            return;
        }

        Storage::disk('private')->makeDirectory($folderPath);
        $this->loadFolders();
        $this->newFolderName = '';

        session()->flash('message', 'Folder created successfully!');
    }

    public function deleteFolder($folder)
    {
        if ($folder === 'pending') {
            session()->flash('error', 'Cannot delete the pending folder!');
            return;
        }

        $folderPath = "uploads/{$folder}";

        // Check if folder has files
        if (count(Storage::disk('private')->files($folderPath)) > 0) {
            session()->flash('error', 'Cannot delete folder with files! Move or delete files first.');
            return;
        }

        Storage::disk('private')->deleteDirectory($folderPath);

        if ($this->currentFolder === $folder) {
            $this->currentFolder = 'pending';
        }

        $this->loadFolders();
        $this->loadFiles();

        session()->flash('message', 'Folder deleted successfully!');
    }

    public function toggleFileSelection($filePath)
    {
        if (in_array($filePath, $this->selectedFiles)) {
            $this->selectedFiles = array_values(array_diff($this->selectedFiles, [$filePath]));
        } else {
            $this->selectedFiles[] = $filePath;
        }
    }

    public function selectAll()
    {
        $this->selectedFiles = collect($this->uploadedFiles)->pluck('path')->toArray();
    }

    public function deselectAll()
    {
        $this->selectedFiles = [];
    }

    public function moveSelectedFiles()
    {
        if (empty($this->selectedFiles) || empty($this->moveToFolder)) {
            session()->flash('error', 'Please select files and destination folder!');
            return;
        }

        $movedCount = 0;
        foreach ($this->selectedFiles as $filePath) {
            $filename = basename($filePath);
            $newPath = "uploads/{$this->moveToFolder}/{$filename}";

            // Check if file exists in destination
            if (Storage::disk('private')->exists($newPath)) {
                continue;
            }

            Storage::disk('private')->move($filePath, $newPath);
            $movedCount++;
        }

        $this->selectedFiles = [];
        $this->moveToFolder = '';
        $this->loadFiles();

        session()->flash('message', "{$movedCount} file(s) moved successfully!");
    }

    public function deleteSelectedFiles()
    {
        if (empty($this->selectedFiles)) {
            session()->flash('error', 'No files selected!');
            return;
        }

        foreach ($this->selectedFiles as $filePath) {
            Storage::disk('private')->delete($filePath);
        }

        $deletedCount = count($this->selectedFiles);
        $this->selectedFiles = [];
        $this->loadFiles();

        session()->flash('message', "{$deletedCount} file(s) deleted successfully!");
    }


    public function render()
    {
        return view('livewire.document-uploader');
    }
}
