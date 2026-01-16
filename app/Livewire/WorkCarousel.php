<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app.frontend', ['title' => 'Work Experience'])]
class WorkCarousel extends Component
{
    public array $jobs = [];

    public ?string $selectedJobKey = null;

    public function mount()
    {
        $this->jobs = [
            'ntt_2023' => [
                'company' => 'NTT',
                'title' => 'Senior Project Manager and Coach',
                'location' => 'Hybrid',
                'from' => '07/2023',
                'to' => '04/2024',
                'description' => '<ul class="list-disc pl-5 space-y-1 text-gray-700 dark:text-gray-300"><li class="auto-style1">The division and project team Mark worked with specialised in Microsoft Power Platform, Power BI, Power Apps and Power Automate. They also automate SharePoint to support Power Platform.</li><li class="auto-style1">Mark’s role needed to report back team progress and financial status of all projects to the executive. The department was set up to follow Scrum and SAFe on which Mark was asked to implement good governance and to coach team improvements in Agile.</li><li class="auto-style1">Due to downsizing at NTT and after an opportunity to work overseas Mark decided to take this and he left NTT in May 2024.</li></ul>',
                'reason' => 'The department is right sizing and I am looking for other opportunities.',
                'carouselPageRoute' => url('/myjobs/ntt_2023'),
            ],
            'aci_2022' => [
                'company' => 'ACI Worldwide',
                'title' => 'Program Manager',
                'location' => 'Hybrid',
                'from' => '08/2022',
                'to' => '06/2023',
                'description' => '<ul class="list-disc pl-5 space-y-1 text-gray-700 dark:text-gray-300"><li class="auto-style1">The company specialised in Payments Systems. Mark’s role was a Program Manager with several Product Owners (Scrum teams) reporting into him.</li><li class="auto-style1">Marks was initially employed to work in Africa but due to business not materializing he was asked to assist with a short project contracted with Nedbank. The projects for Nedbank in the program were Real-time Payments System (RTPS), Acquirer, Interchange, and Issuer. For RTPS Mark attend daily scrum with the team at the client. For Acquirer and Interchange ACI were driving to pin down gaps (requirements) that the bank needed to incorporate into their systems. Issuer was investigated for early attention and a business case was put forward by ACI.</li><li class="auto-style1">However, due to the complexity of the solution required, and limited resources, Issuer was put on hold for 2023. Mark was offered the opportunity to return to NTT and he took this.</li></ul>',
                'carouselPageRoute' => url('/myjobs/aci_2022'),
            ],
            'ntt_2021' => [
                'company' => 'NTT',
                'title' => 'SAFe | Scrum Master',
                'location' => 'Hybrid',
                'from' => '01/2021',
                'to' => '07/2022',
                'description' => '<ul class="list-disc pl-5 space-y-1 text-gray-700 dark:text-gray-300"><li class="auto-style1">Service Now (IT Global Hub team) Program. Mark worked with the NTT Global IT Hub team. The Product Owner role involved the implementation of Service Now across several fronts (including CMDB, Service Catalogue, Help Desk, Product Design, Kita Bot etc.).</li> <li class="auto-style1">Towards the middle of 2022, a directive came down to centralize the IT help desk into India. This project was successfully completed at the end of 2022.</li></ul>',
                'carouselPageRoute' => url('/myjobs/ntt_2021'),
            ],
            'absa_2017' => [
                'company' => 'ABSA',
                'title' => 'SAFe Scrum Master / Product Owner / Agile Coach',
                'location' => 'Sandton',
                'from' => '09/2017',
                'to' => '12/2020',
                'description' => '<ul class="list-disc pl-5 space-y-1 text-gray-700 dark:text-gray-300"><li class="auto-style1"> CIB Digital Channel Program. Mark was the Scrum Master and Product Owner for several scrum teams with focus on Data Migration, Single Sign On, Payments and a strategic project involving the creation of a Big Data Lake (Hadoop, Scala, Ambari, Hive etc.) to enable ABSA to unbundle from Barclays before December 2019.</li><li class="auto-style1">Mark was also involved in the DebiCheck project as a Product Owner. Mark was also asked to assist with the Haraka project to envision a way forward for ABSA into the future. These strategic projects involve clients across Africa.</li><li class="auto-style1">Mark was involved in Scrum Coaching to implement best practice based on Scrum, SAFe, ITIL with process implementation and improvements for Capability Maturity 2+ compliancy.</li> <li class="auto-style1"><a href="'.Storage::url('certificates/absaaro.jpg').'"  class="text-blue-600 hover:underline">This letter of thanks was given to my team after attaining the project goal, on time and on budget.</a></li> </ul>',
                'carouselPageRoute' => url('/myjobs/absa_2017'),
            ],
            'sita_2010' => [
                'company' => 'SITA',
                'title' => 'Program Manager',
                'location' => 'Pretoria',
                'from' => '03/2010',
                'to' => '05/2017',
                'description' => '<ul class="list-disc pl-5 space-y-1 text-gray-700 dark:text-gray-300"> <li class="auto-style1">As Mark was engaged by SITA in a consulting and project management process improvement / governance role, he focused on aligning the project office within the SITA Justice Cluster to incorporate the latest CMMi model and project management process (PMP / PRINCE2) for best practice. </li> <li class="auto-style1">To this end he has fully configured the Enterprise Project Management Server (2010 / 2013 / 2016) within the Justice Cluster for CMMi Level 2, thus supporting SITA’s Enterprise Resource Planning system. </li> </ul>',
                'carouselPageRoute' => url('/myjobs/sita_2010'),
            ],
            'nissan_2004' => [
                'company' => 'Nissan South Africa',
                'title' => 'PMO Consultant',
                'location' => 'Rosslyn',
                'from' => '08/2004',
                'to' => '09/2009',
                'description' => '<ul class="list-disc pl-5 space-y-1 text-gray-700 dark:text-gray-300"> <li class="auto-style1">The Microsoft Project Enterprise Server 2007 (and later) 2010 was set up and run at Nissan from 2004 to 2009 to underpin their project office. This was done to control SAP customization projects and promote project management process improvement and tighter monitoring and control. Apart from administrating the project server Mark managed SAP developers (and outsource resources) and a team of internal project office Nissan Systems resources on the system. </li> </ul>',
                'carouselPageRoute' => url('/myjobs/nissan_2004'),
            ],
            'medscheme_quality_2003' => [
                'company' => 'Medscheme Services Quality Division',
                'title' => 'Program Management',
                'location' => 'Sandton',
                'from' => '12/2003',
                'to' => '06/2004',
                'description' => ' <ul class="list-disc pl-5 space-y-1 text-gray-700 dark:text-gray-300"> <li class="auto-style1">The Project Office had collapsed due to instability after a merger resulting in IT and staff losses. He was asked to move back to IT within Medscheme and take over Project Office and stabilise it for the purposes of implementing a new broker friendly system; Medware. Apart from supporting the successful Medware project from Initiation to Closure to Project Office was configured for collaboration across a WAN comprised of 40 project managers and resources. </li> </ul>',
                'carouselPageRoute' => url('/myjobs/medscheme_quality_2003'),
            ],
            'gpconnect_2002' => [
                'company' => 'GPConnect',
                'title' => 'PMO Consultant',
                'location' => 'Sandton',
                'from' => '02/2002',
                'to' => '12/2002',
                'description' => '<ul class="list-disc pl-5 space-y-1 text-gray-700 dark:text-gray-300"> <li class="auto-style1">Mark project managed this new business venture from inception to handover </li> <li class="auto-style1">Compiled a marketing plan and budget for the new company </li> <li class="auto-style1">Negotiated and signed deals with a number of intermediaries to supply computer hardware and operating and switching software to the Company, which we would then on sell to our customers </li> <li class="auto-style1">Negotiated and signed deals with MLS Bank to supply finance / terms for the connection bundle </li> <li class="auto-style1">Negotiated with DHSwitch and Health Bridge to enable our bundle to switch through from the Doctors practice to the Medical Aid Schemes </li> <li class="auto-style1">Implemented full accounting system for company to track all revenue / costs Implemented a computer based quoting / order generation engine that could handle different permutations of the bundle </li> <li class="auto-style1">Compiled a set of marketing documents that could be used in a direct mail campaign to Doctors </li> <li class="auto-style1">Worked closely with Data Warehouse to pull lists of paper based Doctors who would be interested in an electronic claims submission system </li> <li class="auto-style1">Negotiated and signed deals with the SAMDP for a Joint Venture / capital for GPconnect into the market </li> <li class="auto-style1">Employed and trained staff to administer and sell for GPconnect </li> <li class="auto-style1">Implemented Performance Management into department. </li> </ul> <br> <hr> <h2>Management Line / Reference if available:</h2> <hr> <br> <p>Mark reported directly into the Executive Board for the Medware project. Anton Roux was his key point of contact. <br>Anton has not worked for Medscheme for many years having left to work in the Insurance Industry.</p> ',
                'carouselPageRoute' => url('/myjobs/gpconnect_2002'),
            ],
            'livebet_2001' => [
                'company' => 'LiveBet',
                'title' => 'IT Development Director',
                'location' => 'Sandton',
                'from' => '05/2001',
                'to' => '01/2002',
                'description' => '<ul class="list-disc pl-5 space-y-1 text-gray-700 dark:text-gray-300"> <li class="auto-style1">The LiveBet system is a Microsoft Client Server based sports betting system offering networked desktop interfaces (&amp; admin console) with web portal to facilitate online access for betting public </li> <li class="auto-style1">The development team was a small team of young programmers. The first challenge was to install DevTrack &amp; obtain tighter management controls in respect of quality and delivery. Through regular weekly meetings a total of 15300 issues successfully completed through DevTrack since joining in May </li> <li class="auto-style1">International clients were enabled to hook up through the web and log issues </li> <li class="auto-style1">Quality Assurance installed to ensure all issues required QA sign off before final release </li> <li class="auto-style1">TaskTimer Project System installed into LiveBet </li> <li class="auto-style1">Also introduced UML &amp; Jadding to development processes. </li> <li class="auto-style1">Embarked on process to improve overall system performance </li> <li class="auto-style1">This focused on a total redesign of the back end database structure, stored procedures, triggers etc. To facilitate the above a full set technical documents (using Microsoft’s Visio and SQL Server) was developed </li> <li class="auto-style1">Cognos was used to obtain crucial BI outputs from the system </li> <li class="auto-style1">Implemented a full set of Job Descriptions and Performance Management to synchronise and manage staff’s dev focus. </li> </ul> <br> <hr> <h2>Management Line / Reference if available:</h2> <hr> <br> <p>Mark reported to the LiveBet Director, Andrew Beveridge. <br>Andrew emigrated to the UK in 2004 to become involved with a web site offering International lottery tickets over the internet.&nbsp; <br>Mark has lost touch with him.</p> ',
                'carouselPageRoute' => url('/myjobs/livebet_2001'),
            ],
            'medikredit_2000' => [
                'company' => 'Medikredit',
                'title' => 'New Product Development Manager',
                'location' => 'Hyde Park',
                'from' => '01/2000',
                'to' => '02/2001',
                'description' => ' <ul class="list-disc pl-5 space-y-1 text-gray-700 dark:text-gray-300"> <li class="auto-style1">Managed / coordinated 48 developers across the IT division Developers fell into 3 teams: Core Processing, Value Added and New Product Development with each managed by a team manager with project management experience and reporting directly to the Project Co-ordinator and into the IT Director </li> <li class="auto-style1">The staff held skills including Visual Basic, Delphi, Stratus programmers, C / C++, Java and AS 400 DBA / RPG programmers </li> <li class="auto-style1">Since joining co-ordinated the development first phase of a new Online / Real-time Hospital Claims Payment Development completed and rolled out to the market in June </li> <li class="auto-style1">A first phase of an Online / Real-time Doctors Claims Payment System focused to assist General Practitioners with payments developed based on above. </li> <li class="auto-style1">Worked on XML solutions for Medikredit using Biztalk server with SQL Server </li> <li class="auto-style1">Implemented the TaskTimer project management system. This system has allowed the team to manage at detail level the development of a number of new projects as well as ongoing Incidents including systems maintenance and enhancements </li> <li class="auto-style1">Responsible to IT Director for detailed status reporting of the above and ongoing resource allocation and progress reports </li> <li class="auto-style1">Co-ordinated project planning (resource implementation) meetings. </li> </ul> <br> <hr> <h2>Management Line / Reference if available:</h2> <hr> <br> <p>Mark reported to the IT Director, Alouise Adlam. <br>Mark understands that Alouise left Medikredit in 2002. <a href="'.Storage::url('certificates/alouiseadlammedikredit.pdf').'"  class="text-blue-600 hover:underline">Alouise\' letter of reference is here</a>.</p> <hr>',
                'carouselPageRoute' => url('/myjobs/medikredit_2000'),
            ],
            'medscheme_rnd_1995' => [
                'company' => 'Medscheme Managed Care Division',
                'title' => 'R & D Divisional Director',
                'location' => 'Randburg',
                'from' => '06/1995',
                'to' => '07/1999',
                'description' => ' <ul class="list-disc pl-5 space-y-1 text-gray-700 dark:text-gray-300"> <li>MedManaged / coordinated a number of specialised staff in the R&D division: Co-ordinated project planning (resource implementation) meetings</li> <li>Responsible to Managed Care Board for detailed status reporting</li> <li>Worked closely with Data Warehouse (RM400 & RM1000 Servers), IT and New Product Managers ...</li> <li>Participated in Company Board meetings and Medical Scheme Committee meetings ...</li> <li>Heading up the R&D Division he also sat on the Business Process Reengineering Committee ...</li> </ul> <br> <hr> <h2>Management Line / Reference if available:</h2> <hr> <br> <p>Mark reported to Reg Magennis, the Medscheme Managed Care Director. <a href="'.Storage::url('certificates/regmagennis-medscheme-mancare.pdf').'"  class="text-blue-600 hover:underline">Reg Magennis\' letter of reference is here</a> </p> ',
                'carouselPageRoute' => url('/myjobs/medscheme_rnd_1995'),
            ],
            'medscheme_marketing_1989' => [
                'company' => 'Medscheme Marketing Division',
                'title' => 'Group Marketing Manager',
                'location' => 'Randburg',
                'from' => '08/1989',
                'to' => '05/1995',
                'description' => ' <ul class="list-disc pl-5 space-y-1 text-gray-700 dark:text-gray-300"> <li class="auto-style1">Managed a team of 60 staff (one third sales staff and two thirds client services staff)</li> <li class="auto-style1">As Group Manager, reporting into the Medscheme Board, he worked locally and through national branch infrastructure to monitor ongoing performance against targets</li> <li class="auto-style1">Primary task was to increase the Membership base through open scheme growth and the acquisition of new Administration contracts for Medscheme</li> <li class="auto-style1">This business growth when achieved needed to be serviced and defended</li> <li class="auto-style1">Co-ordinated national function and grew Medscheme’s membership base from 310 000 to 623 000 principal members</li> <li class="auto-style1">Prepared detailed Marketing and Business plans Responsible for budgeting process for 10 branches Nationally and Marketing department at head office</li> <li class="auto-style1">Managed and approved various budgets and expenditure as well as sales figures against budget as well as client retention to budgets Accountable to Medscheme Board for performance of division</li> <li class="auto-style1">Responsible for National Marketing and individual Product Performance Plans </li> <li class="auto-style1">Motivated staff to ensure service excellence and that customer services ethic prevailed </li> <li class="auto-style1">Conceptualized a Customer Relationship Management system </li> <li class="auto-style1">Worked closely with IT division and outside consultants to computerize a national marketing and customer services information “CRM” system to co-ordinate acquisition of new members and retention of existing members </li> <li class="auto-style1">Due to the complexity of this market the CRM system was a key enabler leading to success in the division. </li> </ul> <br> <hr> <h2>Management Line / Reference if available:</h2> <hr> <br> <p>Mark reported to Andrew Jackson, the Medscheme Deputy CEO (and also the Marketing Director). <br>Andrew left Medscheme to emigrate to Australia over 2 decades ago. Mark has lost touch with him.</p>',
                'carouselPageRoute' => url('/myjobs/medscheme_marketing_1989'),
            ],
            'pakcraft_1988' => [
                'company' => 'Living Flair and PakCraft PLC',
                'title' => 'Salesman and Marketeer',
                'location' => 'London',
                'from' => '08/1988',
                'to' => '05/1989',
                'description' => '<ul class="list-disc pl-5 space-y-1 text-gray-700 dark:text-gray-300"> <li class="auto-style1">Mark worked as an apprentice Marketeer and Salesman for Living Flair for a year.  For his second year he worked for PakCraft marketing and selling a form and fill packaging machine around Britain, Wales, Scotland and Ireland.  At the end of the second year he decided to come back to South Africa to take up a job at a Medical Aid Administration Company, Medscheme Pty Ltd.</li></ul>',
                'carouselPageRoute' => url('/myjobs/pakcraft_1988'),
            ],
            'sabc_1985' => [
                'company' => 'South African Broadcasting Corporation',
                'title' => 'TV News Reporter',
                'location' => 'Johannesburg',
                'from' => '08/1985',
                'to' => '05/1987',
                'description' => '<ul class="list-disc pl-5 space-y-1 text-gray-700 dark:text-gray-300"> <li class="auto-style1">After Mark\'s Journalism Degree at Rhodes University became a TV News Reporter for the South African Broadcasting Corporation. Mark spent two years covering many different news stories and perfected his skills with this profession. Mark, not seeing a future for himself in News Reporting in South Africa, resigned and left to take up a job offer to work in England.</li></ul>',
                'carouselPageRoute' => url('/myjobs/sabc_1985'),
            ],
            'rhodes_1983' => [
                'company' => 'Rhodes University',
                'title' => 'Student',
                'location' => 'Grahamstown',
                'from' => '08/1983',
                'to' => '05/1985',
                'description' => '<ul class="list-disc pl-5 space-y-1 text-gray-700 dark:text-gray-300"> <li class="auto-style1">Mark attended Rhodes University to read an English and Journalism and Media Studies Degree.</li></ul>',
                'carouselPageRoute' => url('/myjobs/rhodes_1983'),
            ],
            'sap_1980' => [
                'company' => 'South African Police',
                'title' => 'South African Police Constable',
                'location' => 'South Africa',
                'from' => '08/1980',
                'to' => '05/1982',
                'description' => '<ul class="list-disc pl-5 space-y-1 text-gray-700 dark:text-gray-300"> <li class="auto-style1">Mark had to spend two years doing compulsory National Service.  He started up at 1 South African Infantry Battalion in Bloemfontien.  After basic training he was transferred into the South African Police.  He spent his first year as a Constable at Police Stations and his second year as a detective working for the Crime Unit based in Randburg.  Mark has completed his third year of National Service which amounted to a month a year running the Charge Offices in Randburg or Fairland.</li></ul>',
                'carouselPageRoute' => url('/myjobs/rhodes_1983'),
            ],
            'stithians_1979' => [
                'company' => 'St Stithians College',
                'title' => 'Scholar',
                'location' => 'Randburg',
                'from' => '08/1974',
                'to' => '05/1979',
                'description' => '<ul class="list-disc pl-5 space-y-1 text-gray-700 dark:text-gray-300"> <li class="auto-style1">Mark completd his high school in 1979 and obtained a University Entrance Joint Matriculation Board qualification.</li></ul>',
                'carouselPageRoute' => url('/myjobs/rhodes_1983'),
            ],

        ];
    }

    public function render()
    {
        return view('livewire.work-carousel');
    }
}
