<?php

namespace App\Livewire\PmbokSpa;

use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app.frontend')]
#[Title('My PMBOK Projects')]
class ProjectsManager extends Component
{
    public $projects;

    public $showCreateForm = false;

    public $editingProject = null;

    public $name = '';

    public $description = '';

    public $status = 'active';

    public $start_date = '';

    public $end_date = '';

    public function mount()
    {
        $this->loadProjects();
    }

    public function loadProjects()
    {
        $this->projects = Project::where('user_id', auth()->id())
            ->withCount('pmbokNotes')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function showCreateForm()
    {
        $this->showCreateForm = true;
        $this->reset(['name', 'description', 'status', 'start_date', 'end_date', 'editingProject']);
    }

    public function createProject()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|max:1000',
            'status' => 'required|in:active,completed,archived',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Project::create([
            'user_id' => auth()->id(),
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        $this->reset(['name', 'description', 'status', 'start_date', 'end_date', 'showCreateForm']);
        $this->loadProjects();
        session()->flash('message', 'Project created successfully!');
    }

    public function editProject($projectId)
    {
        $project = Project::findOrFail($projectId);

        if ($project->user_id !== auth()->id()) {
            abort(403);
        }

        $this->editingProject = $project->id;
        $this->name = $project->name;
        $this->description = $project->description;
        $this->status = $project->status;
        $this->start_date = $project->start_date?->format('Y-m-d');
        $this->end_date = $project->end_date?->format('Y-m-d');
        $this->showCreateForm = false;
    }

    public function updateProject()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|max:1000',
            'status' => 'required|in:active,completed,archived',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $project = Project::findOrFail($this->editingProject);

        if ($project->user_id !== auth()->id()) {
            abort(403);
        }

        $project->update([
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        $this->reset(['name', 'description', 'status', 'start_date', 'end_date', 'editingProject']);
        $this->loadProjects();
        session()->flash('message', 'Project updated successfully!');
    }

    public function deleteProject($projectId)
    {
        $project = Project::findOrFail($projectId);

        if ($project->user_id !== auth()->id()) {
            abort(403);
        }

        $notesCount = $project->pmbokNotes()->count();
        $project->delete();

        $this->loadProjects();
        session()->flash('message', "Project deleted successfully! ($notesCount notes removed)");
    }

    public function selectProject($projectId)
    {
        $project = Project::findOrFail($projectId);

        if ($project->user_id !== auth()->id()) {
            abort(403);
        }

        session(['current_project_id' => $projectId]);
        session(['current_project_name' => $project->name]);

        return $this->redirect(route('pmbok.spa.dashboard'));
    }

    public function cancelEdit()
    {
        $this->reset(['name', 'description', 'status', 'start_date', 'end_date', 'editingProject', 'showCreateForm']);
    }

    public function render()
    {
        return view('livewire.pmbok-spa.projects-manager');
    }
}
