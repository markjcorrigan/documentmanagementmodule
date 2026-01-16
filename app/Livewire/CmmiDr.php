<?php

namespace App\Livewire;

use Livewire\Component;

class CmmiDr extends Component
{
    public $htmlFiles = [];

    public $modulePdfs = [];

    public $referenceDocuments = [];

    public $processAreaPdfs = [];

    public function mount()
    {
        // HTML files in main cmmidev folder
        $this->htmlFiles = [
            'books.html',
            'car.html',
            'cm.html',
            'dar.html',
            'ippd.html',
            'ma.html',
            'oid.html',
            'opd_ippd.html',
            'opf.html',
            'opp.html',
            'ot.html',
            'pi.html',
            'pmc.html',
            'ppqa.html',
            'qpm.html',
            'rd.html',
            'reqm.html',
            'rskm.html',
            'sam.html',
            'ts.html',
            'val.html',
            'ver.html',
        ];

        // Module PDFs (module1.pdf to module12.pdf)
        for ($i = 1; $i <= 12; $i++) {
            $this->modulePdfs[] = "module{$i}.pdf";
        }

        // Reference documents
        $this->referenceDocuments = [
            'cmmifordevelopmentimplementationguide2017.pdf',
            'cmmidevcombined.pdf',
        ];

        // Process area names for folder/file structure
        $this->processAreaPdfs = [
            'car' => 'Causal Analysis and Resolution',
            'cm' => 'Configuration Management',
            'dar' => 'Decision Analysis and Resolution',
            'ippd' => 'Integrated Product and Process Development',
            'ma' => 'Measurement and Analysis',
            'oid' => 'Organizational Innovation and Deployment',
            'opd_ippd' => 'Organizational Process Definition',
            'opf' => 'Organizational Process Focus',
            'opp' => 'Organizational Process Performance',
            'ot' => 'Organizational Training',
            'pi' => 'Product Integration',
            'pmc' => 'Project Monitoring and Control',
            'ppqa' => 'Process and Product Quality Assurance',
            'qpm' => 'Quantitative Project Management',
            'rd' => 'Requirements Development',
            'reqm' => 'Requirements Management',
            'rskm' => 'Risk Management',
            'sam' => 'Supplier Agreement Management',
            'ts' => 'Technical Solution',
            'val' => 'Validation',
            'ver' => 'Verification',
        ];
    }

    public function getFileUrl($path)
    {
        // Use the same route as your parent component
        return route('cmmi.files', ['path' => $path]);
    }

    public function render()
    {
        return view('livewire.cmmi-dr');
    }
}
