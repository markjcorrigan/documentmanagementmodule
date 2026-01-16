<?php

namespace App\Livewire;

use App\Models\LogCategory;  // Changed from Category
use App\Models\Log;
use App\Models\LogAttachment;
use App\Models\LogShare;
use App\Models\LogTemplate;
use App\Models\Tag;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class LogsManager extends Component
{
    use AuthorizesRequests, WithFileUploads, WithPagination;

    protected $paginationTheme = 'tailwind';

    // Log properties
    public $logId;
    public $title = '';
    public $content = '';
    public $logCategoryId = null;  // Changed from categoryId
    public $isPinned = false;

    // UI State
    public $showModal = false;
    public $showShareModal = false;
    public $showTemplateModal = false;
    public $showPreviewModal = false;
    public $isEditing = false;

    // Filters
    public $searchTerm = '';
    public $filterCategory = null;
    public $filterTag = null;
    public $viewType = 'all';

    // File uploads
    public $images = [];
    public $documents = [];
    public $uploadedFiles = [];

    // Tags
    public $selectedTags = [];
    public $newTag = '';

    // Sharing
    public $shareLogId;
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

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'nullable|string',
        'logCategoryId' => 'nullable|exists:log_categories,id',  // Updated
        'images.*' => 'nullable|image|max:5120',
        'documents.*' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,txt,ppt,pptx|max:10240',
    ];

    public function mount()
    {
        $this->authorize('viewAny', Log::class);
    }

    public function render()
    {
        $query = Log::with(['category', 'attachments', 'tags', 'user'])
            ->when($this->viewType === 'own', function ($q) {
                $q->where('user_id', auth()->id());
            })
            ->when($this->viewType === 'shared', function ($q) {
                $q->sharedWith(auth()->id());
            })
            ->when($this->viewType === 'all' && ! auth()->user()->hasRole('Super Admin'), function ($q) {
                $q->accessibleBy(auth()->id());
            })
            ->orderBy('is_pinned', 'desc')
            ->orderBy('created_at', 'desc');

        if ($this->searchTerm) {
            $logIds = Log::search($this->searchTerm)->get()->pluck('id');
            $query->whereIn('id', $logIds);
        }

        if ($this->filterCategory) {
            $query->where('log_category_id', $this->filterCategory);  // Updated
        }

        if ($this->filterTag) {
            $query->whereHas('tags', function ($q) {
                $q->where('tags.id', $this->filterTag);
            });
        }

        $logs = $query->paginate(12);

        $categories = LogCategory::where('user_id', auth()->id())  // Changed to LogCategory
        ->withCount('logs')
            ->orderBy('name')
            ->get();

        $tags = Tag::where('user_id', auth()->id())
            ->orderBy('name')
            ->get();

        $templates = LogTemplate::availableFor(auth()->id())
            ->with('category')
            ->orderBy('name')
            ->get();

        $users = User::where('id', '!=', auth()->id())
            ->orderBy('name')
            ->get();

        return view('livewire.logs.logs-manager', [
            'logs' => $logs,
            'categories' => $categories,
            'tags' => $tags,
            'templates' => $templates,
            'users' => $users,
        ])->layout('components.layouts.app.logs');
    }

    public function openCreateModal()
    {
        $this->authorize('create', Log::class);
        $this->resetForm();
        $this->showModal = true;
        $this->isEditing = false;
    }

    public function createFromTemplate($templateId)
    {
        $template = LogTemplate::availableFor(auth()->id())->findOrFail($templateId);

        $this->resetForm();
        $this->title = $template->title ?? '';
        $this->content = $template->content ?? '';
        $this->logCategoryId = $template->log_category_id;  // Updated

        $this->showModal = true;
        $this->isEditing = false;
    }

    public function openEditModal($logId)
    {
        $log = Log::with(['tags', 'attachments'])->findOrFail($logId);
        $this->authorize('update', $log);

        $this->logId = $log->id;
        $this->title = $log->title;
        $this->content = $log->content;
        $this->logCategoryId = $log->log_category_id;  // Updated
        $this->isPinned = $log->is_pinned;
        $this->selectedTags = $log->tags->pluck('id')->toArray();
        $this->uploadedFiles = $log->attachments;

        $this->showModal = true;
        $this->isEditing = true;
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'logCategoryId' => 'nullable|exists:log_categories,id',  // Updated
        ]);

        if ($this->isEditing) {
            $log = Log::findOrFail($this->logId);
            $this->authorize('update', $log);
        } else {
            $log = new Log;
            $log->user_id = auth()->id();
        }

        $log->title = $this->title;
        $log->content = $this->content;
        $log->log_category_id = $this->logCategoryId;  // Updated
        $log->is_pinned = $this->isPinned ?? false;

        $log->save();

        if (! empty($this->selectedTags)) {
            $log->tags()->sync($this->selectedTags);
        }

        if (! empty($this->images) || ! empty($this->documents)) {
            $this->handleFileUploads($log);
        }

        session()->flash('message', $this->isEditing ? 'Log updated successfully!' : 'Log created successfully!');

        $this->closeModal();
        $this->resetPage();
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

    private function handleFileUploads($log)
    {
        if (! empty($this->images)) {
            foreach ($this->images as $image) {
                $path = $image->store('images', 'public');

                LogAttachment::create([
                    'log_id' => $log->id,
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

                LogAttachment::create([
                    'log_id' => $log->id,
                    'filename' => $document->getClientOriginalName(),
                    'path' => $path,
                    'type' => 'document',
                    'mime_type' => $document->getMimeType(),
                    'size' => $document->getSize(),
                ]);
            }
        }
    }

    public function deleteLog($logId)
    {
        $log = Log::findOrFail($logId);
        $this->authorize('delete', $log);

        $log->delete();
        session()->flash('message', 'Log deleted successfully!');
    }

    public function togglePin($logId)
    {
        $log = Log::findOrFail($logId);
        $this->authorize('update', $log);

        $log->is_pinned = ! $log->is_pinned;
        $log->save();
    }

    public function deleteAttachment($attachmentId)
    {
        $attachment = LogAttachment::findOrFail($attachmentId);
        $this->authorize('manageAttachments', $attachment->log);

        $attachment->delete();
        $this->uploadedFiles = $this->uploadedFiles->reject(fn ($file) => $file->id === $attachmentId);
    }

    public function previewFile($attachmentId)
    {
        $attachment = LogAttachment::findOrFail($attachmentId);
        $this->authorize('view', $attachment->log);

        $this->previewFile = $attachment;
        $this->showPreviewModal = true;
    }

    public function openShareModal($logId)
    {
        $log = Log::findOrFail($logId);
        $this->authorize('share', $log);

        $this->shareLogId = $logId;
        $this->showShareModal = true;
    }

    public function shareLog()
    {
        $this->validate([
            'shareUserId' => 'required|exists:users,id',
            'sharePermission' => 'required|in:view,edit',
        ]);

        $log = Log::findOrFail($this->shareLogId);
        $this->authorize('share', $log);

        LogShare::updateOrCreate(
            [
                'log_id' => $this->shareLogId,
                'shared_with' => $this->shareUserId,
            ],
            [
                'shared_by' => auth()->id(),
                'permission' => $this->sharePermission,
                'can_reshare' => $this->shareCanReshare,
                'expires_at' => $this->shareExpiresAt,
            ]
        );

        session()->flash('message', 'Log shared successfully!');
        $this->closeShareModal();
    }

    public function removeShare($shareId)
    {
        $share = LogShare::findOrFail($shareId);
        $this->authorize('share', $share->log);

        $share->delete();
        session()->flash('message', 'Share removed successfully!');
    }

    public function openTemplateModal($logId = null)
    {
        if ($logId) {
            $log = Log::findOrFail($logId);
            $this->authorize('view', $log);

            $this->logId = $log->id;
            $this->title = $log->title;
            $this->content = $log->content;
            $this->logCategoryId = $log->log_category_id;  // Updated
        }

        $this->showTemplateModal = true;
    }

    public function saveAsTemplate()
    {
        $this->validate(['templateName' => 'required|string|max:255']);

        LogTemplate::create([
            'name' => $this->templateName,
            'title' => $this->title,
            'content' => $this->content,
            'log_category_id' => $this->logCategoryId,  // Updated
            'user_id' => auth()->id(),
            'is_public' => $this->templateIsPublic && auth()->user()->hasRole('Super Admin'),
        ]);

        session()->flash('message', 'Template created successfully!');
        $this->closeTemplateModal();
    }

    public function deleteTemplate($templateId)
    {
        $template = LogTemplate::where('user_id', auth()->id())->findOrFail($templateId);
        $template->delete();

        session()->flash('message', 'Template deleted successfully!');
    }

    public function exportLog($logId, $format = 'pdf')
    {
        $log = Log::with(['category', 'tags', 'user'])->findOrFail($logId);
        $this->authorize('view', $log);

        if ($format === 'pdf') {
            $pdf = Pdf::loadView('logs.export-pdf', ['log' => $log]);

            return response()->streamDownload(
                fn () => print ($pdf->output()),
                'log-'.\Str::slug($log->title).'.pdf'
            );
        } elseif ($format === 'markdown') {
            $markdown = $this->generateMarkdown($log);

            return response()->streamDownload(
                fn () => print ($markdown),
                'log-'.\Str::slug($log->title).'.md',
                ['Content-Type' => 'text/markdown']
            );
        }
    }

    private function generateMarkdown($log)
    {
        $markdown = "# {$log->title}\n\n";

        if ($log->category) {
            $markdown .= "**Category:** {$log->category->name}\n\n";
        }

        if ($log->tags->count() > 0) {
            $markdown .= '**Tags:** '.$log->tags->pluck('name')->implode(', ')."\n\n";
        }

        $markdown .= "**Created:** {$log->created_at->format('Y-m-d H:i')}\n\n";
        $markdown .= "---\n\n";
        $markdown .= $log->content ?? '';

        return $markdown;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function closeShareModal()
    {
        $this->showShareModal = false;
        $this->reset(['shareLogId', 'shareUserId', 'sharePermission', 'shareCanReshare', 'shareExpiresAt']);
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
            'logId', 'title', 'content', 'logCategoryId', 'isPinned',  // Updated
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