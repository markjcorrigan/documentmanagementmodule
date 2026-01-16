# PMWAY STYLE GUIDE ESSENCE

## PERSONAL WORK PREFERENCES
- **Step-by-step approach**: I prefer gradual, methodical work rather than solutions pouring in all at once
- **Complete page returns**: Return fully edited pages I can copy/paste - don't ask me to insert snippets
- **Direction vs Solution**: I define the direction (1000-foot view), AI defines the implementation solution
- **Course correction**: I'm open to being told if I'm off track, but want to maintain strategic direction

## TECHNICAL STACK
- **Framework**: Laravel 12 with Livewire
- **CSS**: Tailwind CSS (primary)
- **Legacy**: Bootstrap in older sections (avoid in new work)
- **Auth**: Spatie permissions with:
  - Super Admin Role: `markjc`
  - Standard Role: All other users (logon authorization only)

## CRITICAL LAYOUT STRUCTURE
LAYOUT PATH: C:\xampp\htdocs\pmway.hopto.org\resources\views\components\layouts\app\frontend.blade.php
HEAD PATH: C:\xampp\htdocs\pmway.hopto.org\resources\views\partials\head.blade.php

EVERY COMPONENT MUST FOLLOW THIS FORMAT:
#[Layout('components.layouts.app.frontend', ['title' => 'Page Title'])]
class ComponentName extends FrontendComponent

text

## LIVE MODULE STRUCTURE
New modules go in: livewire/newmodulefolder/
Each module = self-contained folder with component classes and views

text

## DARK/LIGHT MODE IMPLEMENTATION
- **Switcher**: Menu toggle using `flux:appearance` in localStorage
- **Requirement**: ALL styles MUST include `dark:` variants
- **System**: Uses Tailwind's built-in dark mode with class strategy

---

## CORE STYLE RULES (CONDENSED)

### PAGE STRUCTURE
```html
<div class="max-w-6xl mx-auto px-4 py-8">
  <!-- All content -->
</div>
TEXT HIERARCHY
H1: text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4

H2: text-2xl font-semibold text-gray-900 dark:text-white mb-6

Body: text-xl leading-relaxed text-gray-700 dark:text-gray-300

Small: text-sm text-gray-600 dark:text-gray-400 mt-3

COLOR SYSTEM
text
Light: bg-white / text-gray-900 / text-gray-700
Dark: dark:bg-zinc-800 / dark:text-white / dark:text-gray-300
Content Areas: bg-gray-50 dark:bg-gray-900
FILE ACCESS (AUTH REQUIRED)
html
<!-- PDF View: --> {{ url('viewpdf/{folder}/{file}') }}
<!-- Download: --> {{ url('download/{folder}/{file}') }}
<!-- Video: --> {{ url('viewvideo/{folder}/{file}') }}
TRANSPARENT IMAGES
html
<div class="bg-white dark:bg-white p-4 rounded-lg border">
  <img src="transparent.png" alt="">
</div>
CSS SCOPING (CRITICAL)
html
<style>.page-scope .element { }</style>
<div class="page-scope"><!-- page content --></div>
LIVEWIRE COMPONENT TEMPLATE
php
<?php
namespace App\Livewire\ModuleFolder;

use Livewire\Attributes\Layout;
use App\Livewire\FrontendComponent;

#[Layout('components.layouts.app.frontend', ['title' => 'Page Title'])]
class ComponentName extends FrontendComponent
{
    public function render()
    {
        return view('livewire.module-folder.view-name');
    }
}
QUICK REFERENCE TABLE
Element	Classes
Page Container	max-w-6xl mx-auto px-4 py-8
Content Card	bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700
Primary Button	bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white py-2 px-4 rounded
Link	text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300
Transparent Image Wrapper	bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400
ESSENTIAL WORKFLOW RULES
Always extend FrontendComponent (not Component)

Always include #[Layout('components.layouts.app.frontend', ['title' => '...'])]

Always provide dark: variants for colors

Always scope page-specific CSS with wrapper class

Always return complete pages - no snippet insertion requests

Always organize new modules in livewire/modulefolder/

Always use Tailwind (not Bootstrap for new work)

FILE STRUCTURE FOR NEW MODULES
text
app/Livewire/NewModule/
  ├── ComponentClass.php
  └── NestedComponent.php

resources/views/livewire/new-module/
  ├── component-view.blade.php
  └── nested-view.blade.php