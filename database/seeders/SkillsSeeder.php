<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $defaultIcon = 'storage/images/defaulticon.png';

        $skills = [
            // Project Management Methodologies & Frameworks
            ['technology_name' => 'PMBOK 6', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'PRINCE2 Practitioner', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'PRINCE2 Agile', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'AgilePM (DSDM)', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Scrum Master', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Scrum Product Owner', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'SAFe Scrum Master', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'SAFe Advanced Scrum Master', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'SAFe Product Owner Product Manager', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'SAFe DevOps Practitioner', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Extreme Programming (XP)', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Program Management', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Portfolio Management', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'PMO Setup & Management', 'exp_level' => 5, 'icon' => $defaultIcon],

            // IT Service Management & Governance
            ['technology_name' => 'ITIL 4 Strategic Leader', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'ITIL 4 Managing Professional', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'ITIL 3 Full Lifecycle', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'COBIT 5 Foundation', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'CMMi Development', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'CMMi Services', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'CMMi Acquisition', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'CMMi People', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'IT Governance', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Risk Management', 'exp_level' => 5, 'icon' => $defaultIcon],

            // Business & Strategic Skills
            ['technology_name' => 'Business Management', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'IT Management', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Business Analysis', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Business Process Reengineering', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Process Modelling', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Strategic Management', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Change Management', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Team Leadership', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Stakeholder Management', 'exp_level' => 5, 'icon' => $defaultIcon],

            // Microsoft Technologies
            ['technology_name' => 'Microsoft Project Server (PMIS)', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Microsoft Project', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Microsoft Office Suite', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Microsoft Visio', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Microsoft Azure', 'exp_level' => 3, 'icon' => $defaultIcon],
            ['technology_name' => 'Microsoft Power Platform', 'exp_level' => 2, 'icon' => $defaultIcon],
            ['technology_name' => 'Power BI', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Power Apps', 'exp_level' => 3, 'icon' => $defaultIcon],
            ['technology_name' => 'Power Automate', 'exp_level' => 3, 'icon' => $defaultIcon],
            ['technology_name' => 'SharePoint', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Microsoft BizTalk Server', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Microsoft SQL Server', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Visual Studio', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Visual Studio Code', 'exp_level' => 4, 'icon' => $defaultIcon],

            // Programming Languages
            ['technology_name' => 'C', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'C++', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'C#', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Visual Basic', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'PHP', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'PHP OOP', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Laravel 5-10', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Slim 4', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'JavaScript', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Java', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'HTML5', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'CSS3', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Delphi', 'exp_level' => 3, 'icon' => $defaultIcon],

            // Big Data & Analytics
            ['technology_name' => 'Hadoop', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Scala', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Ambari', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Hive', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'SAP Business Intelligence', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'SAP Business Warehouse', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Business Objects', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Cognos Impromptu', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Cognos Powerplay', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'QlikView', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Crystal Reports', 'exp_level' => 4, 'icon' => $defaultIcon],

            // Database Technologies
            ['technology_name' => 'Oracle 8', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'AS 400 DBA', 'exp_level' => 3, 'icon' => $defaultIcon],

            // Project & Issue Tracking
            ['technology_name' => 'Jira', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'DevTrack', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'TaskTimer', 'exp_level' => 4, 'icon' => $defaultIcon],

            // Service Management Platforms
            ['technology_name' => 'ServiceNow', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'CMDB', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Service Catalogue', 'exp_level' => 5, 'icon' => $defaultIcon],

            // Design & Documentation
            ['technology_name' => 'UML', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'ARIS', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Adobe Photoshop', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Adobe Dreamweaver', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Adobe Writer (PDF)', 'exp_level' => 5, 'icon' => $defaultIcon],

            // SAP Technologies
            ['technology_name' => 'SAP Solution Manager', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'SAP Production Management', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'SAP JIT/JIS Planning', 'exp_level' => 4, 'icon' => $defaultIcon],

            // Financial Systems & Payments
            ['technology_name' => 'Real-time Payments Systems', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Acquirer Systems', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Interchange Systems', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Payment Processing', 'exp_level' => 5, 'icon' => $defaultIcon],

            // Specialized Knowledge Areas
            ['technology_name' => 'Data Migration', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Single Sign On (SSO)', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Data Warehousing', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'API Integration', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Supply Chain Management', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Quality Management', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Value Stream Mapping', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Web Development', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Client-Server Architecture', 'exp_level' => 4, 'icon' => $defaultIcon],

            // Development Tools
            ['technology_name' => 'PHPStorm', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'Git', 'exp_level' => 4, 'icon' => $defaultIcon],
            ['technology_name' => 'GitHub', 'exp_level' => 4, 'icon' => $defaultIcon],

            // Soft Skills
            ['technology_name' => 'Team Management', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Coaching & Mentoring', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Budget Management', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Contract Negotiation', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Vendor Management', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Strategic Planning', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Problem Solving', 'exp_level' => 5, 'icon' => $defaultIcon],
            ['technology_name' => 'Process Improvement', 'exp_level' => 5, 'icon' => $defaultIcon],
        ];

        // Add timestamps to each skill
        foreach ($skills as &$skill) {
            $skill['created_at'] = $now;
            $skill['updated_at'] = $now;
        }

        // Insert all skills
        DB::table('skills')->insert($skills);

        $this->command->info('Skills seeded successfully!');
    }
}
