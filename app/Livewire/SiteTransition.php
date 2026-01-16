<?php

// app/Livewire/SiteTransition.php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Transition'])]
class SiteTransition extends FrontendComponent
{
    public $target;

    public $destinationName;

    public $description;

    public $icon = '📄';

    public $error = null;

    public function mount()
    {
        try {
            $this->target = request()->get('target');

            if (empty($this->target)) {
                $this->error = 'No target specified';
                Log::warning('SiteTransition: No target in request');

                return;
            }

            // Get route info from config
            $routes = config('legacy.routes', []);

            if (! isset($routes[$this->target])) {
                $this->error = 'Invalid target: '.$this->target;
                Log::warning('SiteTransition: Target not in config', [
                    'target' => $this->target,
                    'available_routes' => array_keys($routes),
                ]);

                // Set defaults
                $this->destinationName = 'Legacy Page';
                $this->description = 'This is a legacy page.';

                return;
            }

            $this->destinationName = $routes[$this->target]['name'];
            $this->description = $routes[$this->target]['description'];

            Log::debug('SiteTransition: Mounted successfully', [
                'target' => $this->target,
                'name' => $this->destinationName,
            ]);

        } catch (\Exception $e) {
            $this->error = 'An error occurred loading this page.';
            Log::error('SiteTransition: Mount error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.site-transition');
    }
}
