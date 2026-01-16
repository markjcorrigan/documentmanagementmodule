<?php

namespace App\Livewire\PmbokSpa;

use App\Models\PmbokNote;
use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app.frontend')]
class ProcessPage extends Component
{
    public $notes = '';

    public $saved = false;

    public $processId;

    public $process;

    public $allProcesses;

    public $inputs = [];

    public $tools = [];

    public $outputs = [];

    public $showNotes = false;

    public $savedProductive = false;

    public $savedUnproductive = false;

    public $savedButton = null; // track which button was clicked

    public function mount($processId)
    {
        $this->processId = $processId;
        $this->allProcesses = $this->getPmbokProcesses();
        $this->process = collect($this->allProcesses)->firstWhere('id', $processId);

        if (! $this->process) {
            return redirect()->route('pmbok.spa.dashboard');
        }

        $this->loadIttos();
        $this->loadNotes();

        $userProject = Project::where('user_id', auth()->id())->first();

        if ($userProject) {
            PmbokNote::where('user_id', auth()->id())
                ->where('process_id', $this->processId)
                ->whereNull('project_id')
                ->update(['project_id' => $userProject->id]);
        }
    }

    public function loadNotes()
    {
        $note = PmbokNote::where('user_id', auth()->id())
            ->where('process_id', $this->processId)
            ->first();

        $this->notes = $note ? $note->notes : '';
    }

    /**
     * Save notes - called from the blade template
     *
     * @param  string  $type  'positive' or 'negative'
     */
    public function saveNotes($type)
    {
        // Validate notes are not empty
        $this->validate([
            'notes' => 'required|string|min:1',
        ], [
            'notes.required' => 'Please enter some notes before saving.',
            'notes.min' => 'Notes cannot be empty.',
        ]);

        // Determine if productive or unproductive
        $productive = ($type === 'positive');

        // Get the user's project
        $userProject = Project::where('user_id', auth()->id())->first();

        // Create the note
        PmbokNote::create([
            'user_id' => auth()->id(),
            'project_id' => $userProject ? $userProject->id : null,
            'process_id' => $this->processId,
            'process_name' => $this->process['name'],
            'notes' => $this->notes,
            'productive' => $productive,
        ]);

        // Show success message
        session()->flash('message', 'Note saved successfully!');

        // IMPORTANT: Clear the notes field - this resets Livewire's state
        $this->reset('notes');

        // Set which button was clicked for visual feedback
        $this->savedButton = $productive ? 'productive' : 'unproductive';

        // Reset tick after 2 seconds
        $this->dispatch('resetSavedTick');

        // Auto-hide the notes input after saving (if you're using toggle)
        $this->showNotes = false;
    }

    /**
     * Legacy method - kept for backwards compatibility
     */
    public function saveProductive()
    {
        $this->saveNotes('positive');
    }

    /**
     * Legacy method - kept for backwards compatibility
     */
    public function saveUnproductive()
    {
        $this->saveNotes('negative');
    }

    /**
     * Delete a note
     */
    public function deleteNote($noteId)
    {
        $note = PmbokNote::where('id', $noteId)
            ->where('user_id', auth()->id())
            ->first();

        if ($note) {
            $note->delete();
            session()->flash('message', 'Note deleted successfully!');
        }
    }

    public function backToDashboard()
    {
        return $this->redirect(route('pmbok.spa.dashboard'));
    }

    public function navigateToProcess($newProcessId)
    {
        return $this->redirect(route('pmbok.spa.process', ['processId' => $newProcessId]));
    }

    public function toggleNotes()
    {
        $this->showNotes = ! $this->showNotes;

        // If we're hiding notes, also clear any unsaved text
        if (! $this->showNotes) {
            $this->notes = '';
        }
    }

    private function loadIttos()
    {
        $ittoData = $this->getIttoData($this->processId);

        $this->inputs = $ittoData['inputs'] ?? [];
        $this->tools = $ittoData['tools'] ?? [];
        $this->outputs = $ittoData['outputs'] ?? [];
    }

    public function preparePrint()
    {
        $processNotes = $this->getProcessNotes();

        $this->dispatch('print-notes',
            notes: $processNotes->toArray(),
            processName: $this->process['name'],
            processId: $this->process['id']
        );
    }

    protected function getProcessNotes()
    {
        return PmbokNote::where('user_id', auth()->id())
            ->where('process_id', $this->processId)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    private function getIttoData($processId)
    {
        $ittos = [
            // ============================================
            // INTEGRATION MANAGEMENT (4.x)
            // ============================================
            '4.1' => [
                'inputs' => [
                    'Business documents (Business case, Benefits management plan)',
                    'Agreements',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data gathering (Brainstorming, Focus groups, Interviews)',
                    'Interpersonal and team skills (Conflict management, Facilitation, Meeting management)',
                    'Meetings',
                ],
                'outputs' => [
                    'Project charter',
                    'Assumption log',
                ],
            ],
            '4.2' => [
                'inputs' => [
                    'Project charter',
                    'Outputs from other processes',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data gathering (Brainstorming, Focus groups, Interviews)',
                    'Interpersonal and team skills (Conflict management, Facilitation, Meeting management)',
                    'Meetings',
                ],
                'outputs' => [
                    'Project management plan',
                ],
            ],
            '4.3' => [
                'inputs' => [
                    'Project management plan (Any component)',
                    'Project documents (Change Log, Lessons learned register, Milestone list, Project Schedule, Requirements traceability matrix, Risk Register, Risk Report)',
                    'Approved change requests',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Project management information system',
                    'Meetings',
                ],
                'outputs' => [
                    'Deliverables',
                    'Work performance data',
                    'Issue log',
                    'Change requests',
                    'Project management plan updates',
                    'Project documents updates (Activity list, Assumption log, Lessons learned register, Requirements documentation, Risk register, Stakeholder register)',
                    'Organizational process assets updates',
                ],
            ],
            '4.4' => [
                'inputs' => [
                    'Project management plan (All components)',
                    'Project documents (Lessons learned register, Project team assignments, Resource breakdown structure, Source selection criteria, Stakeholder register)',
                    'Deliverables',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Knowledge management',
                    'Information management',
                    'Interpersonal and team skills (Active listening, Leadership, Networking, Political awareness)',
                ],
                'outputs' => [
                    'Lessons learned register',
                    'Project management plan updates (Any component)',
                    'Organizational process assets updates',
                ],
            ],
            '4.5' => [
                'inputs' => [
                    'Project management plan (Any component)',
                    'Project documents (Assumption log, Basis of estimates, Cost forecasts, Issue log, Lessons learned register, Milestone list, Quality reports, Risk register, Risk report, Schedule forecasts)',
                    'Work performance information',
                    'Agreements',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data analysis',
                    'Decision making',
                    'Meetings',
                ],
                'outputs' => [
                    'Work performance reports',
                    'Change requests',
                    'Project management plan updates (Any component',
                    'Project documents updates (Cost forecasts, Issue log, Lessons learned register, Risk register, Schedule forecasts)',
                ],
            ],
            '4.6' => [
                'inputs' => [
                    'Project management plan (Change management plan, Configuration management plan, Scope baseline, Cost baseline',
                    'Project documents (Basis of estimates, Requirements traceability, Risk report)',
                    'Work performance reports',
                    'Change requests',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Change control tools',
                    'Data analysis (Alternatives analysis, Cost-benefit analysis)',
                    'Decision making (Voting, Autocratic decision making, Multicriteria decision analysis)',
                    'Meetings',
                ],
                'outputs' => [
                    'Approved change requests',
                    'Project management plan updates (Any component)',
                    'Project documents updates (Change log)',
                ],
            ],
            '4.7' => [
                'inputs' => [
                    'Project charter',
                    'Project management plan (Any components)',
                    'Project documents (Assumption log, Basis of estimates, Change log, Issues log, Lessons learned register, Milestone list, Project communications, Quality control measurements, Quality reports, Requirements documentation, Risk register, Risk report)',
                    'Accepted deliverables',
                    'Business documents (Business case, Benefits management plan)',
                    'Agreements',
                    'Procurement documentation',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data analysis (Document analysis, Regression analysis, Trend analysis, Variance analysis)',
                    'Meetings',
                ],
                'outputs' => [
                    'Project documents updates (Lessons learned register)',
                    'Final product, service, or result transition',
                    'Final report',
                    'Organizational process assets updates',
                ],
            ],

            // ============================================
            // SCOPE MANAGEMENT (5.x)
            // ============================================
            '5.1' => [
                'inputs' => [
                    'Project charter',
                    'Project management plan (Quality management plan, Project lifecycle description, Development approach)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data analysis (Alternatives analysis)',
                    'Meetings',
                ],
                'outputs' => [
                    'Scope management plan',
                    'Requirements management plan',
                ],
            ],
            '5.2' => [
                'inputs' => [
                    'Project charter',
                    'Project management plan (Scope management plan, Requirements management plan, Stakeholder engagement plan)',
                    'Project documents (Assumption log, Lessons learned register, Stakeholder register)',
                    'Business documents (Business case)',
                    'Agreements',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data gathering (Brainstorming, Interviews, Focus groups, Questionnaires and surveys, Benchmarking)',
                    'Data analysis (Document analysis)',
                    'Decision making (Voting, Multicriteria decision analysis)',
                    'Data representation (Affinity diagrams, Mind mapping)',
                    'Interpersonal and team skills',
                    'Context diagrams',
                    'Prototypes',
                ],
                'outputs' => [
                    'Requirements documentation',
                    'Requirements traceability matrix',
                ],
            ],
            '5.3' => [
                'inputs' => [
                    'Project charter',
                    'Project management plan (Scope management plan)',
                    'Project documents (Assumption log, Requirements documentation, Risk register)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data analysis (Alternatives analysis)',
                    'Decision making (Multicriteria decision analysis)',
                    'Interpersonal and team skills',
                    'Product analysis',
                ],
                'outputs' => [
                    'Project scope statement',
                    'Project documents updates (Assumption log, Requirements documentation, Requirements traceability matrix, Stakeholder register)',
                ],
            ],
            '5.4' => [
                'inputs' => [
                    'Project management plan (Scope management plan)',
                    'Project documents (Project scope statement, Requirements documentation)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Decomposition',
                ],
                'outputs' => [
                    'Scope baseline',
                    'Project documents updates (Assumption log, Requirements documentation)',
                ],
            ],
            '5.5' => [
                'inputs' => [
                    'Project management plan (Scope management plan, Requirements management plan, Scope baseline)',
                    'Project documents (Lessons learned register, Quality reports, Requirements documentation, Requirements traceability matrix)',
                    'Verified deliverables',
                    'Work performance data',
                ],
                'tools' => [
                    'Inspection',
                    'Decision making (Voting)',
                ],
                'outputs' => [
                    'Accepted deliverables',
                    'Work performance information',
                    'Change requests',
                    'Project documents updates (Lessons learned register, Requirements documentation, Requirements traceability matrix)',
                ],
            ],
            '5.6' => [
                'inputs' => [
                    'Project management plan (Scope management plan, Requirements management plan, Configuration management plan, Scope baseline, Performance measurement baseline)',
                    'Project documents (Lessons learned register, Requirements documentation, Requirements traceability matrix)',
                    'Work performance data',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Data analysis (Variance analysis, Trend analysis)',
                ],
                'outputs' => [
                    'Work performance information',
                    'Change requests',
                    'Project management plan updates (Scope management plan, Scope baseline, Schedule baseline, Cost baseline, Performance measurement baseline)',
                    'Project documents updates (Lessons learned register, Requirements documentation, Requirements traceability matrix)',
                ],
            ],

            // ============================================
            // SCHEDULE MANAGEMENT (6.x)
            // ============================================
            '6.1' => [
                'inputs' => [
                    'Project charter',
                    'Project management plan (Scope management plan, Development approach)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data analysis',
                    'Meetings',
                ],
                'outputs' => [
                    'Schedule management plan',
                ],
            ],
            '6.2' => [
                'inputs' => [
                    'Project management plan (Schedule management plan, Scope baseline)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Decomposition',
                    'Rolling wave planning',
                    'Meetings',
                ],
                'outputs' => [
                    'Activity list',
                    'Activity attributes',
                    'Milestone list',
                    'Change requests',
                    'Project management plan updates (Schedule baseline, Cost baseline)',
                ],
            ],
            '6.3' => [
                'inputs' => [
                    'Project management plan (Schedule management plan, Scope baseline)',
                    'Project documents (Activity attributes, Activity list, Assumption log, Milestone list)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Precedence diagramming method',
                    'Dependency determination and integration',
                    'Leads and lags',
                    'Project management information system',
                ],
                'outputs' => [
                    'Project schedule network diagrams',
                    'Project documents updates (Activity attributes, Activity list, Activity log, Milestone list)',
                ],
            ],
            '6.4' => [
                'inputs' => [
                    'Project management plan (Schedule management plan, Scope baseline)',
                    'Project documents (Activity attributes, Activity list, Assumption log, Lessons learned register, Milestone list, Project item assignments, Resource breakdown structure, Resource calendars, Resource requirements, Risk register)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Analogous estimating',
                    'Parametric estimating',
                    'Three-point estimating',
                    'Bottom-up estimating',
                    'Data analysis (Alternatives analysis, Reserve analysis)',
                    'Decision making',
                    'Meetings',
                ],
                'outputs' => [
                    'Duration estimates',
                    'Basis of estimates',
                    'Project documents updates (Activity attributes, Assumption log, Lessons learned register)',
                ],
            ],
            '6.5' => [
                'inputs' => [
                    'Project management plan (Schedule management plan, Scope baseline)',
                    'Project documents (Activity attributes, Activity list, Assumption log, Basis of estimates, Duration estimates, Lessons learned register, Milestone list, Project schedule network diagrams, Project team assignments, Resource calendars, Resource requirements, Risk register)',
                    'Agreements',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Schedule network analysis',
                    'Critical path method',
                    'Resource optimization',
                    'Data analysis (What-if scenario analysis, Simulation)',
                    'Leads and lags',
                    'Schedule compression',
                    'Project management information system',
                    'Agile release planning',
                ],
                'outputs' => [
                    'Schedule baseline',
                    'Project schedule',
                    'Schedule data',
                    'Project calendars',
                    'Change requests',
                    'Project management plan updates',
                    'Project documents updates (Activity attributes, Assumption log, Duration estimates, Lessons learned register, Resource requirements, Risk register)',
                ],
            ],
            '6.6' => [
                'inputs' => [
                    'Project management plan (Schedule management plan, Schedule baseline, Scope baseline, Performance measurement baseline)',
                    'Project documents (Lessons learned register, Project calendars, Project schedule, Resource calendars, Schedule data)',
                    'Work performance data',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Data analysis (Earned value analysis, Iteration breakdown chart, Performance reviews, Trend analysis, What-if scenario analysis)',
                    'Critical path method',
                    'Project management information system',
                    'Resource optimization',
                    'Leads and lags',
                    'Schedule compression',
                ],
                'outputs' => [
                    'Work performance information',
                    'Schedule forecasts',
                    'Change requests',
                    'Project management plan updates (Schedule management plan, Schedule baseline, Cost baseline, Performance measurement baseline)',
                    'Project documents updates (Assumption log, Basis of estimates, Lessons learned register, Project schedule, Resource calendars, Risk register, Schedule data)',
                ],
            ],

            // ============================================
            // COST MANAGEMENT (7.x)
            // ============================================
            '7.1' => [
                'inputs' => [
                    'Project charter',
                    'Project management plan (Schedule management plan, Risk management plan)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data analysis',
                    'Meetings',
                ],
                'outputs' => [
                    'Cost management plan',
                ],
            ],
            '7.2' => [
                'inputs' => [
                    'Project management plan (Cost management plan, Quality management plan, Scope baseline)',
                    'Project documents (Lessons learned register, Project schedule, Resource requirements, Risk register)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Analogous estimating',
                    'Parametric estimating',
                    'Bottom-up estimating',
                    'Three-point estimating',
                    'Data analysis (Alternatives analysis, Reserve analysis, Cost of quality)',
                    'Project management information system',
                    'Decision making (Voting)',
                ],
                'outputs' => [
                    'Cost estimates',
                    'Basis of estimates',
                    'Project documents updates (Assumption log, Lessons learned register, Risk register)',
                ],
            ],
            '7.3' => [
                'inputs' => [
                    'Project management plan (Cost management plan, Resource management plan, Scope baseline)',
                    'Project documents (Basis of estimates, Cost estimates, Project schedule, Risk register)',
                    'Business documents (Business case, Benefits management plan)',
                    'Agreements',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Cost aggregation',
                    'Data analysis (Reserve analysis)',
                    'Historical information review',
                    'Funding limit reconciliation',
                    'Financing',
                ],
                'outputs' => [
                    'Cost baseline',
                    'Project funding requirements',
                    'Project documents updates (Cost estimates, Project schedule, Risk register)',
                ],
            ],
            '7.4' => [
                'inputs' => [
                    'Project management plan (Cost management plan, Cost baseline, Performance measurement baseline)',
                    'Project documents (Lessons learned register)',
                    'Project funding requirements',
                    'Work performance data',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data analysis (Earned value analysis, Trend analysis, Reserve analysis)',
                    'To-complete performance index',
                    'Project management information system',
                ],
                'outputs' => [
                    'Work performance information',
                    'Cost forecasts',
                    'Change requests',
                    'Project management plan updates (Cost management plan, Cost baseline, Performance measurement baseline)',
                    'Project documents updates (Assumption log, Basis of estimates, Cost estimates, Lessons learned register, Risk register)',
                ],
            ],

            // ============================================
            // QUALITY MANAGEMENT (8.x)
            // ============================================
            '8.1' => [
                'inputs' => [
                    'Project charter',
                    'Project management plan (Requirements management plan, Risk management plan, Stakeholder engagement plan, Scope baseline)',
                    'Project documents (Assumption log, Requirements documentation, Requirements traceability matrix, Risk Register, Stakeholder register)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data gathering (Benchmarking, Brainstorming, Interviews)',
                    'Data analysis (Cost-benefit analysis, Cost of quality)',
                    'Decision making (Multicriteria decision analysis)',
                    'Data representation (Flowcharts, Logical data model, Matrix diagrams, Mind mapping)',
                    'Test and inspection planning',
                    'Meetings',
                ],
                'outputs' => [
                    'Quality management plan',
                    'Quality metrics',
                    'Project management plan updates (Risk management plan, Scope baseline)',
                    'Project documents updates (Lessons learned register, Requirements traceability matrix, Risk register, Stakeholder register)',
                ],
            ],
            '8.2' => [
                'inputs' => [
                    'Project management plan (Quality management plan)',
                    'Project documents (Lessons learned register, Quality control measurements, Quality metrics, Risk report)',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Data gathering (Checklists)',
                    'Data analysis (Alternatives analysis, Document analysis, Process analysis, Root cause analysis)',
                    'Decision making (Multicriteria decision analysis)',
                    'Data representation (Affinity diagrams, Cause-and-effect diagrams, Flowcharts, Histograms, Matrix diagrams, Scatter diagrams)',
                    'Audits',
                    'Design for X',
                    'Problem solving',
                    'Quality improvement methods',
                ],
                'outputs' => [
                    'Quality reports',
                    'Test and evaluation documents',
                    'Change requests',
                    'Project management plan updates (Quality management plan, Scope baseline, Schedule baseline, Cost baseline',
                    'Project documents updates (Issue log, Lessons learned register, Risk register)',
                ],
            ],
            '8.3' => [
                'inputs' => [
                    'Project management plan (Quality management plan)',
                    'Project documents (Lessons learned register, Quality metrics, Test and evaluation)',
                    'Approved change requests',
                    'Deliverables',
                    'Work performance data',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Data gathering (Checklists, Check sheets, Statistical sampling, Questionnaires and surveys)',
                    'Data analysis (Performance reviews, Root cause analysis)',
                    'Inspection',
                    'Testing/product evaluations',
                    'Data representation (Cause-and-effect diagrams, Control charts, Histogram, Scatter diagrams)',
                    'Meetings',
                ],
                'outputs' => [
                    'Quality control measurements',
                    'Verified deliverables',
                    'Work performance information',
                    'Change requests',
                    'Project management plan updates (Quality management plan)',
                    'Project documents updates (Issue log, Lessons learned register, Risk register, Test and evaluation documents)',
                ],
            ],

            // ============================================
            // RESOURCE MANAGEMENT (9.x)
            // ============================================
            '9.1' => [
                'inputs' => [
                    'Project charter',
                    'Project management plan (Quality management plan, Scope baseline)',
                    'Project documents (Project schedule, Requirements documentation, Risk register)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data representation (Hierarchical charts, Responsibility assignment matrix, Test-oriented formats)',
                    'Organizational theory',
                    'Meetings',
                ],
                'outputs' => [
                    'Resource management plan',
                    'Team charter',
                    'Project documents updates (Assumption log, Risk register)',
                ],
            ],
            '9.2' => [
                'inputs' => [
                    'Project management plan (Resource management plan, Scope baseline)',
                    'Project documents (Activity attributes, Activity list, Assumption log, Cost estimates, Resource calendars, Risk register)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Bottom-up estimating',
                    'Analogous estimating',
                    'Parametric estimating',
                    'Data analysis',
                    'Project management information system',
                    'Meetings',
                ],
                'outputs' => [
                    'Resource requirements',
                    'Basis of estimates',
                    'Resource breakdown structure',
                    'Project documents updates (Activity attributes, Assumption log, Lessons learned register)',
                ],
            ],
            '9.3' => [
                'inputs' => [
                    'Project management plan (Resource management plan, Procurement management plan, Cost baseline)',
                    'Project documents (Project schedule, Resource calendars, Stakeholder register)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Decision making (Multicriteria decision analysis)',
                    'Interpersonal and team skills (Negotiation)',
                    'Pre-assignment',
                    'Virtual teams',
                ],
                'outputs' => [
                    'Physical resource assignments',
                    'Project team assignments',
                    'Resource calendars',
                    'Change requests',
                    'Project management plan updates (Resource management plan, Cost baseline)',
                    'Project documents updates (Lessons Learned register, Resource breakdown structure, Resource requirements, Risk register, Stakeholder register)',
                    'Enterprise environmental factors updates',
                    'Organizational process assets updates',
                ],
            ],
            '9.4' => [
                'inputs' => [
                    'Project management plan (Resource management plan)',
                    'Project documents (Lessons learned register, Project schedule, Project team assignment, Resource calendars, Team charter)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Colocation',
                    'Virtual teams',
                    'Communication technology',
                    'Interpersonal and team skills (Conflict management, influencing, Motivation, Negotiation, Team building)',
                    'Recognition and rewards',
                    'Training',
                    'Individual and team assessments',
                    'Meetings',
                ],
                'outputs' => [
                    'Team performance assessments',
                    'Change requests',
                    'Project management plan updates (Resource management plan)',
                    'Project documents updates (Lessons learned register, Project schedule, Project team assignment, Resource calendars, Team charter)',
                    'Enterprise environmental factors updates',
                    'Organizational process assets updates',
                ],
            ],
            '9.5' => [
                'inputs' => [
                    'Project management plan (Resource management plan)',
                    'Project documents (Issue log, Lessons learned register, Project team assignments, Team charter)',
                    'Work performance reports',
                    'Team performance assessments',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Interpersonal and team skills (Conflict management, Decision making, Emotional intelligence, Influencing, Leadership)',
                    'Project management information system',
                ],
                'outputs' => [
                    'Change requests',
                    'Project management plan updates (Resource management plan, Schedule baseline, Cost baseline)',
                    'Project documents updates (Issue log, Lessons learned register, Project team assignments)',
                    'Enterprise environmental factors updates',
                ],
            ],
            '9.6' => [
                'inputs' => [
                    'Project management plan (Resource management plan)',
                    'Project documents (Issue log, Lessons learned register, Physical resource assignments, Resource breakdown structure, Risk register)',
                    'Work performance data',
                    'Agreements',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Data analysis (Alternatives analysis, Cost-benefit analysis, Performance reviews, Trend analysis)',
                    'Problem solving',
                    'Interpersonal and team skills (Negotiating, Influencing)',
                    'Project management information system',
                ],
                'outputs' => [
                    'Work performance information',
                    'Change requests',
                    'Project management plan updates (Resource management plan, Schedule baseline, Cost baseline)',
                    'Project documents updates (Assumption log, Issue log, Lessons learned register, Physical resource assignments, Resource breakdown structure, Risk register)',
                ],
            ],

            // ============================================
            // COMMUNICATIONS MANAGEMENT (10.x)
            // ============================================
            '10.1' => [
                'inputs' => [
                    'Project charter',
                    'Project management plan (Resource management plan, Stakeholder engagement plan)',
                    'Project documents (Requirements documentation, Stakeholder Register)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Communication requirements analysis',
                    'Communication technology',
                    'Communication models',
                    'Communication methods',
                    'Interpersonal and team skills (Communication styles assessment, Political awareness)',
                    'Data representation (Stakeholder engagement assessment matrix)',
                    'Meetings',
                ],
                'outputs' => [
                    'Communications management plan',
                    'Project management plan updates (Stakeholder engagement plan)',
                    'Project documents updates (Project schedule, Stakeholder register)',
                ],
            ],
            '10.2' => [
                'inputs' => [
                    'Project management plan (Resource management plan, Communication, management plan, Stakeholder engagement plan)',
                    'Project documents (Change log, Issue log, Lessons learned register, Quality report, Risk report Stakeholder register)',
                    'Work performance reports',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Communication technology',
                    'Communication methods',
                    'Communication skills (Communication competence, Feedback, Nonverbal, Presentations)',
                    'Project management information system',
                    'Project reporting',
                    'Interpersonal and team skills (Active listening, Conflict management, Cultural awareness, Networking, Political awareness)',
                    'Meetings',
                ],
                'outputs' => [
                    'Project communications',
                    'Project management plan updates (Communications management plan, Stakeholder engagement plan)',
                    'Project documents updates (Issue log, Lessons learned register, Project schedule, Risk register, Stakeholder register)',
                    'Organizational process assets updates',
                ],
            ],
            '10.3' => [
                'inputs' => [
                    'Project management plan (Resource management plan, Communications management plan, Stakeholder engagement plan)',
                    'Project documents (Issue log, Lessons learned register, Project communications)',
                    'Work performance data',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Project management information system',
                    'Data analysis (Stakeholder engagement assessment matrix)',
                    'Interpersonal and team skills (Observation/conversation)',
                    'Meetings',
                ],
                'outputs' => [
                    'Work performance information',
                    'Change requests',
                    'Project management plan updates (Communication management plan, Stakeholder engagement plan)',
                    'Project documents updates (Issue log, Lessons learned register, Stakeholder register)',
                ],
            ],

            // ============================================
            // RISK MANAGEMENT (11.x)
            // ============================================
            '11.1' => [
                'inputs' => [
                    'Project charter',
                    'Project management plan (All components)',
                    'Project documents (Stakeholder register)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data analysis (Stakeholder analysis)',
                    'Meetings',
                ],
                'outputs' => [
                    'Risk management plan',
                ],
            ],
            '11.2' => [
                'inputs' => [
                    'Project management plan (Requirements management plan, Schedule management plan, Cost management plan, Quality management plan, Resource management plan, Risk management plan, Scope baseline, Cost baseline)',
                    'Project documents (Assumption log, Cost estimates, Duration estimates, Issue log, Lessons learned register, Requirements documentation, Resource requirements, Stakeholder register)',
                    'Agreements',
                    'Procurement documentation',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data gathering (Brainstorming, Checklists, Interviews)',
                    'Data analysis (Root cause analysis, Assumption and constraint analysis, SWOT analysis, Document analysis)',
                    'Interpersonal and team skills (Facilitation)',
                    'Prompt lists',
                    'Meetings',
                ],
                'outputs' => [
                    'Risk register',
                    'Risk report',
                    'Project documents updates (Assumption log, Issue log, Lessons learned register)',
                ],
            ],
            '11.3' => [
                'inputs' => [
                    'Project management plan (Risk management plan)',
                    'Project documents (Assumption log, Risk register, Stakeholder register)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data gathering (Interviews)',
                    'Data analysis (Risk data quality assessment, Risk probability and impact assessment, Assessment of other risk parameters)',
                    'Interpersonal and team skills (Facilitation)',
                    'Risk categorization',
                    'Data representation (Probability and impact matrix)',
                    'Meetings',
                ],
                'outputs' => [
                    'Project documents updates (Assumption log, Risk register, Risk report)',
                ],
            ],
            '11.4' => [
                'inputs' => [
                    'Project management plan (Risk management plan, Scope baseline, Schedule baseline, Cost baseline)',
                    'Project documents (Assumption log, Basis of estimates, Cost estimates, Duration estimates, Milestone list, Resource requirements, Risk register, Risk report Schedule forecasts)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data gathering (Interviews)',
                    'Interpersonal and team skills (Facilitation)',
                    'Representations of uncertainty',
                    'Data analysis (Simulations, Sensitivity analysis, Decision tree, Influence diagrams)',
                ],
                'outputs' => [
                    'Project documents updates (Risk report)',
                ],
            ],
            '11.5' => [
                'inputs' => [
                    'Project management plan (Resource management plan, Risk management plan, Cost baseline)',
                    'Project documents (Lessons learned register, Project schedule, Project team assignment, Resource calendars, Risk register, Risk report, Stakeholder register)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data gathering (Interviews)',
                    'Interpersonal and team skills (Facilitation)',
                    'Strategies for threats',
                    'Strategies for opportunities',
                    'Contingent response strategies',
                    'Strategies for overall project risk',
                    'Data analysis (Alternatives analysis, Cost-benefit analysis',
                    'Decision making (Multicultural decision making)',
                ],
                'outputs' => [
                    'Change requests',
                    'Project management plan updates (Schedule management plan, Cost management plan, Quality management plan, Resource management plan, Procurement management plan, Scope baseline, Schedule baseline, Cost baseline)',
                    'Project documents updates (Assumption log, Lessons learned register, Project schedule, Project team assignments, Risk register, Risk report)',
                ],
            ],
            '11.6' => [
                'inputs' => [
                    'Project management plan (Risk management plan)',
                    'Project documents (Lessons learned register, Risk register, Risk report)',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Interpersonal and team skills (Influencing)',
                    'Project management information system',
                ],
                'outputs' => [
                    'Change requests',
                    'Project documents updates (Issue log, Lessons learned register, Project team assignments, Risk register, Risk report)',
                ],
            ],
            '11.7' => [
                'inputs' => [
                    'Project management plan (Risk management plan)',
                    'Project documents (Issue log, Lessons learned register, Risk register, Risk report)',
                    'Work performance data',
                    'Work performance reports',
                ],
                'tools' => [
                    'Data analysis (Technical performance analysis, Reserve analysis)',
                    'Audits',
                    'Meetings',
                ],
                'outputs' => [
                    'Work performance information',
                    'Change requests',
                    'Project management plan updates (Any component)',
                    'Project documents updates (Assumption log, Issue log, Lessons learned register, Risk register, Risk report)',
                    'Organizational process assets updates',
                ],
            ],

            // ============================================
            // PROCUREMENT MANAGEMENT (12.x)
            // ============================================
            '12.1' => [
                'inputs' => [
                    'Project charter',
                    'Business documents (Business case, Benefits management plan)',
                    'Project management plan (Scope management plan, Quality management plan, Resource management plan, Scope baseline)',
                    'Project documents (Milestone list, Project team assignments, Requirements documentation, Requirements traceability matrix, Resource requirements, Risk register, Stakeholder register)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data gathering (Market research)',
                    'Data analysis (Make-or-buy analysis)',
                    'Source selection analysis',
                    'Meetings',
                ],
                'outputs' => [
                    'Procurement management plan',
                    'Procurement strategy',
                    'Bid documents',
                    'Procurement statement of work',
                    'Source selection criteria',
                    'Make-or-buy decisions',
                    'Independent cost estimates',
                    'Change requests',
                    'Project documents updates (Lessons learned register, Milestone list, Requirements documentation, Requirements traceability matrix, Risk register, Stakeholder register)',
                    'Organizational process assets updates',
                ],
            ],
            '12.2' => [
                'inputs' => [
                    'Project management plan (Scope management plan, Communication management plan, Risk management plan, Procurement management plan, Configuration management plan, Cost baseline)',
                    'Project documents (Lessons learned register, Project schedule, Requirements documentation, Risk register, Stakeholder register)',
                    'Procurement documentation',
                    'Seller proposals',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Advertising',
                    'Bidder conferences',
                    'Data analysis (Proposal evaluation)',
                    'Interpersonal and team skills (Negotiation)',
                ],
                'outputs' => [
                    'Selected sellers',
                    'Agreements',
                    'Change requests',
                    'Project management plan updates (Requirements management plan, Communication management plan, Risk management plan, Procurement management plan, Scope baseline, Schedule baseline, Cost baseline)',
                    'Project documents updates (Lessons learned register, Requirements documentation, Requirements traceability matrix, Resource calendars, Risk register, Stakeholder register)',
                    'Organizational process assets updates',
                ],
            ],
            '12.3' => [
                'inputs' => [
                    'Project management plan (Requirements management plan, Risk management plan, Procurement management plan, Change management plan, Schedule baseline)',
                    'Project documents (Assumption log, Lessons learned register, Milestone list, Quality reports, Requirements traceability matrix, Risk register, Stakeholder register)',
                    'Agreements',
                    'Procurement documentation',
                    'Approved change requests',
                    'Work performance data',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Claims administration',
                    'Data analysis (Performance reviews, Earned value analysis, Trend analysis)',
                    'Inspection',
                    'Audits',
                ],
                'outputs' => [
                    'Closed procurements',
                    'Work performance information',
                    'Procurement documentation updates',
                    'Change requests',
                    'Project management plan updates (Risk management plan, Procurement management plan, Schedule baseline, Cost baseline)',
                    'Project documents updates (Lessons learned register, Resource requirements, Requirements traceability matrix, Risk register, Stakeholder register)',
                    'Organizational process assets updates',
                ],
            ],

            // ============================================
            // STAKEHOLDER MANAGEMENT (13.x)
            // ============================================
            '13.1' => [
                'inputs' => [
                    'Project charter',
                    'Business documents (Business case, Benefits management plan)',
                    'Project management plan (Communication management plan, Stakeholder engagement)',
                    'Project documents (Change log, Issue log, Requirements documentation)',
                    'Agreements',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data gathering (Questionnaires and surveys, Brainstorming)',
                    'Data analysis (Stakeholder analysis, Document analysis)',
                    'Data representation (Stakeholder mapping/representation)',
                    'Meetings',
                ],
                'outputs' => [
                    'Stakeholder register',
                    'Change requests',
                    'Project management plan updates (Requirements management plan, Communication management plan, Risk management plan, Stakeholder engagement plan)',
                    'Project documents updates (Assumption log, Issue log, Risk register)',
                ],
            ],
            '13.2' => [
                'inputs' => [
                    'Project charter',
                    'Project management plan (Resource management plan, Communications management plan, Risk management plan)',
                    'Project documents (Assumption log, Change log, Issue log, Project schedule, Risk register, Stakeholder register)',
                    'Agreements',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Data gathering (Benchmarking)',
                    'Data analysis (Assumption and constraint analysis, Root cause analysis)',
                    'Decision making (Prioritization/ranking)',
                    'Data representation (Mind mapping, Stakeholder engagement assignment matrix)',
                    'Meetings',
                ],
                'outputs' => [
                    'Stakeholder engagement plan',
                ],
            ],
            '13.3' => [
                'inputs' => [
                    'Project management plan (Communication management plan, Risk management plan, Stakeholder engagement plan, Change management plan)',
                    'Project documents (Change log, Issue log, Lessons learned register, Stakeholder register)',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Expert judgment',
                    'Communication skills',
                    'Interpersonal and team skills (Conflict management, Cultural awareness, Negotiation, Observation/conversation, Political Awareness)',
                    'Ground rules',
                    'Meetings',
                ],
                'outputs' => [
                    'Change requests',
                    'Project management plan updates (Communication management plan, Stakeholder engagement plan)',
                    'Project documents updates (Change log, Issue log, Lessons learned register, Stakeholder register)',
                ],
            ],
            '13.4' => [
                'inputs' => [
                    'Project management plan (Research management plan, Communication management plan, Stakeholder engagement plan)',
                    'Project documents (Issue log, Lessons learned register, Project communications, Risk register, Stakeholder register)',
                    'Work performance data',
                    'Enterprise environmental factors',
                    'Organizational process assets',
                ],
                'tools' => [
                    'Data analysis (Alternatives analysis, Root cause analysis, Stakeholder analysis)',
                    'Decision making (Multicriteria decision analysis, Voting)',
                    'Data representation (Stakeholder engagement assignment matrix)',
                    'Communication skills (Feedback, Presentations)',
                    'Interpersonal and team skills (Active listening, Cultural awareness, Leadership, Networking, Political Awareness)',
                    'Meetings',
                ],
                'outputs' => [
                    'Work performance information',
                    'Change requests',
                    'Project management plan updates (Issue log, Lessons learned register, Risk register, Stakeholder register)',
                    'Project documents updates',
                ],
            ],
        ];

        return $ittos[$processId] ?? [
            'inputs' => ['No inputs defined for this process'],
            'tools' => ['No tools defined for this process'],
            'outputs' => ['No outputs defined for this process'],
        ];
    }

    private function getPmbokProcesses()
    {
        return [
            ['id' => '4.1', 'name' => 'Develop Project Charter', 'group' => 'Initiating', 'area' => 'Integration'],
            ['id' => '4.2', 'name' => 'Develop Project Management Plan', 'group' => 'Planning', 'area' => 'Integration'],
            ['id' => '4.3', 'name' => 'Direct and Manage Project Work', 'group' => 'Executing', 'area' => 'Integration'],
            ['id' => '4.4', 'name' => 'Manage Project Knowledge', 'group' => 'Executing', 'area' => 'Integration'],
            ['id' => '4.5', 'name' => 'Monitor and Control Project Work', 'group' => 'Monitoring', 'area' => 'Integration'],
            ['id' => '4.6', 'name' => 'Perform Integrated Change Control', 'group' => 'Monitoring', 'area' => 'Integration'],
            ['id' => '4.7', 'name' => 'Close Project or Phase', 'group' => 'Closing', 'area' => 'Integration'],
            ['id' => '5.1', 'name' => 'Plan Scope Management', 'group' => 'Planning', 'area' => 'Scope'],
            ['id' => '5.2', 'name' => 'Collect Requirements', 'group' => 'Planning', 'area' => 'Scope'],
            ['id' => '5.3', 'name' => 'Define Scope', 'group' => 'Planning', 'area' => 'Scope'],
            ['id' => '5.4', 'name' => 'Create WBS', 'group' => 'Planning', 'area' => 'Scope'],
            ['id' => '5.5', 'name' => 'Validate Scope', 'group' => 'Monitoring', 'area' => 'Scope'],
            ['id' => '5.6', 'name' => 'Control Scope', 'group' => 'Monitoring', 'area' => 'Scope'],
            ['id' => '6.1', 'name' => 'Plan Schedule Management', 'group' => 'Planning', 'area' => 'Schedule'],
            ['id' => '6.2', 'name' => 'Define Activities', 'group' => 'Planning', 'area' => 'Schedule'],
            ['id' => '6.3', 'name' => 'Sequence Activities', 'group' => 'Planning', 'area' => 'Schedule'],
            ['id' => '6.4', 'name' => 'Estimate Activity Durations', 'group' => 'Planning', 'area' => 'Schedule'],
            ['id' => '6.5', 'name' => 'Develop Schedule', 'group' => 'Planning', 'area' => 'Schedule'],
            ['id' => '6.6', 'name' => 'Control Schedule', 'group' => 'Monitoring', 'area' => 'Schedule'],
            ['id' => '7.1', 'name' => 'Plan Cost Management', 'group' => 'Planning', 'area' => 'Cost'],
            ['id' => '7.2', 'name' => 'Estimate Costs', 'group' => 'Planning', 'area' => 'Cost'],
            ['id' => '7.3', 'name' => 'Determine Budget', 'group' => 'Planning', 'area' => 'Cost'],
            ['id' => '7.4', 'name' => 'Control Costs', 'group' => 'Monitoring', 'area' => 'Cost'],
            ['id' => '8.1', 'name' => 'Plan Quality Management', 'group' => 'Planning', 'area' => 'Quality'],
            ['id' => '8.2', 'name' => 'Manage Quality', 'group' => 'Executing', 'area' => 'Quality'],
            ['id' => '8.3', 'name' => 'Control Quality', 'group' => 'Monitoring', 'area' => 'Quality'],
            ['id' => '9.1', 'name' => 'Plan Resource Management', 'group' => 'Planning', 'area' => 'Resource'],
            ['id' => '9.2', 'name' => 'Estimate Activity Resources', 'group' => 'Planning', 'area' => 'Resource'],
            ['id' => '9.3', 'name' => 'Acquire Resources', 'group' => 'Executing', 'area' => 'Resource'],
            ['id' => '9.4', 'name' => 'Develop Team', 'group' => 'Executing', 'area' => 'Resource'],
            ['id' => '9.5', 'name' => 'Manage Team', 'group' => 'Executing', 'area' => 'Resource'],
            ['id' => '9.6', 'name' => 'Control Resources', 'group' => 'Monitoring', 'area' => 'Resource'],
            ['id' => '10.1', 'name' => 'Plan Communications Management', 'group' => 'Planning', 'area' => 'Communications'],
            ['id' => '10.2', 'name' => 'Manage Communications', 'group' => 'Executing', 'area' => 'Communications'],
            ['id' => '10.3', 'name' => 'Monitor Communications', 'group' => 'Monitoring', 'area' => 'Communications'],
            ['id' => '11.1', 'name' => 'Plan Risk Management', 'group' => 'Planning', 'area' => 'Risk'],
            ['id' => '11.2', 'name' => 'Identify Risks', 'group' => 'Planning', 'area' => 'Risk'],
            ['id' => '11.3', 'name' => 'Perform Qualitative Risk Analysis', 'group' => 'Planning', 'area' => 'Risk'],
            ['id' => '11.4', 'name' => 'Perform Quantitative Risk Analysis', 'group' => 'Planning', 'area' => 'Risk'],
            ['id' => '11.5', 'name' => 'Plan Risk Responses', 'group' => 'Planning', 'area' => 'Risk'],
            ['id' => '11.6', 'name' => 'Implement Risk Responses', 'group' => 'Executing', 'area' => 'Risk'],
            ['id' => '11.7', 'name' => 'Monitor Risks', 'group' => 'Monitoring', 'area' => 'Risk'],
            ['id' => '12.1', 'name' => 'Plan Procurement Management', 'group' => 'Planning', 'area' => 'Procurement'],
            ['id' => '12.2', 'name' => 'Conduct Procurements', 'group' => 'Executing', 'area' => 'Procurement'],
            ['id' => '12.3', 'name' => 'Control Procurements', 'group' => 'Monitoring', 'area' => 'Procurement'],
            ['id' => '13.1', 'name' => 'Identify Stakeholders', 'group' => 'Initiating', 'area' => 'Stakeholder'],
            ['id' => '13.2', 'name' => 'Plan Stakeholder Engagement', 'group' => 'Planning', 'area' => 'Stakeholder'],
            ['id' => '13.3', 'name' => 'Manage Stakeholder Engagement', 'group' => 'Executing', 'area' => 'Stakeholder'],
            ['id' => '13.4', 'name' => 'Monitor Stakeholder Engagement', 'group' => 'Monitoring', 'area' => 'Stakeholder'],
        ];
    }

    public function getTitle(): string
    {
        return "Process {$this->process['id']}: {$this->process['name']}";
    }

    public function printNotes()
    {
        // This method doesn't need to do anything server-side
        // We'll handle the print via the frontend
    }

    public function render()
    {
        // Get user's projects
        $userProjects = Project::where('user_id', auth()->id())->get();

        $query = PmbokNote::where('user_id', auth()->id())
            ->where('process_id', $this->processId)
            ->with('project')
            ->orderBy('created_at', 'desc');

        if (! empty($this->process['project_id'])) {
            $query->where('project_id', $this->process['project_id']);
        }

        $processNotes = $query->get();

        return view('livewire.pmbok-spa.process-page', [
            'processNotes' => $processNotes,
            'userProjects' => $userProjects,
        ]);
    }
}
