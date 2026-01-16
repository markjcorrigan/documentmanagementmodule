<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Note;
use App\Models\NoteAttachment;
use App\Models\NoteShare;
use App\Models\NoteTemplate;
use App\Models\Tag;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class NotesManager extends Component
{
    use AuthorizesRequests, WithFileUploads, WithPagination;

    // Pagination
    protected $paginationTheme = 'bootstrap';

    // Note properties
    public $noteId;

    public $title = '';

    public $content = '';

    public $categoryId = null;

    public $isPinned = false;

    // UI State
    public $showModal = false;

    public $showShareModal = false;

    public $showTemplateModal = false;

    public $showPreviewModal = false;

    public $isEditing = false;

    public $searchTerm = '';

    public $filterCategory = null;

    public $filterTag = null;

    public $viewType = 'all'; // all, own, shared

    // File uploads
    public $images = [];

    public $documents = [];

    public $uploadedFiles = [];

    // Tags
    public $selectedTags = [];

    public $newTag = '';

    // Sharing
    public $shareNoteId;

    public $shareUserId;

    public $sharePermission = 'view';

    public $shareCanReshare = false;

    public $shareExpiresAt = null;

    // Templates
    public $templateName = '';

    public $selectedTemplateId = null;

    public $templateIsPublic = false;

    // Preview
    public $previewFile = null;

    // FIXED: Only rules used in save() method
    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'nullable|string',
        'categoryId' => 'nullable|exists:categories,id',
        'images.*' => 'nullable|image|max:5120',
        'documents.*' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,txt,ppt,pptx|max:10240',
    ];

    public function mount()
    {
        $this->authorize('viewAny', Note::class);
    }

    public function render()
    {
        $query = Note::with(['category', 'attachments', 'tags', 'user'])
            ->when($this->viewType === 'own', function ($q) {
                $q->where('user_id', auth()->id());
            })
            ->when($this->viewType === 'shared', function ($q) {
                $q->sharedWith(auth()->id());
            })
            ->when($this->viewType === 'all' && ! auth()->user()->hasRole('Super Admin'), function ($q) {
                $q->accessibleBy(auth()->id());
            })
            ->when(auth()->user()->hasRole('Super Admin') && $this->viewType === 'all', function ($q) {
                // Super Admin sees everything when viewing all
            })
            ->orderBy('is_pinned', 'desc')
            ->orderBy('created_at', 'desc');

        // Apply search using Scout
        if ($this->searchTerm) {
            $noteIds = Note::search($this->searchTerm)->get()->pluck('id');
            $query->whereIn('id', $noteIds);
        }

        // Apply category filter
        if ($this->filterCategory) {
            $query->where('category_id', $this->filterCategory);
        }

        // Apply tag filter
        if ($this->filterTag) {
            $query->whereHas('tags', function ($q) {
                $q->where('tags.id', $this->filterTag);
            });
        }

        $notes = $query->paginate(12);

        $categories = Category::where('user_id', auth()->id())
            ->withCount('notes')
            ->orderBy('name')
            ->get();

        $tags = Tag::where('user_id', auth()->id())
            ->orderBy('name')
            ->get();

        $templates = NoteTemplate::availableFor(auth()->id())
            ->with('category')
            ->orderBy('name')
            ->get();

        $users = User::where('id', '!=', auth()->id())
            ->orderBy('name')
            ->get();

        return view('livewire.notes.notes-manager', [
            'notes' => $notes,
            'categories' => $categories,
            'tags' => $tags,
            'templates' => $templates,
            'users' => $users,
        ])->layout('layouts.app');
    }

    public function openCreateModal()
    {
        $this->authorize('create', Note::class);
        $this->resetForm();
        $this->showModal = true;
        $this->isEditing = false;
    }

    public function createFromTemplate($templateId)
    {
        $template = NoteTemplate::availableFor(auth()->id())->findOrFail($templateId);

        $this->resetForm();
        $this->title = $template->title ?? '';
        $this->content = $template->content ?? '';
        $this->categoryId = $template->category_id;

        $this->showModal = true;
        $this->isEditing = false;
    }

    public function openEditModal($noteId)
    {
        $note = Note::with(['tags', 'attachments'])->findOrFail($noteId);
        $this->authorize('update', $note);

        $this->noteId = $note->id;
        $this->title = $note->title;
        $this->content = $note->content;
        $this->categoryId = $note->category_id;
        $this->isPinned = $note->is_pinned;
        $this->selectedTags = $note->tags->pluck('id')->toArray();
        $this->uploadedFiles = $note->attachments;

        $this->showModal = true;
        $this->isEditing = true;
    }

    public function save()
    {
        \Log::info('🔥 SAVE METHOD CALLED!');
        \Log::info('Title: '.$this->title);
        \Log::info('Content: '.$this->content);

        // Validate only what we're using for note creation
        try {
            $validated = $this->validate([
                'title' => 'required|string|max:255',
                'content' => 'nullable|string',
                'categoryId' => 'nullable|exists:categories,id',
            ]);
            \Log::info('✅ Validation passed');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('❌ Validation failed: '.json_encode($e->errors()));

            return;
        }

        try {
            if ($this->isEditing) {
                \Log::info('Updating existing note: '.$this->noteId);
                $note = Note::findOrFail($this->noteId);
                $this->authorize('update', $note);
            } else {
                \Log::info('Creating new note');
                $note = new Note;
                $note->user_id = auth()->id();
            }

            $note->title = $this->title;
            $note->content = $this->content;
            $note->category_id = $this->categoryId;
            $note->is_pinned = $this->isPinned ?? false;

            \Log::info('About to save note...');
            $note->save();
            \Log::info('✅ Note saved! ID: '.$note->id);

            // Sync tags if any
            if (! empty($this->selectedTags)) {
                \Log::info('Syncing tags: '.json_encode($this->selectedTags));
                $note->tags()->sync($this->selectedTags);
            }

            // Handle file uploads
            if (! empty($this->images) || ! empty($this->documents)) {
                \Log::info('Handling file uploads...');
                $this->handleFileUploads($note);
            }

            session()->flash('message', $this->isEditing ? 'Note updated successfully!' : 'Note created successfully!');

            $this->closeModal();
            $this->resetPage();

            \Log::info('🎉 SAVE COMPLETE!');

        } catch (\Exception $e) {
            \Log::error('❌ Exception in save: '.$e->getMessage());
            \Log::error('Stack trace: '.$e->getTraceAsString());
            session()->flash('error', 'Error: '.$e->getMessage());
        }
    }

    public function addTag()
    {
        if (empty($this->newTag)) {
            return;
        }

        $tag = Tag::firstOrCreate(
            ['name' => $this->newTag, 'user_id' => auth()->id()],
            ['slug' => \Str::slug($this->newTag)]
        );

        if (! in_array($tag->id, $this->selectedTags)) {
            $this->selectedTags[] = $tag->id;
        }

        $this->newTag = '';
    }

    public function removeTag($tagId)
    {
        $this->selectedTags = array_filter($this->selectedTags, fn ($id) => $id != $tagId);
    }

    private function handleFileUploads($note)
    {
        if (! empty($this->images)) {
            foreach ($this->images as $image) {
                $path = $image->store('images', 'public');

                NoteAttachment::create([
                    'note_id' => $note->id,
                    'filename' => $image->getClientOriginalName(),
                    'path' => $path,
                    'type' => 'image',
                    'mime_type' => $image->getMimeType(),
                    'size' => $image->getSize(),
                ]);
            }
        }

        if (! empty($this->documents)) {
            foreach ($this->documents as $document) {
                $path = $document->store('documents', 'public');

                NoteAttachment::create([
                    'note_id' => $note->id,
                    'filename' => $document->getClientOriginalName(),
                    'path' => $path,
                    'type' => 'document',
                    'mime_type' => $document->getMimeType(),
                    'size' => $document->getSize(),
                ]);
            }
        }
    }

    public function deleteNote($noteId)
    {
        $note = Note::findOrFail($noteId);
        $this->authorize('delete', $note);

        $note->delete();
        session()->flash('message', 'Note deleted successfully!');
    }

    public function togglePin($noteId)
    {
        $note = Note::findOrFail($noteId);
        $this->authorize('update', $note);

        $note->is_pinned = ! $note->is_pinned;
        $note->save();
    }

    public function deleteAttachment($attachmentId)
    {
        $attachment = NoteAttachment::findOrFail($attachmentId);
        $this->authorize('manageAttachments', $attachment->note);

        $attachment->delete();
        $this->uploadedFiles = $this->uploadedFiles->reject(fn ($file) => $file->id === $attachmentId);
    }

    public function previewFile($attachmentId)
    {
        $attachment = NoteAttachment::findOrFail($attachmentId);
        $this->authorize('view', $attachment->note);

        $this->previewFile = $attachment;
        $this->showPreviewModal = true;
    }

    // Sharing functionality
    public function openShareModal($noteId)
    {
        $note = Note::findOrFail($noteId);
        $this->authorize('share', $note);

        $this->shareNoteId = $noteId;
        $this->showShareModal = true;
    }

    public function shareNote()
    {
        // Validate share-specific fields here
        $this->validate([
            'shareUserId' => 'required|exists:users,id',
            'sharePermission' => 'required|in:view,edit',
        ]);

        $note = Note::findOrFail($this->shareNoteId);
        $this->authorize('share', $note);

        NoteShare::updateOrCreate(
            [
                'note_id' => $this->shareNoteId,
                'shared_with' => $this->shareUserId,
            ],
            [
                'shared_by' => auth()->id(),
                'permission' => $this->sharePermission,
                'can_reshare' => $this->shareCanReshare,
                'expires_at' => $this->shareExpiresAt,
            ]
        );

        session()->flash('message', 'Note shared successfully!');
        $this->closeShareModal();
    }

    public function removeShare($shareId)
    {
        $share = NoteShare::findOrFail($shareId);
        $this->authorize('share', $share->note);

        $share->delete();
        session()->flash('message', 'Share removed successfully!');
    }

    // Template functionality
    public function openTemplateModal($noteId = null)
    {
        if ($noteId) {
            $note = Note::findOrFail($noteId);
            $this->authorize('view', $note);

            $this->noteId = $note->id;
            $this->title = $note->title;
            $this->content = $note->content;
            $this->categoryId = $note->category_id;
        }

        $this->showTemplateModal = true;
    }

    public function saveAsTemplate()
    {
        // Validate template-specific fields here
        $this->validate(['templateName' => 'required|string|max:255']);

        NoteTemplate::create([
            'name' => $this->templateName,
            'title' => $this->title,
            'content' => $this->content,
            'category_id' => $this->categoryId,
            'user_id' => auth()->id(),
            'is_public' => $this->templateIsPublic && auth()->user()->hasRole('Super Admin'),
        ]);

        session()->flash('message', 'Template created successfully!');
        $this->closeTemplateModal();
    }

    public function deleteTemplate($templateId)
    {
        $template = NoteTemplate::where('user_id', auth()->id())->findOrFail($templateId);
        $template->delete();

        session()->flash('message', 'Template deleted successfully!');
    }

    // Export functionality
    public function exportNote($noteId, $format = 'pdf')
    {
        $note = Note::with(['category', 'tags', 'user'])->findOrFail($noteId);
        $this->authorize('view', $note);

        if ($format === 'pdf') {
            $pdf = Pdf::loadView('notes.export-pdf', ['note' => $note]);

            return response()->streamDownload(
                fn () => print ($pdf->output()),
                'note-'.\Str::slug($note->title).'.pdf'
            );
        } elseif ($format === 'markdown') {
            $markdown = $this->generateMarkdown($note);

            return response()->streamDownload(
                fn () => print ($markdown),
                'note-'.\Str::slug($note->title).'.md',
                ['Content-Type' => 'text/markdown']
            );
        }
    }

    private function generateMarkdown($note)
    {
        $markdown = "# {$note->title}\n\n";

        if ($note->category) {
            $markdown .= "**Category:** {$note->category->name}\n\n";
        }

        if ($note->tags->count() > 0) {
            $markdown .= '**Tags:** '.$note->tags->pluck('name')->implode(', ')."\n\n";
        }

        $markdown .= "**Created:** {$note->created_at->format('Y-m-d H:i')}\n\n";
        $markdown .= "---\n\n";
        $markdown .= $note->content ?? '';

        return $markdown;
    }

    // Modal closures
    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function closeShareModal()
    {
        $this->showShareModal = false;
        $this->reset(['shareNoteId', 'shareUserId', 'sharePermission', 'shareCanReshare', 'shareExpiresAt']);
    }

    public function closeTemplateModal()
    {
        $this->showTemplateModal = false;
        $this->reset(['templateName', 'templateIsPublic']);
    }

    public function closePreviewModal()
    {
        $this->showPreviewModal = false;
        $this->previewFile = null;
    }

    private function resetForm()
    {
        $this->reset([
            'noteId', 'title', 'content', 'categoryId', 'isPinned',
            'images', 'documents', 'uploadedFiles', 'selectedTags', 'newTag',
        ]);
        $this->resetValidation();
    }

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }

    public function updatedFilterCategory()
    {
        $this->resetPage();
    }

    public function updatedFilterTag()
    {
        $this->resetPage();
    }

    public function updatedViewType()
    {
        $this->resetPage();
    }
}
