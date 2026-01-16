<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResumesSeeder extends Seeder
{
    public function run()
    {
        $resumes = [
            // Previous Education entries are now experience
            ['resume_cat' => 'experience', 'resume_title' => 'Senior Project Manager and Coach', 'institution' => 'NTT', 'from_year' => '07/2023', 'to_year' => '04/2024'],
            ['resume_cat' => 'experience', 'resume_title' => 'Program Manager', 'institution' => 'ACI Worldwide', 'from_year' => '08/2022', 'to_year' => '06/2023'],
            ['resume_cat' => 'experience', 'resume_title' => 'SAFe | Scrum Master', 'institution' => 'NTT', 'from_year' => '01/2021', 'to_year' => '07/2022'],
            ['resume_cat' => 'experience', 'resume_title' => 'SAFe Scrum Master / Product Owner / Agile Coach', 'institution' => 'ABSA', 'from_year' => '09/2017', 'to_year' => '12/2020'],
            ['resume_cat' => 'experience', 'resume_title' => 'Program Manager', 'institution' => 'SITA', 'from_year' => '03/2010', 'to_year' => '05/2017'],
            ['resume_cat' => 'experience', 'resume_title' => 'PMO Consultant', 'institution' => 'Nissan South Africa', 'from_year' => '08/2004', 'to_year' => '09/2009'],
            ['resume_cat' => 'experience', 'resume_title' => 'Program Management', 'institution' => 'Medscheme Services Quality Division', 'from_year' => '12/2003', 'to_year' => '06/2004'],
            ['resume_cat' => 'experience', 'resume_title' => 'PMO Consultant', 'institution' => 'GPConnect', 'from_year' => '02/2002', 'to_year' => '12/2002'],
            ['resume_cat' => 'experience', 'resume_title' => 'IT Development Director', 'institution' => 'LiveBet', 'from_year' => '05/2001', 'to_year' => '01/2002'],
            ['resume_cat' => 'experience', 'resume_title' => 'New Product Development Manager', 'institution' => 'Medikredit', 'from_year' => '01/2000', 'to_year' => '02/2001'],
            ['resume_cat' => 'experience', 'resume_title' => 'R & D Divisional Director', 'institution' => 'Medscheme Managed Care Division', 'from_year' => '06/1995', 'to_year' => '07/1999'],
            ['resume_cat' => 'experience', 'resume_title' => 'Group Marketing Manager', 'institution' => 'Medscheme Marketing Division', 'from_year' => '01/1990', 'to_year' => '05/1995'],
            ['resume_cat' => 'experience', 'resume_title' => 'Salesman and Marketeer', 'institution' => 'Living Flair and PakCraft PLC', 'from_year' => '01/1988', 'to_year' => '12/1989'],
            ['resume_cat' => 'experience', 'resume_title' => 'TV News Reporter', 'institution' => 'South African Broadcasting Corporation', 'from_year' => '01/1986', 'to_year' => '05/1987'],
            ['resume_cat' => 'experience', 'resume_title' => 'Student', 'institution' => 'Rhodes University', 'from_year' => '01/1983', 'to_year' => '12/1985'],
            ['resume_cat' => 'experience', 'resume_title' => 'National Service', 'institution' => 'South African Police', 'from_year' => '01/1980', 'to_year' => '12/1982'],
            ['resume_cat' => 'experience', 'resume_title' => 'Scholar', 'institution' => 'St Stithians College', 'from_year' => '01/1974', 'to_year' => '12/1979'],

            // Certificates and Degrees (previously experience) are now education
            ['resume_cat' => 'education', 'resume_title' => 'MSc. Computer Science', 'institution' => 'University of South Africa', 'from_year' => '2019', 'to_year' => '2022'],
            ['resume_cat' => 'education', 'resume_title' => 'BCom Honours. Informatics', 'institution' => 'University of South Africa', 'from_year' => '2011', 'to_year' => '2014'],
            ['resume_cat' => 'education', 'resume_title' => 'BCom Informatics', 'institution' => 'University of South Africa', 'from_year' => '2005', 'to_year' => '2008'],
            ['resume_cat' => 'education', 'resume_title' => 'BA. English | Journalism', 'institution' => 'Rhodes University', 'from_year' => '1982', 'to_year' => '1985'],
            ['resume_cat' => 'education', 'resume_title' => 'Project Management Professional', 'institution' => 'Certificate', 'from_year' => '2014', 'to_year' => '2014'],
            ['resume_cat' => 'education', 'resume_title' => 'PRINCE2 Practitioner', 'institution' => 'Certificate', 'from_year' => '2015', 'to_year' => '2015'],
            ['resume_cat' => 'education', 'resume_title' => 'PRINCE2 Agile Practitioner', 'institution' => 'Certificate', 'from_year' => '2017', 'to_year' => '2017'],
            ['resume_cat' => 'education', 'resume_title' => 'AgilePM Practitioner', 'institution' => 'Certificate', 'from_year' => '2016', 'to_year' => '2016'],
            ['resume_cat' => 'education', 'resume_title' => 'Scrum Master', 'institution' => 'Certificate', 'from_year' => '2018', 'to_year' => '2018'],
            ['resume_cat' => 'education', 'resume_title' => 'Scrum Product Owner', 'institution' => 'Certificate', 'from_year' => '2018', 'to_year' => '2018'],
            ['resume_cat' => 'education', 'resume_title' => 'SAFe Scrum Master', 'institution' => 'Certificate', 'from_year' => '2022', 'to_year' => '2022'],
            ['resume_cat' => 'education', 'resume_title' => 'SAFe Advanced Scrum Master', 'institution' => 'Certificate', 'from_year' => '2022', 'to_year' => '2022'],
            ['resume_cat' => 'education', 'resume_title' => 'SAFe Product Owner Product Manager', 'institution' => 'Certificate', 'from_year' => '2022', 'to_year' => '2022'],
            ['resume_cat' => 'education', 'resume_title' => 'SAFe DevOps Practitioner', 'institution' => 'Certificate', 'from_year' => '2023', 'to_year' => '2023'],
            ['resume_cat' => 'education', 'resume_title' => 'ITIL 4 Strategic Leader', 'institution' => 'PeopleCert', 'from_year' => '2022', 'to_year' => '2022'],
            ['resume_cat' => 'education', 'resume_title' => 'ITIL 4 Managing Professional', 'institution' => 'PeopleCert', 'from_year' => '2022', 'to_year' => '2022'],
            ['resume_cat' => 'education', 'resume_title' => 'ITIL 3 Practitioner', 'institution' => 'Axelos', 'from_year' => '2017', 'to_year' => '2017'],
            ['resume_cat' => 'education', 'resume_title' => 'ITIL 3 Service Strategy', 'institution' => 'Axelos', 'from_year' => '2017', 'to_year' => '2017'],
            ['resume_cat' => 'education', 'resume_title' => 'ITIL 3 Service Design', 'institution' => 'Axelos', 'from_year' => '2019', 'to_year' => '2019'],
            ['resume_cat' => 'education', 'resume_title' => 'ITIL 3 Service Transition', 'institution' => 'Axelos', 'from_year' => '2020', 'to_year' => '2020'],
            ['resume_cat' => 'education', 'resume_title' => 'ITIL 3 Service Operations', 'institution' => 'Axelos', 'from_year' => '2017', 'to_year' => '2017'],
            ['resume_cat' => 'education', 'resume_title' => 'ITIL 3 Continual Service Improvement', 'institution' => 'Axelos', 'from_year' => '2017', 'to_year' => '2017'],
            ['resume_cat' => 'education', 'resume_title' => 'COBIT 5 Foundation', 'institution' => 'Certificate', 'from_year' => '2017', 'to_year' => '2017'],
            ['resume_cat' => 'education', 'resume_title' => 'Capability Maturity Model i Development', 'institution' => 'Carnegie Mellon University', 'from_year' => '2012', 'to_year' => '2012'],
            ['resume_cat' => 'education', 'resume_title' => 'Capability Maturity Model I Services', 'institution' => 'Carnegie Mellon University', 'from_year' => '2012', 'to_year' => '2012'],
            ['resume_cat' => 'education', 'resume_title' => 'Capability Maturity Model i Acquisition', 'institution' => 'Carnegie Mellon University', 'from_year' => '2012', 'to_year' => '2012'],
            ['resume_cat' => 'education', 'resume_title' => 'Capability Maturity Model People', 'institution' => 'Carnegie Mellon University', 'from_year' => '2012', 'to_year' => '2012'],
            ['resume_cat' => 'education', 'resume_title' => 'Microsoft Certified Professional', 'institution' => 'Microsoft', 'from_year' => '1998', 'to_year' => '1998'],
            ['resume_cat' => 'education', 'resume_title' => 'Microsoft Certified Systems Engineering', 'institution' => 'Microsoft', 'from_year' => '1999', 'to_year' => '1999'],
            ['resume_cat' => 'education', 'resume_title' => 'MSCE + Internet', 'institution' => 'Microsoft', 'from_year' => '2000', 'to_year' => '2000'],
            ['resume_cat' => 'education', 'resume_title' => 'MCDBA', 'institution' => 'Microsoft', 'from_year' => '2000', 'to_year' => '2000'],
            ['resume_cat' => 'education', 'resume_title' => 'MCDBD', 'institution' => 'Microsoft', 'from_year' => '2000', 'to_year' => '2000'],
            ['resume_cat' => 'education', 'resume_title' => 'Microsoft Enterprise Project Server Admin', 'institution' => 'Microsoft', 'from_year' => '2007', 'to_year' => '2007'],
            ['resume_cat' => 'education', 'resume_title' => 'Microsoft Certified Systems Developer', 'institution' => 'Microsoft', 'from_year' => '2008', 'to_year' => '2008'],
            ['resume_cat' => 'education', 'resume_title' => 'SAP Solution Manager (SAP Africa)', 'institution' => 'Certificate', 'from_year' => '2009', 'to_year' => '2009'],
        ];

        DB::table('resumes')->insert($resumes);
    }
}
