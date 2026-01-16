<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'The PMWay'])]
class ThePMWay extends FrontendComponent
{
    public $showPerformanceStats = false;

    public $showMoreInfo = false;

    public $showCapMatLevel = false;

    public $showPractice = false;

    public $showProcessTiming = false;

    public $showCarousel = false;

    public $showInfo = false;

    public $showTimeCostQuality = false;

    public $showGovernance = false;

    public $showStrategy = false;

    public $showRabbitHole = false;

    public $showOops = false;

    public $showToons = false;

    public $showJourney = false;

    public $showPdca = false;

    public $showItilOverview = false;

    public $showCsiBl = false;

    public $showDandD = false;

    public $showPmbokSixOne = false;

    public $showValueModel = false;

    public $showValueModelEssence = false;

    public $showCats = false;

    public $showPeople = false;

    public $showCobits = false;

    public $showMoreInfoPdca = false;

    public $showPdcaWorks = false;

    public $showCheckAct = false;

    public $showHistory = false;

    public $showMindTheGap = false;

    public $showScrumGovernance = false;

    public function render()
    {
        return view('livewire.the-pmway');
    }
}
