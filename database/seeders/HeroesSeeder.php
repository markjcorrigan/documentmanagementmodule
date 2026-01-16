<?php

namespace Database\Seeders;

use App\Models\Hero;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class HeroesSeeder extends Seeder
{
    public function run(): void
    {
        // Source paths (from storage)
        $sourceImage = storage_path('app/public/assets/markcorrigan.jpg');
        $sourceResume = storage_path('app/public/assets/markcorrigan.pdf');

        // Destination paths (public folder)
        $heroImageDir = public_path('uploads/hero');
        $resumeDir = public_path('uploads/resume');

        $destImage = $heroImageDir.'/markcorrigan.jpg';
        $destResume = $resumeDir.'/markcorrigan.pdf';

        // Ensure directories exist
        if (! File::exists($heroImageDir)) {
            File::makeDirectory($heroImageDir, 0755, true);
        }
        if (! File::exists($resumeDir)) {
            File::makeDirectory($resumeDir, 0755, true);
        }

        // ✅ Stop seeder if source files are missing
        if (! File::exists($sourceImage) || ! File::exists($sourceResume)) {
            $missing = [];
            if (! File::exists($sourceImage)) {
                $missing[] = 'markcorrigan.jpg';
            }
            if (! File::exists($sourceResume)) {
                $missing[] = 'markcorrigan.pdf';
            }
            $files = implode(', ', $missing);
            $this->command->error("Seeder stopped: missing file(s) in storage/app/public/assets: $files");

            return;
        }

        // Copy files to public folder
        if (! File::exists($destImage)) {
            File::copy($sourceImage, $destImage);
        }
        if (! File::exists($destResume)) {
            File::copy($sourceResume, $destResume);
        }

        // Insert or update hero record
        Hero::updateOrCreate(
            ['name' => 'Mark Corrigan'],
            [
                'profession' => 'IT Professional',
                'short_description' => 'Mark has over 35 years of working experience in Business Management/ Information Technology Management/ Project & Program Management/ Business Analysis/ Business Reengineering/ Strategic Management and Governance.
With 4 completed University Degrees (Msc, BCom, BCom Hons and a BA degree), and with certifications in COBIT 5, ITIL 3/4, PMBOK 6, PRINCE2, DSDM, AgilePM, SCRUM & SAFe (Scrum Master and Product Owner | Product Manager), ISO, Risk, CMMi etc., Mark knows how to maintain and improve “Business as Usual” value through the strategic application of Information Technology, and how to run focused programs and projects for targeted business improvements, identified as strategic goals. Mark knows how to successfully implement Strategic, Business and Project plans.',
                'photo' => 'uploads/hero/markcorrigan.jpg',
                'resume' => 'uploads/resume/markcorrigan.pdf',
                'twitter_url' => 'na',
                'youtube_url' => 'na',
                'linkin_url' => 'https://linkedin.com/in/markjcorrigan',
                'github_url' => 'https://github.com/markjcorrigan',
                'YOE' => 35,
                'PC' => '500',
                'HC' => '5000',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ]
        );

        $this->command->info('Seeder completed: Hero record created/updated, files copied to public/uploads.');
    }
}
