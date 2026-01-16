<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'CV Index'])]
class CvIndex extends FrontendComponent
{
    public array $certificates = [];

    public array $carouselImages = [];

    public int $currentSlide = 0;

    public bool $collapseCerts = false;

    public function mount()
    {
        // ================= Certificates =================
        $this->certificates = [
            ['file' => 'markcorriganpic600ht.jpg', 'label' => "Mark's Picture"],
            ['file' => 'mastersgraduationme.jpg', 'label' => "Mark's Recent Graduation Picture"],
            ['file' => 'cv.pdf', 'label' => "Mark's Curriculum Vitae (CV) in PDF format", 'note' => '(Contact me if you require this in MS Word)'],
            ['file' => 'msc.pdf', 'label' => 'Master of Science Degree.pdf'],
            ['file' => 'paper.pdf#page=299', 'label' => 'Published paper from Dissertation', 'note' => '(Project Management Information System, Springer Journal page 295)'],
            ['file' => 'bcomhons2020.pdf', 'label' => 'BCom Informatics Honors Degree.pdf'],
            ['file' => 'bcom.pdf', 'label' => 'BCom Informatics Degree.pdf'],
            ['file' => 'ba2020.pdf', 'label' => 'BA Degree.pdf'],
            ['file' => 'pmp2026.pdf', 'label' => 'Project Management Professional Certification Nr1722574.pdf'],
            ['file' => 'prince22020.pdf', 'label' => 'PRINCE2 Practitioner.pdf'],
            ['file' => 'agilepm2020.pdf', 'label' => 'AgilePM Practitioner.pdf'],
            ['file' => 'sm2020.pdf', 'label' => 'SCRUM Master.pdf'],
            ['file' => 'spo2020.pdf', 'label' => 'SCRUM Product Owner.pdf'],
            ['file' => 'ssm.pdf', 'label' => 'SAFe Scrum Master.pdf'],
            ['file' => 'sasm.pdf', 'label' => 'SAFe Advanced Scrum Master.pdf'],
            ['file' => 'popmcert.pdf', 'label' => 'SAFe Product Owner Product Manager.pdf'],
            ['file' => 'sdp.pdf', 'label' => 'SAFe DevOps Practitioner.pdf'],
            ['file' => 'ITILFourStrategicLeader.pdf', 'label' => 'ITIL 4 Strategic Leader.pdf'],
            ['file' => 'ITILFourManagingProfessional.pdf', 'label' => 'ITIL 4 Managing Professional.pdf'],
            ['file' => 'itilss2020.pdf', 'label' => 'ITIL 3 Intermediate Lifecycle Stream - Service Strategy.pdf'],
            ['file' => 'itilsd2020.pdf', 'label' => 'ITIL 3 Intermediate Lifecycle Stream - Service Design.pdf'],
            ['file' => 'itilst2020.pdf', 'label' => 'ITIL 3 Intermediate Lifecycle Stream - Service Transition.pdf'],
            ['file' => 'itilso2020.pdf', 'label' => 'ITIL 3 Intermediate Lifecycle Stream - Service Operation.pdf'],
            ['file' => 'itilcsi2020.pdf', 'label' => 'ITIL 3 Intermediate Lifecycle Stream - Continual Service Improvement.pdf'],
            ['file' => 'itilpract2019.pdf', 'label' => 'ITIL 3 Practitioner.pdf'],
            ['file' => 'itilfoundation.pdf', 'label' => 'ITIL 3 Foundation.pdf'],
            ['file' => 'cobit52020.pdf', 'label' => 'COBIT 5 Foundation.pdf'],
            ['file' => 'cmmi2020.pdf', 'label' => 'CMM and CMMi Certificates.pdf'],
            ['file' => 'microsoft.pdf', 'label' => 'Microsoft Certifications.pdf'],
            ['file' => 'id certificate.pdf', 'label' => 'ID Certificate.pdf'],
            ['file' => 'drivers license.pdf', 'label' => 'Drivers License.pdf'],
            ['file' => '4references.pdf', 'label' => '4 References.pdf', 'note' => '(before collecting written references became outdated)'],
            ['file' => 'images/accolade.PNG', 'label' => 'A recent accolade from a respected colleague.pdf'],
            ['file' => 'state security clearance nrs13050415201.pdf', 'label' => 'State Security Clearance NrS13050415201.pdf', 'note' => '(Scrutinized at highest level)'],
        ];

        // ================= Carousel Images =================
        $this->carouselImages = [
            'JavaScriptBeginners.jpg', 'Javascriptntermediate.jpg', 'BogdanBootCampCertificate.jpg', 'javascriptbootcamp.jpg',
            'jquerybeginners.jpg', 'MERNInder.jpg', 'PHP.jpg', 'phplogindiaz.jpg', 'PHPOOP.jpg', 'CompleteOOPS.jpg',
            'phpoopedwin.jpg', 'oopphp7.jpg', 'stonerivermvc.jpg', 'PHPMVCDaveHollingworth.jpg', 'PHPMVCRegistrationModule.jpg',
            'adminguards.jpg', 'api.jpg', 'laraveltenapi.jpg', 'apidevlaravel8.jpg', 'phpmvc.jpg', 'bradphpmvc.jpg',
            'LaravelBlog2021.jpg', 'laraveleight.png', 'laraveleighteasylearning.jpg', 'laravel9permissions.jpg', 'SpatieRolesandPermissions.jpg',
            'laravel10developphpapps.jpg', 'laravelquerybuilder.jpg', 'breezeuserareas.jpg', 'phpttd.jpg', 'PHPZend.jpg',
            'slimframework.jpg', 'phpstormide.jpg', 'xdebug.jpg', 'gitgithub.jpg', 'docker.jpg', 'java.jpg', 'Python100DaysOfCodeBootCamp.jpg',
            'Emmet.jpg', 'Bootstrap3.jpg', 'bootstrapfour.jpg', 'tailwind.jpg', 'spalivewire.jpg', 'cmdb.jpg',
            'Microsoftfundamentals.jpg', 'azureboards.jpg', 'AzureZeroToHero.jpg', 'dynamics.jpg', 'AgileFundamentals.jpg',
            'agileinservicenow.jpg', 'jiraprojects.jpg', 'jiraconf.jpg', 'jiraplanning.jpg', 'camtasia.jpg', 'powershell.jpg',
        ];
    }

    public function toggleCollapse()
    {
        $this->collapseCerts = ! $this->collapseCerts;
    }

    public function nextSlide()
    {
        if (! empty($this->carouselImages)) {
            $this->currentSlide = ($this->currentSlide + 1) % count($this->carouselImages);
        }
    }

    public function prevSlide()
    {
        if (! empty($this->carouselImages)) {
            $this->currentSlide = ($this->currentSlide - 1 + count($this->carouselImages)) % count($this->carouselImages);
        }
    }

    //    #[Layout('components.layouts.app.frontend')]

    public function render()
    {
        return view('livewire.cv-index');
    }
}
