<?php

namespace Database\Seeders;

use App\Models\SearchTerm;
use Illuminate\Database\Seeder;

class SearchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $searchTerms = [
            /*
            |--------------------------------------------------------------------------
            | MODERN LIVEWIRE ROUTES (No /home/ prefix)
            |--------------------------------------------------------------------------
            */
            ['terms' => 'pmway home', 'link' => '/the-pmway', 'checked' => true],
            ['terms' => 'about pmway', 'link' => '/about-pmway', 'checked' => true],
            ['terms' => 'gamestatsnew modern', 'link' => '/gamestatsnew', 'checked' => true],
            ['terms' => 'scrum root cause analysis fix', 'link' => '/scrumfix', 'checked' => true],
            ['terms' => 'scrum dashboards', 'link' => '/scrum-dashboards', 'checked' => true],
            ['terms' => 'red bead experiment', 'link' => '/red-bead-experiment', 'checked' => true],
            ['terms' => 'cmmi level one realstory cml1', 'link' => '/cmmi-level-one', 'checked' => true],
            ['terms' => 'crocodile hunter bureaucracy', 'link' => '/crocodile-hunter', 'checked' => true],
            ['terms' => 'done done definition', 'link' => '/done-done', 'checked' => true],
            ['terms' => 'acid database transactions', 'link' => '/acid-database', 'checked' => true],
            ['terms' => 'ethos pathos logos charioteer argument persuade', 'link' => '/ethos-logos-pathos', 'checked' => true],
            ['terms' => 'personal kanban', 'link' => '/personal-kanban', 'checked' => true],
            ['terms' => 'cmmi maturity levels landing', 'link' => '/cmmi-landing', 'checked' => true],
            ['terms' => 'cmmidevdash dashboard', 'link' => '/cmmidevdashboard', 'checked' => true],
            ['terms' => 'agile methods carousel', 'link' => '/agile-methods', 'checked' => true],
            ['terms' => 'laws principles', 'link' => '/laws', 'checked' => true],
            ['terms' => 'vmodel verification validation', 'link' => '/vmodel', 'checked' => true],
            ['terms' => 'burndown short chart', 'link' => '/burndownshort', 'checked' => true],
            ['terms' => 'ham and eggs commitment involvement', 'link' => '/hamandeggs', 'checked' => true],
            ['terms' => 'kanban coffee shop example', 'link' => '/kanbancoffee', 'checked' => true],
            ['terms' => 'seven rules of scrum', 'link' => '/seven-rules-of-scrum', 'checked' => true],
            ['terms' => 'accelerate devops metrics', 'link' => '/accelerate', 'checked' => true],
            ['terms' => 'working software agile principle', 'link' => '/working-software', 'checked' => true],
            ['terms' => 'release management deployment', 'link' => '/release-management', 'checked' => true],
            ['terms' => 'product increment scrum artifact', 'link' => '/product-increment', 'checked' => true],
            ['terms' => 'safe critique scaled agile', 'link' => '/safe-critique', 'checked' => true],
            ['terms' => 'itil four practices live modern', 'link' => '/itilfourpracticeslive', 'checked' => true],
            ['terms' => 'snowbird manifesto meeting', 'link' => '/snowbird', 'checked' => true],
            ['terms' => 'american football scrum analogy', 'link' => '/american-football', 'checked' => true],
            ['terms' => 'american football videos', 'link' => '/american-football-videos', 'checked' => true],
            ['terms' => 'seven fs framework', 'link' => '/sevenfs', 'checked' => true],
            ['terms' => 'sbok four scrum body of knowledge', 'link' => '/sbok-four', 'checked' => true],
            ['terms' => 'capability maturity model cmm', 'link' => '/capability-maturity-model', 'checked' => true],
            ['terms' => 'study methods learning techniques', 'link' => '/study-methods', 'checked' => true],
            ['terms' => 'freedoms barriers goals constraints', 'link' => '/freedoms-barriers-goals', 'checked' => true],
            ['terms' => 'speedboat sailboat retrospective tool', 'link' => '/speedboat-tool', 'checked' => true],
            ['terms' => 'scrum spike exploration research', 'link' => '/scrum-spike', 'checked' => true],
            ['terms' => 'littles law queuing theory', 'link' => '/littles-law', 'checked' => true],
            ['terms' => 'scrum study videos training', 'link' => '/scrum-study-vids', 'checked' => true],
            ['terms' => 'pmbok process example', 'link' => '/pmbok-process-example', 'checked' => true],
            ['terms' => 'agile traditional comparison', 'link' => '/agile-traditional', 'checked' => true],

            /*
            |--------------------------------------------------------------------------
            | LEGACY ROUTES (With /home/ prefix - trigger transition warning)
            |--------------------------------------------------------------------------
            */

            // ITIL Legacy Routes
            ['terms' => 'itil four practices legacy', 'link' => '/home/itilfourpractices', 'checked' => true],
            ['terms' => 'itil overview version 3 legacy', 'link' => '/home/itiloverview', 'checked' => true],
            ['terms' => 'itil service strategy legacy', 'link' => '/home/itilss', 'checked' => true],
            ['terms' => 'itil service design legacy', 'link' => '/home/itilsd', 'checked' => true],
            ['terms' => 'itil service transition legacy', 'link' => '/home/itilst', 'checked' => true],
            ['terms' => 'itil service operation legacy', 'link' => '/home/itilso', 'checked' => true],
            ['terms' => 'itil continual service improvement legacy', 'link' => '/home/itilcsi', 'checked' => true],
            ['terms' => 'itil essence overview legacy', 'link' => '/home/itil', 'checked' => true],
            ['terms' => 'itil project management synergy legacy', 'link' => '/home/itilpm', 'checked' => true],

            // Scrum Legacy Routes
            ['terms' => 'scrum role clarity product owner scrum master legacy', 'link' => '/home/scrumroleclarity', 'checked' => true],
            ['terms' => 'scrum user story videos mike cohn legacy', 'link' => '/home/userstories', 'checked' => true],
            ['terms' => 'scrum mvp safely increment gif legacy', 'link' => '/home/mvp', 'checked' => true],
            ['terms' => 'sprint burndown short legacy', 'link' => '/home/burndownshort', 'checked' => true],
            ['terms' => 'product increment legacy', 'link' => '/home/productincrement', 'checked' => true],
            ['terms' => 'sprint up close detailed legacy', 'link' => '/home/sprintupclose', 'checked' => true],
            ['terms' => 'sailboat speedboat retrospective legacy', 'link' => '/home/sailboat', 'checked' => true],
            ['terms' => 'scrum legacy links downloads resources', 'link' => '/home/scrum', 'checked' => true],

            // SAFe Legacy Routes
            ['terms' => 'safe product owner spo legacy', 'link' => '/home/spo', 'checked' => true],
            ['terms' => 'safe scrum master ssm legacy', 'link' => '/home/ssm', 'checked' => true],

            // Change Management Legacy Routes
            ['terms' => 'change management legacy', 'link' => '/home/changeman', 'checked' => true],
            ['terms' => 'change management adkar model legacy', 'link' => '/home/changeadkar', 'checked' => true],

            // Metrics & Measurement Legacy Routes
            ['terms' => 'measurement cycle time lead time flow efficiency legacy', 'link' => '/home/measurement', 'checked' => true],
            ['terms' => 'gamestats legacy page', 'link' => '/home/gamestats', 'checked' => true],
            ['terms' => 'red beads experiment deming legacy', 'link' => '/home/removetheredbeads', 'checked' => true],

            // Productivity Legacy Routes
            ['terms' => 'procrastination management legacy', 'link' => '/home/procrastination', 'checked' => true],
            ['terms' => 'recharge energy management legacy', 'link' => '/home/recharge', 'checked' => true],
            ['terms' => 'freedoms barriers goals legacy', 'link' => '/home/freedoms', 'checked' => true],
            ['terms' => 'monkey management delegation legacy', 'link' => '/home/monkey', 'checked' => true],

            // Other Legacy Routes
            ['terms' => 'about pmway legacy', 'link' => '/home/about', 'checked' => true],
            ['terms' => 'baseline project management legacy', 'link' => '/home/baseline', 'checked' => true],
            ['terms' => 'dml data manipulation language legacy', 'link' => '/home/dml', 'checked' => true],
            ['terms' => 'governance landscape legacy', 'link' => '/home/landscape', 'checked' => true],
            ['terms' => 'working software legacy', 'link' => '/home/workingsoftware', 'checked' => true],


            /*
          |--------------------------------------------------------------------------
          | Public Folder Routes
          |--------------------------------------------------------------------------
          */
            ['terms' => 'public landing page', 'link' => '/public-landing', 'checked' => true],
            ['terms' => 'Book Summaries public folder locked', 'link' => '/booksummaries/index.html', 'checked' => true],
            ['terms' => 'Agile Principles public folder locked', 'link' => '/index.html', 'checked' => true],
            ['terms' => 'configuration management cm ii training public folder locked', 'link' => '/cmiitraining/index.html', 'checked' => true],
            ['terms' => 'booklets scio training public folder  locked', 'link' => '/booklets', 'checked' => true],
            ['terms' => 'emetercourse scio training public folder  locked', 'link' => '/emetercourse/index.html', 'checked' => true],
            ['terms' => 'flipacp public folder locked', 'link' => '/flipacp/index.html', 'checked' => true],
            ['terms' => 'flipdsdm public folder locked', 'link' => '/flipdsdm/index.html', 'checked' => true],
            ['terms' => 'flippmbok5 public folder locked', 'link' => '/flippmbok5/index.html', 'checked' => true],
            ['terms' => 'flippmppublic folder locked', 'link' => '/flippmp/index.html', 'checked' => true],
            ['terms' => 'flipprince2 public folder locked', 'link' => '/flipprince2/index.html', 'checked' => true],
            ['terms' => 'flipprince2a public folder locked', 'link' => '/flipprince2a/index.html', 'checked' => true],
            ['terms' => 'filpprince22015 public folder locked', 'link' => '/prince22015/index.html', 'checked' => true],
            ['terms' => 'shsb scio public folder locked', 'link' => '/shsb/index.html', 'checked' => true],
            ['terms' => 'techdic scio public folder locked', 'link' => '/techdic/index.html', 'checked' => true],
            ['terms' => 'lrh scio public folder locked', 'link' => '/lrh/index.html', 'checked' => true],
            ['terms' => 'standardtechcourse scio public folder locked', 'link' => '/standardtechcourse/index.html', 'checked' => true],
            ['terms' => 'freezonecourses scio public folder locked', 'link' => '/freezonecourses/index.html', 'checked' => true],
            ['terms' => 'lrhbooks scio public folder locked', 'link' => '/lrhbooks/index.html', 'checked' => true],
            ['terms' => 'scrum public folder locked', 'link' => '/scrum/index.html', 'checked' => true],
            ['terms' => 'silverbullet public folder locked', 'link' => '/silverbullet/index.html', 'checked' => true],
            ['terms' => 'macroecon public folder locked', 'link' => '/macroecon/index.html', 'checked' => true],
            ['terms' => 'strategystuff public folder locked', 'link' => '/strategystuff/index.html', 'checked' => true],
            ['terms' => 'scrummanual 4 public folder locked', 'link' => '/scrummanual/index.html', 'checked' => true],
            ['terms' => 'sitapmo public folder locked', 'link' => '/sitapmo/index.html', 'checked' => true],
            ['terms' => 'helpme scio na public folder locked', 'link' => '/helpme/index.html', 'checked' => true],
            ['terms' => 'studymanual public folder locked', 'link' => '/studymanualt/index.html', 'checked' => true],
            ['terms' => 'summitid public folder locked', 'link' => '/summitid/index.html', 'checked' => true],
            ['terms' => 'tao public folder locked', 'link' => '/tao/index.html', 'checked' => true],
            ['terms' => 'apology public folder locked', 'link' => '/apology/index.html', 'checked' => true],
            ['terms' => 'atecdic scio public folder locked', 'link' => '/atecdic/index.html', 'checked' => true],
            ['terms' => 'scientologydict scio public folder locked', 'link' => '/scientologydict/index.html', 'checked' => true],
            ['terms' => 'goodcheapfast public folder locked', 'link' => '/goodcheapfast/index.html', 'checked' => true],
            ['terms' => 'biases public folder locked', 'link' => '/biases/index.html', 'checked' => true],
            ['terms' => 'fallacies public folder locked', 'link' => '/fallacies/index.html', 'checked' => true],
            ['terms' => 'breath  public folder locked', 'link' => '/breath/index.html', 'checked' => true],
            ['terms' => 'complexprince  public folder locked', 'link' => '/complexprince/index.html', 'checked' => true],
            ['terms' => 'conditions scio public folder locked', 'link' => '/conditions/index.html', 'checked' => true],
            ['terms' => 'cv public folder locked', 'link' => '/cv/index.html', 'checked' => true],
            ['terms' => 'dsdmmanual public folder locked', 'link' => '/dsdmmanual/index.html', 'checked' => true],
            ['terms' => 'dsdmwhitepapers public folder locked', 'link' => '/dsdmwhitepapers/index.html', 'checked' => true],
            ['terms' => 'pcmm public folder locked', 'link' => '/pcmm/index.html', 'checked' => true],
            ['terms' => 'philosopherstoolkit public folder locked', 'link' => '/philosopherstoolkit/index.html', 'checked' => true],
            ['terms' => 'philosophy  plato7i.html plato7epistle public folder locked', 'link' => '/plato7epistle/index.html', 'checked' => true],
            ['terms' => 'pmbok6 public folder locked', 'link' => '/pmbok6/index.html', 'checked' => true],
            ['terms' => 'pmboksixmanual public folder locked', 'link' => '/pmboksixmanual/index.html', 'checked' => true],
            ['terms' => 'pmi2015 public folder locked', 'link' => '/pmi2015/index.html', 'checked' => true],
            ['terms' => 'prince2agile public folder locked', 'link' => '/prince2agile/index.html', 'checked' => true],
            ['terms' => 'prince2mm public folder locked', 'link' => '/prince2mm/index.html', 'checked' => true],
            ['terms' => 'prince2procs public folder locked', 'link' => '/prince2procs/index.html', 'checked' => true],
            ['terms' => 'processdash public folder locked', 'link' => '/processdash/index.html', 'checked' => true],
            ['terms' => 'cmmidev public folder locked', 'link' => '/cmmidev/index.html', 'checked' => true],
            ['terms' => 'cmmidevelopment public folder locked', 'link' => '/cmmidevelopment/index.html', 'checked' => true],
            ['terms' => 'cmmimodels public folder locked', 'link' => '/cmmimodels/index.html', 'checked' => true],
            ['terms' => 'dsdm public folder locked', 'link' => '/dsdm/index.html', 'checked' => true],
            ['terms' => 'includesub public folder locked', 'link' => '/includesub/index.html', 'checked' => true],
            ['terms' => 'lovemstuffs public folder locked', 'link' => '/lovemstuffs/index.html', 'checked' => true],
            ['terms' => 'movies public folder locked', 'link' => '/movies/index.html', 'checked' => true],
            ['terms' => 'phoenixlecturespics public folder locked', 'link' => '/phoenixlecturespics/index.html', 'checked' => true],
            ['terms' => 'PMWayLanding public folder used for legacy head foot etc., leave alone locked', 'link' => '/PMWayLanding/index.html', 'checked' => true],
            ['terms' => 'itilfouroverview public folder locked', 'link' => '/itilfouroverview/index.html', 'checked' => true],
            ['terms' => 'itilfouroverviewsimple public folder locked', 'link' => '/itilfouroverviewsimple/index.html', 'checked' => true],
            ['terms' => 'latin public folder locked', 'link' => '/latin/index.html', 'checked' => true],
            ['terms' => 'recharges public folder locked', 'link' => '/recharges/index.html', 'checked' => true],
            ['terms' => 'robertsrulesoforder public folder locked', 'link' => '/robertsrulesoforder/index.html', 'checked' => true],
            ['terms' => 'images public folder could be to support legacy leave alone locked', 'link' => '/images/index.html', 'checked' => true],
            ['terms' => 'imgmap click area software public folder locked', 'link' => '/imgmap/index.html', 'checked' => true],
            ['terms' => 'roadtoclear shortened from road to clear scio  public folder locked', 'link' => '/roadtoclear/index.html', 'checked' => true],
            ['terms' => 'technical dictionary or technicaldictionary scio public folder locked', 'link' => '/technicaldictionary/index.html', 'checked' => true],
            ['terms' => 'technologydict scio public folder locked', 'link' => '/technologydict/index.html', 'checked' => true],
            ['terms' => 'thewayaudio scio public folder locked', 'link' => '/thewayaudio/index.html', 'checked' => true],
            ['terms' => 'trscourse scio public folder locked', 'link' => '/trscourse/index.html', 'checked' => true],
            ['terms' => 'tailwind course public folder locked', 'link' => '/twcsstraining/index.html', 'checked' => true],


            /*
                |--------------------------------------------------------------------------
                | UNCHECKED / DISABLED ROUTES (Need review or not yet implemented)
                |--------------------------------------------------------------------------
                */
            ['terms' => 'scrum values', 'link' => '/home/scrumvalues', 'checked' => true],
            ['terms' => 'scrum value model', 'link' => '/home/scrumvaluemodel', 'checked' => false],
            ['terms' => 'scrum six minutes', 'link' => '/home/scrumsixmins', 'checked' => false],
            ['terms' => 'spike exploration', 'link' => '/home/spike', 'checked' => false],
            ['terms' => 'empirical process control', 'link' => '/home/empirical', 'checked' => false],
            ['terms' => 'scrum but excuses', 'link' => '/home/scrumbut', 'checked' => false],
            ['terms' => 'agile configuration management', 'link' => '/home/agilecm', 'checked' => false],
            ['terms' => 'reinventing itil devops', 'link' => '/home/devops', 'checked' => false],
            ['terms' => 'the game project simulation', 'link' => '/home/thegame', 'checked' => false],
            ['terms' => 'team dynamics', 'link' => '/home/team', 'checked' => false],
            ['terms' => 'roadmap to value', 'link' => '/home/roadmaptovalue', 'checked' => false],
            ['terms' => 'waste lean manufacturing', 'link' => '/home/waste', 'checked' => false],
            ['terms' => 'clear communication', 'link' => '/home/clear', 'checked' => false],
            ['terms' => 'problem solution zazen', 'link' => '/home/zaprobsol', 'checked' => false],
            ['terms' => 'scrum study guide', 'link' => '/home/scrumstudy', 'checked' => false],
            ['terms' => 'raci matrix responsibility', 'link' => '/home/raci', 'checked' => false],
            ['terms' => 'azure devops', 'link' => '/home/azure', 'checked' => false],
            ['terms' => 'ooda loops decision making', 'link' => '/home/oodaloops', 'checked' => false],
            ['terms' => 'transactional analysis', 'link' => '/home/ta', 'checked' => false],
            ['terms' => 'cv curriculum vitae', 'link' => '/cv/index.php', 'checked' => false],
            ['terms' => 'safe is unsafe critique', 'link' => '/home/safeisunsafe', 'checked' => false],
            ['terms' => 'linux commands reference', 'link' => '/home/linuxcommands', 'checked' => false],
            ['terms' => 'project log history', 'link' => '/log', 'checked' => false],
        ];

        foreach ($searchTerms as $term) {
            SearchTerm::create($term);
        }
    }
}
