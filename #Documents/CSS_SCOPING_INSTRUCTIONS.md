# MANUAL CSS SCOPING INSTRUCTIONS
# For: resources/views/livewire/pmway/itil/itilfourpracticeslive.blade.php

## STEP 1: Add Opening Scoping Wrapper
Find the main content container (usually near the top after @section or <div>) and add:

BEFORE:
<div class="max-w-6xl mx-auto px-4 py-8">

AFTER:
<div class="itilfour-practices-content">
    <div class="max-w-6xl mx-auto px-4 py-8">

## STEP 2: Add Closing Scoping Wrapper
Find the very last </div> in the file and add:

BEFORE:
</div>

AFTER:
</div>
</div>  <!-- Close the scoping wrapper -->

## STEP 3: Update CSS Styles
If you have any <style> section in this file, prefix ALL selectors:

BEFORE:
.carousel { }
.btn { }
.slide-number-btn { }

AFTER:
.itilfour-practices-content .carousel { }
.itilfour-practices-content .btn { }
.itilfour-practices-content .slide-number-btn { }

## STEP 4: Example of Complete Structure

<div class="itilfour-practices-content">
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- ALL YOUR EXISTING CONTENT GOES HERE -->
        
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4">
            Your Title
        </h1>
        
        <!-- ... rest of your content ... -->
        
    </div>
</div>

## STEP 5: Verify
- Make sure there's exactly one opening and one closing scoping wrapper
- Test the page to ensure styles still work
- Check that global components (header, menu) are not affected
