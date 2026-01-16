<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class CodeAudit extends Command
{
    protected $signature = 'code:audit
                            {--file= : Run all tools against a single file instead of the default paths}
                            {--phpstan-level=8 : PHPStan analysis level (0-8)}
                            {--phpstan-paths=app,routes,database : Comma-separated paths for PHPStan}
                            {--rector-dry-run : Run Rector in dry-run mode instead of applying changes}
                            {--pint : Run Laravel Pint on the file or paths}';

    protected $description = 'Run Rector, PHPStan, and Pint to check and analyze PHP code safely';

    public function handle()
    {
        $fileOption = $this->option('file');
        $this->info("=== PHPStan Analysis ===");

        // Determine PHPStan paths
        $phpstanPaths = $fileOption ? [$fileOption] : explode(',', $this->option('phpstan-paths'));
        $phpstanCommand = [
            base_path('vendor/bin/phpstan'),
            'analyse',
            ...$phpstanPaths,
            '--level=' . $this->option('phpstan-level')
        ];

        $phpstanProcess = new Process($phpstanCommand);
        $phpstanProcess->setTimeout(null);
        $phpstanProcess->run(function ($type, $buffer) {
            echo $buffer;
        });

        if ($phpstanProcess->isSuccessful()) {
            $this->info("\n✔ PHPStan completed successfully. No errors found.");
        } else {
            $this->warn("\n⚠ PHPStan detected issues.");
        }

        $this->info("\n=== Rector Analysis ===");

        // Determine Rector paths
        $rectorPaths = $fileOption ? [$fileOption] : [base_path()];
        $rectorCommand = [
            base_path('vendor/bin/rector'),
            'process',
            ...$rectorPaths
        ];

        if ($this->option('rector-dry-run')) {
            $rectorCommand[] = '--dry-run';
        }

        $rectorProcess = new Process($rectorCommand);
        $rectorProcess->setTimeout(null);
        $rectorProcess->run(function ($type, $buffer) {
            echo $buffer;
        });

        if ($rectorProcess->isSuccessful()) {
            $this->info("\n✔ Rector analysis completed successfully.");
        } else {
            $this->warn("\n⚠ Rector detected issues in your code.");
        }

        // Optional: Run Pint
        if ($this->option('pint')) {
            $this->info("\n=== Laravel Pint Analysis ===");
            $pintPaths = $fileOption ? [$fileOption] : [base_path() . '/app'];
            $pintCommand = [
                base_path('vendor/bin/pint'),
                ...$pintPaths
            ];

            $pintProcess = new Process($pintCommand);
            $pintProcess->setTimeout(null);
            $pintProcess->run(function ($type, $buffer) {
                echo $buffer;
            });

            if ($pintProcess->isSuccessful()) {
                $this->info("\n✔ Pint analysis completed successfully.");
            } else {
                $this->warn("\n⚠ Pint detected issues.");
            }
        }

        return Command::SUCCESS;
    }
}
