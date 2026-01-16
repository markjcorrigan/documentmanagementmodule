<?php

namespace App\Livewire\PmbokSpa;

use Livewire\Component;

class DashboardMap extends Component
{
    public $processes = [];

    public $selectedProcess = null;

    public $highlightedProcessId = null; // NEW: For highlighting on process page

    public $showAsReadOnly = false; // NEW: For process page view

    public function mount($highlightedProcessId = null, $readOnly = false)
    {
        $this->processes = $this->getPmbokProcesses();
        $this->highlightedProcessId = $highlightedProcessId;
        $this->showAsReadOnly = $readOnly;

        // If highlighting a process, set it as selected
        if ($this->highlightedProcessId) {
            $this->selectedProcess = $this->highlightedProcessId;
        }
    }

    public function selectProcess($id)
    {
        // If in read-only mode (on process page), navigate to that process
        if ($this->showAsReadOnly) {
            return $this->redirect(route('pmbok.spa.process', ['processId' => $id]));
        }

        // Otherwise, normal dashboard behavior
        return $this->redirect(route('pmbok.spa.process', ['processId' => $id]));
    }

    protected function getPmbokProcesses()  // NB This drives the pmbok-spa dashboard
    {
        return [
            // Integration Management (7 processes)
            ['id' => '4.1', 'code' => '4.1', 'name' => 'Develop Project Charter', 'x' => 139, 'y' => 117, 'x2' => 262, 'y2' => 219], // done
            ['id' => '4.2', 'code' => '4.2', 'name' => 'Develop Project Management Plan', 'x' => 263, 'y' => 117, 'x2' => 385, 'y2' => 219], // done
            ['id' => '4.3', 'code' => '4.3', 'name' => 'Direct and Manage Project Work', 'x' => 386, 'y' => 117, 'x2' => 509, 'y2' => 167], // done
            ['id' => '4.4', 'code' => '4.4', 'name' => 'Manage Project Knowledge', 'x' => 385, 'y' => 168, 'x2' => 509, 'y2' => 219], // done
            ['id' => '4.5', 'code' => '4.5', 'name' => 'Monitor and Control Project Work', 'x' => 510, 'y' => 117, 'x2' => 632, 'y2' => 167], // done
            ['id' => '4.6', 'code' => '4.6', 'name' => 'Perform Integrated Change Control', 'x' => 510, 'y' => 168, 'x2' => 633, 'y2' => 218], // done
            ['id' => '4.7', 'code' => '4.7', 'name' => 'Close Project or Phase', 'x' => 633, 'y' => 117, 'x2' => 755, 'y2' => 219], // done

            // Scope Management (6 processes)
            ['id' => '5.1', 'code' => '5.1', 'name' => 'Plan Scope Management', 'x' => 263, 'y' => 219, 'x2' => 386, 'y2' => 256], // done
            ['id' => '5.2', 'code' => '5.2', 'name' => 'Collect Requirements', 'x' => 263, 'y' => 257, 'x2' => 386, 'y2' => 283], // done
            ['id' => '5.3', 'code' => '5.3', 'name' => 'Define Scope', 'x' => 263, 'y' => 283, 'x2' => 386, 'y2' => 300], // done
            ['id' => '5.4', 'code' => '5.4', 'name' => 'Create WBS', 'x' => 262, 'y' => 300, 'x2' => 384, 'y2' => 318],  // done
            ['id' => '5.5', 'code' => '5.5', 'name' => 'Validate Scope', 'x' => 509, 'y' => 220, 'x2' => 634, 'y2' => 242], // done
            ['id' => '5.6', 'code' => '5.6', 'name' => 'Control Scope', 'x' => 509, 'y' => 239, 'x2' => 634, 'y2' => 320],  // done

            // Schedule Management (6 processes)
            ['id' => '6.1', 'code' => '6.1', 'name' => 'Plan Schedule Management', 'x' => 263, 'y' => 320, 'x2' => 385, 'y2' => 357],  // done
            ['id' => '6.2', 'code' => '6.2', 'name' => 'Define Activities', 'x' => 263, 'y' => 357, 'x2' => 385, 'y2' => 387], // done
            ['id' => '6.3', 'code' => '6.3', 'name' => 'Sequence Activities', 'x' => 263, 'y' => 387, 'x2' => 385, 'y2' => 418], // done
            ['id' => '6.4', 'code' => '6.4', 'name' => 'Estimate Activity Durations', 'x' => 262, 'y' => 416, 'x2' => 385, 'y2' => 446], // done
            ['id' => '6.5', 'code' => '6.5', 'name' => 'Develop Schedule', 'x' => 263, 'y' => 445, 'x2' => 385, 'y2' => 480], // done
            ['id' => '6.6', 'code' => '6.6', 'name' => 'Control Schedule', 'x' => 510, 'y' => 320, 'x2' => 635, 'y2' => 480], // done

            // Cost Management (4 processes)
            ['id' => '7.1', 'code' => '7.1', 'name' => 'Plan Cost Management', 'x' => 261, 'y' => 479, 'x2' => 386, 'y2' => 520],  // done
            ['id' => '7.2', 'code' => '7.2', 'name' => 'Estimate Costs', 'x' => 263, 'y' => 517, 'x2' => 386, 'y2' => 532],  // done
            ['id' => '7.3', 'code' => '7.3', 'name' => 'Determine Budget', 'x' => 263, 'y' => 533, 'x2' => 386, 'y2' => 569], // done
            ['id' => '7.4', 'code' => '7.4', 'name' => 'Control Costs', 'x' => 509, 'y' => 479, 'x2' => 632, 'y2' => 569], // done

            // Quality Management (3 processes)
            ['id' => '8.1', 'code' => '8.1', 'name' => 'Plan Quality Management', 'x' => 263, 'y' => 569, 'x2' => 386, 'y2' => 630], // done
            ['id' => '8.2', 'code' => '8.2', 'name' => 'Manage Quality', 'x' => 385, 'y' => 569, 'x2' => 509, 'y2' => 630], // done
            ['id' => '8.3', 'code' => '8.3', 'name' => 'Control Quality', 'x' => 509, 'y' => 569, 'x2' => 632, 'y2' => 630], // done

            // Resource Management (6 processes)
            ['id' => '9.1', 'code' => '9.1', 'name' => 'Plan Resource Management', 'x' => 263, 'y' => 629, 'x2' => 386, 'y2' => 663], // done
            ['id' => '9.2', 'code' => '9.2', 'name' => 'Estimate Activity Resources', 'x' => 263, 'y' => 664, 'x2' => 387, 'y2' => 700], // done
            ['id' => '9.3', 'code' => '9.3', 'name' => 'Acquire Resources', 'x' => 387, 'y' => 629, 'x2' => 509, 'y2' => 663], // done
            ['id' => '9.4', 'code' => '9.4', 'name' => 'Develop Team', 'x' => 385, 'y' => 664, 'x2' => 509, 'y2' => 679],  // done
            ['id' => '9.5', 'code' => '9.5', 'name' => 'Manage Team', 'x' => 386, 'y' => 680, 'x2' => 509, 'y2' => 700],  // done
            ['id' => '9.6', 'code' => '9.6', 'name' => 'Control Resources', 'x' => 510, 'y' => 629, 'x2' => 633, 'y2' => 700], // done

            // Communications Management (3 processes)
            ['id' => '10.1', 'code' => '10.1', 'name' => 'Plan Communications Management', 'x' => 262, 'y' => 700, 'x2' => 387, 'y2' => 760], // done
            ['id' => '10.2', 'code' => '10.2', 'name' => 'Manage Communications', 'x' => 386, 'y' => 700, 'x2' => 509, 'y2' => 760], // done
            ['id' => '10.3', 'code' => '10.3', 'name' => 'Monitor Communications', 'x' => 508, 'y' => 700, 'x2' => 633, 'y2' => 760], // done

            // Risk Management (7 processes)
            ['id' => '11.1', 'code' => '11.1', 'name' => 'Plan Risk Management', 'x' => 263, 'y' => 759, 'x2' => 385, 'y2' => 798], // done
            ['id' => '11.2', 'code' => '11.2', 'name' => 'Identify Risks', 'x' => 263, 'y' => 798, 'x2' => 385, 'y2' => 816], // done
            ['id' => '11.3', 'code' => '11.3', 'name' => 'Perform Qualitative Risk Analysis', 'x' => 263, 'y' => 814, 'x2' => 384, 'y2' => 858], // done
            ['id' => '11.4', 'code' => '11.4', 'name' => 'Perform Quantitative Risk Analysis', 'x' => 263, 'y' => 857, 'x2' => 385, 'y2' => 901], // done
            ['id' => '11.5', 'code' => '11.5', 'name' => 'Plan Risk Responses', 'x' => 263, 'y' => 899, 'x2' => 386, 'y2' => 938], // done
            ['id' => '11.6', 'code' => '11.6', 'name' => 'Implement Risk Responses', 'x' => 385, 'y' => 759, 'x2' => 510, 'y2' => 938], // done
            ['id' => '11.7', 'code' => '11.7', 'name' => 'Monitor Risks', 'x' => 510, 'y' => 760, 'x2' => 632, 'y2' => 938], // done

            // Procurement Management (3 processes)
            ['id' => '12.1', 'code' => '12.1', 'name' => 'Plan Procurement Management', 'x' => 263, 'y' => 938, 'x2' => 387, 'y2' => 1000], // done
            ['id' => '12.2', 'code' => '12.2', 'name' => 'Conduct Procurements', 'x' => 385, 'y' => 936, 'x2' => 511, 'y2' => 1000], // done
            ['id' => '12.3', 'code' => '12.3', 'name' => 'Control Procurements', 'x' => 510, 'y' => 938, 'x2' => 635, 'y2' => 1000],  // done

            // Stakeholder Management (4 processes)
            ['id' => '13.1', 'code' => '13.1', 'name' => 'Identify Stakeholders', 'x' => 137, 'y' => 998, 'x2' => 261, 'y2' => 1060], // done
            ['id' => '13.2', 'code' => '13.2', 'name' => 'Plan Stakeholder Engagement', 'x' => 263, 'y' => 998, 'x2' => 387, 'y2' => 1060], // done
            ['id' => '13.3', 'code' => '13.3', 'name' => 'Manage Stakeholder Engagement', 'x' => 385, 'y' => 998, 'x2' => 508, 'y2' => 1060], // done
            ['id' => '13.4', 'code' => '13.4', 'name' => 'Monitor Stakeholder Engagement', 'x' => 509, 'y' => 998, 'x2' => 632, 'y2' => 1060], // done
        ];
    }

    public function render()
    {
        return view('livewire.pmbok-spa.dashboard-map');
    }
}
