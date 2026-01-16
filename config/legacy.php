<?php

// config/legacy.php

return [
    'routes' => [
        // Productivity - NOW ALL HAVE /home/ PREFIX
        'home/procrastination' => [ // CHANGED
            'name' => 'Procrastination',
            'description' => 'Understanding and overcoming procrastination.',
        ],
        'home/recharge' => [
            'name' => 'Recharge',
            'description' => 'Personal energy management.',
        ],

        // ITIL Routes
        'home/itilfourpractices' => [
            'name' => 'ITIL 4 Practices',
            'description' => 'Comprehensive guide to ITIL 4 practices.',
        ],
        'home/itiloverview' => [
            'name' => 'ITIL 3 Overview',
            'description' => 'High-level overview of ITIL 3 framework.',
        ],
        'home/itilss' => [
            'name' => 'ITIL 3 Service Strategy',
            'description' => 'Service Strategy lifecycle phase.',
        ],
        'home/itilsd' => [
            'name' => 'ITIL 3 Service Design',
            'description' => 'Service Design lifecycle phase.',
        ],
        'home/itilst' => [
            'name' => 'ITIL 3 Service Transition',
            'description' => 'Service Transition lifecycle phase.',
        ],
        'home/itilso' => [
            'name' => 'ITIL 3 Service Operation',
            'description' => 'Service Operation lifecycle phase.',
        ],
        'home/itilcsi' => [
            'name' => 'ITIL 3 Continual Service Improvement',
            'description' => 'CSI lifecycle phase.',
        ],
        'home/itil' => [
            'name' => 'ITIL Overview',
            'description' => 'High-level overview of ITIL framework.',
        ],
        'home/itilpm' => [
            'name' => 'ITIL & Project Management',
            'description' => 'The synergy between ITIL and Project Management.',
        ],

        // Scrum Routes
        'home/scrumroleclarity' => [
            'name' => 'Scrum Role Clarity',
            'description' => 'Can the Scrum Master be a Product Owner?',
        ],
        'home/userstories' => [
            'name' => 'User Stories & Scrum Videos',
            'description' => 'Videos from Mike Cohn and other experts.',
        ],
        'home/mvp' => [
            'name' => 'MVP & Iterative Development',
            'description' => 'Minimal Viable Product approaches.',
        ],
        'home/burndownshort' => [
            'name' => 'Sprint Burndown',
            'description' => 'Quick guide to Sprint Burndown charts.',
        ],
        'home/productincrement' => [
            'name' => 'Product Increment',
            'description' => 'Understanding the Product Increment.',
        ],
        'home/sprintupclose' => [
            'name' => 'Sprint Deep Dive',
            'description' => 'Scrum sprint up close and personal.',
        ],
        'home/sailboat' => [
            'name' => 'Sailboat Retrospective',
            'description' => 'Speedboat/Sailboat retrospective tool.',
        ],
        'home/scrum' => [ // CHANGED: added /home/
            'name' => 'Scrum Resources',
            'description' => 'Comprehensive Scrum links and resources.',
        ],

        // SAFe Routes
        'home/spo' => [
            'name' => 'SAFe Product Owner 5.1',
            'description' => 'SAFe Product Owner certification guide.',
        ],
        'home/ssm' => [
            'name' => 'SAFe Scrum Master 5.1',
            'description' => 'SAFe Scrum Master certification guide.',
        ],

        // Change Management
        'home/changeman' => [
            'name' => 'Change Management',
            'description' => 'Organizational change management.',
        ],
        'home/changeadkar' => [
            'name' => 'ADKAR Model',
            'description' => 'The ADKAR change management model.',
        ],

        // Metrics
        'home/measurement' => [
            'name' => 'Agile Metrics',
            'description' => 'Cycle time, lead time, flow efficiency.',
        ],
        'home/gamestats' => [
            'name' => 'Game Statistics',
            'description' => 'Everything about upping your game stats.',
        ],
        'home/removetheredbeads' => [
            'name' => 'Red Bead Experiment',
            'description' => 'W. Edwards Deming\'s experiment.',
        ],

        // Other  // I have tested up to here
        'home/freedoms' => [
            'name' => 'Freedoms, Barriers & Goals',
            'description' => 'Understanding organizational dynamics.',
        ],
        'pmboksix/sixone' => [ // CHANGED: added (or remove if this is just for testing)
            'name' => 'PMBokSix Legacy',
            'description' => 'PMBokSix Legacy Web.',
        ],
        'home/monkey' => [
            'name' => 'Monkey Management',
            'description' => 'The "monkey on your back" concept.',
        ],
        'home/about' => [
            'name' => 'About PMWay',
            'description' => 'Learn more about PMWay. Legacy.',
        ],
        'home/baseline' => [ // CHANGED: added
            'name' => 'Baseline',
            'description' => 'Project baseline management.',
        ],
        'home/dml' => [ // CHANGED: added
            'name' => 'DML',
            'description' => 'Data Manipulation Language.',
        ],
        'public-landing' => [ // CHANGED: added
            'name' => 'Public Landing',
            'description' => 'A landing page for links to access folders directly via .htaccess security control (or not) on the public directory.',
        ],


        // ===========================================================================
        // NEW ROUTES ADDED FROM YOUR ARRAY (Below this line are the new additions)
        // ===========================================================================

        // Governance - This was the only route from your array that wasn't already in the file
        'home/landscape' => [
            'name' => 'Governance Landscape',
            'description' => 'Governance landscape overview.',
        ],

        // Working Software - Another route that was missing
        'home/workingsoftware' => [
            'name' => 'Working Software',
            'description' => 'Working software principles and practices.',
        ],

        // Working Software - Another route that was missing
        'booklets/seagull' => [
            'name' => 'Scientology Stuff',
            'description' => 'Note:  I have been a Scientologist for over 45 years.  I have learned my ethics approach from Scientology.  I know Scientology has received bad press.  I find it hard to understand why a philosophical approach that has its own dictionary is a problem.  That said I appreciate that many people may not understand or like Scientology.  If you are not into this then click "Go Back" on the button below to avoid being transferred to these documents which are only a small part of the PMWay web.',
        ],

        // Working Software - Another route that was missing
        'booklets/dicts' => [
            'name' => 'Scientology Dictionary',
            'description' => 'Note:  I have been a Scientologist for over 45 years.  I have learned my ethics approach from Scientology.  I know Scientology has received bad press.  I find it hard to understand why a philosophical approach that has its own dictionary is a problem.  That said I appreciate that many people may not understand or like Scientology.  If you are not into this then click "Go Back" on the button below to avoid being transferred to these documents which are only a small part of the PMWay web.',
        ],
    ],
];