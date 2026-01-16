<?php

namespace App\Livewire\PmbokSpa;

use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app.frontend')]
class ProjectList extends Component
{
    public $projects;

    public $showCreateModal = false;

    public $editingProject = null;

    // Form fields
    public $name = '';

    public $description = '';

    public $start_date = '';

    public $end_date = '';

    public $status = 'active';

    public function mount()
    {
        $this->loadProjects();
    }

    public function loadProjects()
    {
        $this->projects = Project::where('user_id', auth()->id())
            ->withCount('pmbokNotes')
            ->latest()
            ->get();
    }

    public function openCreateModal()
    {
        $this->reset(['name', 'description', 'start_date', 'end_date', 'status', 'editingProject']);
        $this->status = 'active';
        $this->showCreateModal = true;
    }

    public function closeModal()
    {
        $this->showCreateModal = false;
        $this->reset(['name', 'description', 'start_date', 'end_date', 'status', 'editingProject']);
    }

    public function openEditModal($projectId)
    {
        $project = Project::findOrFail($projectId);

        $this->editingProject = $project->id;
        $this->name = $project->name;
        $this->description = $project->description;
        $this->start_date = $project->start_date?->format('Y-m-d');
        $this->end_date = $project->end_date?->format('Y-m-d');
        $this->status = $project->status;
        $this->showCreateModal = true;
    }

    public function saveProject()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|max:1000',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:active,completed,on-hold,cancelled',
        ]);

        if ($this->editingProject) {
            // Update existing
            $project = Project::findOrFail($this->editingProject);
            $project->update([
                'name' => $this->name,
                'description' => $this->description,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'status' => $this->status,
            ]);

            session()->flash('message', 'Project updated successfully!');
        } else {
            // Create new
            $project = Project::create([
                'user_id' => auth()->id(),
                'name' => $this->name,
                'description' => $this->description,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'status' => $this->status,
            ]);

            session()->flash('message', 'Project created successfully!');
        }

        $this->showCreateModal = false;
        $this->loadProjects();
    }

    public function selectProject($projectId)
    {
        session(['current_project_id' => $projectId]);
        session()->flash('message', 'Project activated!');

        return $this->redirect(route('pmbok.spa.dashboard'));
    }

    public function deleteProject($projectId)
    {
        $project = Project::findOrFail($projectId);

        // Clear from session if it's the active project
        if (session('current_project_id') == $projectId) {
            session()->forget('current_project_id');
        }

        $project->delete();

        session()->flash('message', 'Project deleted successfully!');
        $this->loadProjects();
    }

    public function render()
    {
        return view('livewire.pmbok-spa.project-list')
            ->title('PMBOK Projects');
    }
}
