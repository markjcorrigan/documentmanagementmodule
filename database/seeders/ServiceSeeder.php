<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            // Management
            [
                'service_title' => 'Project & Program Management',
                'service_description' => 'Managing complex programs and projects using Agile, PMBOK, PRINCE2, and SAFe methodologies.',
                'category' => 'Management',
            ],
            [
                'service_title' => 'Team Building & Leadership',
                'service_description' => 'Mentoring staff, motivating teams, and achieving project and organizational objectives.',
                'category' => 'Management',
            ],
            [
                'service_title' => 'PMO Setup & Portfolio Management',
                'service_description' => 'Establishing governance frameworks for project oversight and portfolio management.',
                'category' => 'Management',
            ],

            // Strategy
            [
                'service_title' => 'IT Strategy & Governance',
                'service_description' => 'Aligning IT initiatives with business strategy, emphasizing ethical practices and financial accountability.',
                'category' => 'Strategy',
            ],
            [
                'service_title' => 'Change Management',
                'service_description' => 'Guiding organizational change with minimal disruption and effective communication.',
                'category' => 'Strategy',
            ],
            [
                'service_title' => 'Business Process Reengineering',
                'service_description' => 'Redesigning business processes to improve performance, reduce waste, and optimize outcomes.',
                'category' => 'Strategy',
            ],

            // Projects
            [
                'service_title' => 'Risk Management',
                'service_description' => 'Identifying, assessing, and mitigating project and organizational risks.',
                'category' => 'Projects',
            ],
            [
                'service_title' => 'Quality Assurance & Compliance',
                'service_description' => 'Ensuring adherence to ethical practices, regulatory standards, and high-quality deliverables.',
                'category' => 'Projects',
            ],
            [
                'service_title' => 'PMIS Setup & Management',
                'service_description' => 'Implementing Project Management Information Systems to track and report progress efficiently.',
                'category' => 'Projects',
            ],

            // Software
            [
                'service_title' => 'Full Stack Web Development',
                'service_description' => 'Developing robust web applications using Laravel, Slim, PHP OOP, JavaScript, HTML, and CSS.',
                'category' => 'Software',
            ],
            [
                'service_title' => 'Software Development Consulting',
                'service_description' => 'Advising on coding standards, development practices, frameworks, and tools.',
                'category' => 'Software',
            ],
            [
                'service_title' => 'System Implementation & Integration',
                'service_description' => 'Implementing and integrating software solutions across IT environments and platforms.',
                'category' => 'Software',
            ],

            // CMMi
            [
                'service_title' => 'Capability Maturity Model Consulting',
                'service_description' => 'Achieving CMMi Level 4+ process maturity for consistent, high-quality outcomes.',
                'category' => 'CMMi',
            ],
            [
                'service_title' => 'Process Improvement',
                'service_description' => 'Optimizing processes for efficiency, productivity, and sustainability.',
                'category' => 'CMMi',
            ],

            // ITIL
            [
                'service_title' => 'ITIL Process Implementation',
                'service_description' => 'Implementing ITIL processes including Service Strategy, Design, Transition, Operation, and Continual Service Improvement.',
                'category' => 'ITIL',
            ],
            [
                'service_title' => 'IT Operations Management',
                'service_description' => 'Optimizing day-to-day IT support, operations, and service delivery.',
                'category' => 'ITIL',
            ],

            // Process
            [
                'service_title' => 'Process Optimization',
                'service_description' => 'Streamlining workflows, eliminating rework, and improving organizational efficiency.',
                'category' => 'Process',
            ],
            [
                'service_title' => 'Business Analysis & Requirements Engineering',
                'service_description' => 'Capturing and translating business requirements into actionable solutions.',
                'category' => 'Process',
            ],

            // Governance
            [
                'service_title' => 'COBIT Framework Implementation',
                'service_description' => 'Implementing COBIT for enterprise IT governance, risk management, and compliance.',
                'category' => 'Governance',
            ],
            [
                'service_title' => 'DevOps/Lean Governance',
                'service_description' => 'Applying Agile DevOps practices with governance, auditing, and ethical compliance.',
                'category' => 'Governance',
            ],
            [
                'service_title' => 'Ethical Business & Financial Accountability',
                'service_description' => 'Ensuring transparent, ethical practices with financial and operational accountability.',
                'category' => 'Governance',
            ],

            // Additional Services (optional)
            [
                'service_title' => 'Agile & Scrum Coaching',
                'service_description' => 'Coaching teams on Scrum, Agile, and SAFe methodologies for improved performance.',
                'category' => 'Projects',
            ],
            [
                'service_title' => 'IT Risk & Compliance Auditing',
                'service_description' => 'Performing audits to ensure compliance with IT policies, standards, and ethical practices.',
                'category' => 'Governance',
            ],
            [
                'service_title' => 'Technology Assessment & Advisory',
                'service_description' => 'Providing expert advice on technology stacks, integration, and IT strategy.',
                'category' => 'Software',
            ],
        ];

        foreach ($services as $service) {
            DB::table('services')->updateOrInsert(
                ['service_title' => $service['service_title']],
                [
                    'service_description' => $service['service_description'],
                    'category' => $service['category'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
