<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'SBOK 4'])]
class Sbokfour extends FrontendComponent
{
    public $selectedProcess = null;

    public $showImportantOnly = false;

    public $processData;

    public function mount()
    {
        $this->processData = $this->getProcessData();
    }

    public function selectProcess($processId)
    {
        $this->selectedProcess = $processId;
    }

    public function toggleFilter($showImportant)
    {
        $this->showImportantOnly = $showImportant;
    }

    private function getProcessData()
    {
        return [
            '8.1' => [
                'process' => 'Create Project Vision',
                'group' => 'Initiate (Chapter 8)',
                'inputs' => ['Project Business Case*', 'Trial Project', 'Proof of Concept', 'Company Vision', 'Company Mission', 'Market Study', 'Scrum Guidance Body Recommendations'],
                'tools' => ['Project Vision Meeting*', 'JAD Sessions', 'SWOT Analysis', 'Gap Analysis'],
                'outputs' => ['Identified Product Owner*', 'Project Vision Statement*', 'Project Charter', 'Project Budget'],
            ],
            '8.2' => [
                'process' => 'Identify Scrum Master and Business Stakeholder(s)',
                'group' => 'Initiate (Chapter 8)',
                'inputs' => ['Product Owner*', 'Project Vision Statement*', 'People Requirements', 'People Availability and Commitment', 'Organizational Resource Matrix', 'Skills Requirement Matrix', 'Scrum Guidance Body Recommendations'],
                'tools' => ['Selection Criteria*', 'Expert Advice from HR', 'Training', 'Resource Costing'],
                'outputs' => ['Identified Scrum Master*', 'Identified Business Stakeholder(s)*'],
            ],
            '8.3' => [
                'process' => 'Form Scrum Team',
                'group' => 'Initiate (Chapter 8)',
                'inputs' => ['Product Owner', 'Scrum Master', 'Project Vision Statement', 'People Requirements', 'People Availability and Commitment', 'Organizational Resource Matrix', 'Skills Requirement Matrix', 'Resource Requirements', 'Scrum Guidance Body Recommendations'],
                'tools' => ['Scrum Team Selection Criteria*', 'Expert Advice from HR', 'People Costs', 'Training', 'Resource Costing', 'Scrum Project Tool'],
                'outputs' => ['Identified Scrum Team*', 'Back-ups', 'Collaboration Plan', 'Team Building Plan'],
            ],
            '8.4' => [
                'process' => 'Develop Epic(s)',
                'group' => 'Initiate (Chapter 8)',
                'inputs' => ['Scrum Core Team*', 'Project Vision Statement*', 'Business Stakeholder(s)*', 'Approved Change Requests', 'Unapproved Change Requests', 'Laws and Regulations', 'Applicable Contracts', 'Previous Project Information', 'Scrum Guidance Body Recommendations'],
                'tools' => ['User Group Meetings*', 'User Story Workshops', 'Focus Group Meetings', 'User or Customer Interviews', 'Questionnaires', 'Risk Identification Techniques', 'Scrum Guidance Body Expertise', 'Scrum Project Tool'],
                'outputs' => ['Epic(s)*', 'Personas*', 'Approved Changes', 'Identified Risks'],
            ],
            '8.5' => [
                'process' => 'Create Prioritized Product Backlog',
                'group' => 'Initiate (Chapter 8)',
                'inputs' => ['Scrum Core Team*', 'Epic(s)*', 'Personas*', 'Business Stakeholder(s)', 'Project Vision Statement', 'Business Requirements', 'Approved Change Requests', 'Identified Risks', 'Applicable Contracts', 'Scrum Guidance Body Recommendations'],
                'tools' => ['Prioritization Methods*', 'User Story Workshops', 'Risk Assessment Techniques', 'Project Value Estimation', 'Estimation Methods', 'Dependency Determination', 'Scrum Guidance Body Expertise', 'Scrum Project Tool'],
                'outputs' => ['Prioritized Product Backlog*', 'Done Criteria*', 'Definition of Ready*', 'High-Level Estimates for Epics'],
            ],
            '8.6' => [
                'process' => 'Conduct Release Planning',
                'group' => 'Initiate (Chapter 8)',
                'inputs' => ['Scrum Core Team*', 'Business Stakeholder(s)*', 'Project Vision Statement*', 'Prioritized Product Backlog*', 'Done Criteria*', 'Business Requirements', 'Holiday Calendar', 'Scrum Guidance Body Recommendations', 'High-Level Estimates for Epics'],
                'tools' => ['Release Planning Sessions*', 'Release Prioritization Methods*', 'Scrum Project Tool'],
                'outputs' => ['Release Planning Schedule*', 'Length of Sprint*', 'Target Customers for Release', 'Refined Prioritized Product Backlog'],
            ],
            '9.1' => [
                'process' => 'Create User Stories',
                'group' => 'Plan and Estimate (Chapter 9)',
                'inputs' => ['Scrum Core Team*', 'Prioritized Product Backlog*', 'Done Criteria*', 'Personas*', 'Definition of Ready*', 'Business Stakeholder(s)', 'Epic(s)', 'Business Requirements', 'Laws and Regulations', 'Applicable Contracts', 'Scrum Guidance Body Recommendations'],
                'tools' => ['User Story Writing Expertise*', 'User Story Workshops', 'User Group Meetings', 'Focus Group Meetings', 'Customer or User Interviews', 'Questionnaires', 'Scrum Guidance Body Expertise', 'Scrum Project Tool'],
                'outputs' => ['User Stories*', 'User Story Acceptance Criteria*', 'Updated Prioritized Product Backlog', 'Updated or Refined Personas'],
            ],
            '9.2' => [
                'process' => 'Approve, Estimate, and Commit User Stories',
                'group' => 'Plan and Estimate (Chapter 9)',
                'inputs' => ['Scrum Core Team*', 'User Stories*', 'User Story Acceptance Criteria*', 'Definition of Ready', 'Scrum Guidance Body Recommendations', 'Pre-existing Estimates for User Stories'],
                'tools' => ['Estimation Methods*', 'Sprint Planning Meetings', 'Prioritized Product Backlog Review Meetings', 'Scrum Project Tool'],
                'outputs' => ['Estimated User Stories*', 'Updated Prioritized Product Backlog'],
            ],
            '9.3' => [
                'process' => 'Create Tasks',
                'group' => 'Plan and Estimate (Chapter 9)',
                'inputs' => ['Scrum Core Team*', 'Estimated User Stories*', 'Length of Sprint*', 'Previous Sprint Velocity', 'Scrum Guidance Body Recommendations'],
                'tools' => ['Sprint Planning Meetings*', 'Scrum Project Tool'],
                'outputs' => ['Committed User Stories*', 'Sprint Backlog*', 'Scrumboard*'],
            ],
            '9.4' => [
                'process' => 'Estimate Tasks',
                'group' => 'Plan and Estimate (Chapter 9)',
                'inputs' => ['Scrum Core Team', 'Task List', 'User Story Acceptance Criteria', 'Dependencies', 'Identified Risks', 'Scrum Guidance Body Recommendations'],
                'tools' => ['Task Estimation Meetings', 'Estimation Criteria', 'Planning Poker', 'Point of Five', 'Other Task Estimation Techniques'],
                'outputs' => ['Effort Estimated Task List', 'Updated Task List'],
            ],
            '9.5' => [
                'process' => 'Create Sprint Backlog',
                'group' => 'Plan and Estimate (Chapter 9)',
                'inputs' => ['Scrum Core Team', 'Effort Estimated Task List', 'Length of Sprint', 'Previous Sprint Velocity', 'Dependencies', 'Team Calendar'],
                'tools' => ['Sprint Planning Meetings', 'Sprint Tracking Tools', 'Sprint Tracking Metrics'],
                'outputs' => ['Sprint Backlog', 'Sprint Burndown Chart'],
            ],
            '10.1' => [
                'process' => 'Create Deliverables',
                'group' => 'Implement (Chapter 10)',
                'inputs' => ['Scrum Core Team*', 'Sprint Backlog*', 'Scrumboard*', 'Impediment Log*', 'Release Planning Schedule', 'Dependencies', 'Scrum Guidance Body Recommendations'],
                'tools' => ['Team Expertise*', 'Other Development Tools', 'Scrum Guidance Body Expertise', 'Scrum Project Tool'],
                'outputs' => ['Sprint Deliverables*', 'Updated Scrumboard*', 'Updated Impediment Log*', 'Unapproved Change Requests', 'Identified Risks', 'Mitigated Risks', 'Updated Dependencies'],
            ],
            '10.2' => [
                'process' => 'Conduct Daily Standup',
                'group' => 'Implement (Chapter 10)',
                'inputs' => ['Scrum Team*', 'Scrum Master*', 'Scrumboard*', 'Impediment Log*', 'Sprint Burndown or Burnup Chart', 'Product Owner', 'Previous Work Day Experience', 'Dependencies'],
                'tools' => ['Daily Standup Meeting*', 'Three Daily Questions*', 'War Room', 'Video Conferencing', 'Scrum Project Tool'],
                'outputs' => ['Updated Scrumboard*', 'Updated Impediment Log*', 'Updated Sprint Burndown or Burnup Chart*', 'Motivated Scrum Team', 'Unapproved Change Requests', 'Identified Risks', 'Mitigated Risks', 'Updated Dependencies'],
            ],
            '10.3' => [
                'process' => 'Groom Prioritized Product Backlog',
                'group' => 'Implement (Chapter 10)',
                'inputs' => ['Scrum Core Team*', 'Prioritized Product Backlog*', 'Business Stakeholders*', 'Rejected User Stories', 'Approved Change Requests', 'Unapproved Change Requests', 'Identified Risks', 'Retrospect Sprint Log(s)', 'Dependencies', 'Release Planning Schedule', 'Scrum Guidance Body Recommendations'],
                'tools' => ['Prioritized Product Backlog Review Meetings*', 'Communication Techniques', 'Other Prioritized Product Backlog Refining Techniques', 'Scrum Project Tool'],
                'outputs' => ['Updated Prioritized Product Backlog*', 'Updated Release Planning Schedule'],
            ],
            '11.1' => [
                'process' => 'Demonstrate and Validate Sprint',
                'group' => 'Review and Retrospect (Chapter 11)',
                'inputs' => ['Scrum Core Team*', 'Sprint Deliverables*', 'Sprint Backlog*', 'Done Criteria*', 'User Story Acceptance Criteria*', 'Business Stakeholder(s)', 'Release Planning Schedule', 'Identified Risks', 'Dependencies', 'Scrum Guidance Body Recommendations'],
                'tools' => ['User Story Acceptance/Rejection*', 'Sprint Review Meetings*', 'Earned Value Analysis', 'Scrum Guidance Body Expertise', 'Scrum Project Tool'],
                'outputs' => ['Accepted User Stories*', 'Rejected User Stories', 'Updated Risks', 'Earned Value Analysis Results', 'Updated Release Planning Schedule'],
            ],
            '11.2' => [
                'process' => 'Retrospect Sprint',
                'group' => 'Review and Retrospect (Chapter 11)',
                'inputs' => ['Scrum Core Team', 'Sprint Deliverables', 'Sprint Review Meeting Outcomes', 'Stakeholder(s)', 'Scrum Guidance Body Recommendations'],
                'tools' => ['Retrospective Meeting', 'Brainstorming Techniques', 'Continuous Improvement Techniques'],
                'outputs' => ['Agreed Adjustments', 'Updated Scrum Process', 'Lessons Learned'],
            ],
            '11.3' => [
                'process' => 'Document Sprint Lessons Learned',
                'group' => 'Review and Retrospect (Chapter 11)',
                'inputs' => ['Scrum Core Team', 'Sprint Deliverables', 'Sprint Review Meeting Outcomes', 'Retrospect Sprint Outcomes', 'Stakeholder(s)', 'Scrum Guidance Body Recommendations'],
                'tools' => ['Documentation Techniques', 'Lessons Learned Repository'],
                'outputs' => ['Documented Sprint Lessons Learned', 'Updated Lessons Learned Repository'],
            ],
            '12.1' => [
                'process' => 'Ship Deliverables',
                'group' => 'Release (Chapter 12)',
                'inputs' => ['Product Owner*', 'Business Stakeholder(s)*', 'Accepted Deliverables*', 'Release Planning Schedule*', 'Scrum Master', 'Scrum Team', 'User Story Acceptance Criteria', 'Pilot Plan', 'Scrum Guidance Body Recommendations'],
                'tools' => ['Organizational Deployment Methods*', 'Communications Planning', 'Scrum Project Tool'],
                'outputs' => ['Working Deliverables Agreement*', 'Working Deliverables*', 'Product Releases*', 'Communications Plan'],
            ],
            '12.2' => [
                'process' => 'Retrospect Project',
                'group' => 'Release (Chapter 12)',
                'inputs' => ['Scrum Core Team(s)*', 'Chief Scrum Master', 'Chief Product Owner', 'Business Stakeholder(s)', 'Scrum Guidance Body Recommendations'],
                'tools' => ['Retrospect Release Meeting*', 'Other Tools for Retrospect Release', 'Scrum Guidance Body Expertise', 'Scrum Project Tool'],
                'outputs' => ['Agreed Actionable Improvements*', 'Assigned Action Items and Due Dates*', 'Proposed Non-Functional Items for Program Product Backlog and Prioritized Product Backlog', 'Updated Scrum Guidance Body Recommendations'],
            ],
        ];
    }

    #[Layout('components.layouts.app.frontend', ['title' => 'SBok 4'])]
    public function render()
    {
        return view('livewire.sbok-four');
    }
}
