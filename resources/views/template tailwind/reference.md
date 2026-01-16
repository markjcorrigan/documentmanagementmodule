# Tailwind CSS Dark Mode Quick Reference
## For Laravel 12 Livewire Pages

---

## 📁 File Structure
```
Layout:     resources/views/components/layouts/app/frontend.blade.php
Head:       resources/views/partials/head.blade.php
Footer:     resources/views/partials/footer.blade.php
Config:     config/livewire.php → 'layout' => 'components.layouts.app.frontend'
```

---

## 🎨 Color Classes (Light & Dark Mode)

### Headers / Titles
```html
<h1 class="text-zinc-900 dark:text-white">
<h2 class="text-zinc-900 dark:text-white">
<h3 class="text-zinc-900 dark:text-white">
```

### Body Text
```html
<p class="text-zinc-700 dark:text-zinc-200">Regular paragraph</p>
<p class="text-zinc-600 dark:text-zinc-300">Slightly muted text</p>
<p class="text-zinc-500 dark:text-zinc-400">Very muted text</p>
```

### Links
```html
<a href="#" class="text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 hover:underline">
    Link text
</a>
```

### Backgrounds
```html
<!-- Page sections -->
<section class="bg-white dark:bg-zinc-800">
<section class="bg-zinc-50 dark:bg-zinc-900">

<!-- Cards/Containers -->
<div class="bg-white dark:bg-zinc-800">
```

### Borders
```html
<div class="border border-zinc-200 dark:border-zinc-700">
```

---

## 🔘 Buttons

### Primary Button
```html
<button class="px-6 py-3 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-medium rounded-lg transition-colors">
    Primary Button
</button>
```

### Secondary Button
```html
<button class="px-6 py-3 bg-zinc-200 hover:bg-zinc-300 dark:bg-zinc-700 dark:hover:bg-zinc-600 text-zinc-900 dark:text-white font-medium rounded-lg transition-colors">
    Secondary Button
</button>
```

### Outline Button
```html
<button class="px-6 py-3 border-2 border-blue-600 dark:border-blue-400 text-blue-600 dark:text-blue-400 hover:bg-blue-600 dark:hover:bg-blue-500 hover:text-white font-medium rounded-lg transition-colors">
    Outline Button
</button>
```

---

## 📦 Card/Box Component
```html
<div class="bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 rounded-lg p-6 shadow-sm">
    <h4 class="text-xl font-semibold text-zinc-900 dark:text-white mb-3">
        Card Title
    </h4>
    <p class="text-zinc-600 dark:text-zinc-300">
        Card content here
    </p>
</div>
```

---

## 📋 Lists

### Unordered List
```html
<ul class="list-disc list-inside space-y-2 text-zinc-700 dark:text-zinc-200">
    <li>Item one</li>
    <li>Item two</li>
    <li>Item three</li>
</ul>
```

### Ordered List
```html
<ol class="list-decimal list-inside space-y-2 text-zinc-700 dark:text-zinc-200">
    <li>First item</li>
    <li>Second item</li>
    <li>Third item</li>
</ol>
```

---

## 🚨 Alert Boxes

### Info Alert
```html
<div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-600 dark:border-blue-400 p-4">
    <p class="text-blue-800 dark:text-blue-200">
        <strong>Info:</strong> Your message here
    </p>
</div>
```

### Success Alert
```html
<div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-600 dark:border-green-400 p-4">
    <p class="text-green-800 dark:text-green-200">
        <strong>Success:</strong> Your message here
    </p>
</div>
```

### Warning Alert
```html
<div class="bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-600 dark:border-yellow-400 p-4">
    <p class="text-yellow-800 dark:text-yellow-200">
        <strong>Warning:</strong> Your message here
    </p>
</div>
```

---

## 🖼️ Images
```html
<img src="{{ asset('path/to/image.jpg') }}" 
     alt="Description" 
     class="w-full h-64 object-cover rounded-lg dark:opacity-90">
```

---

## 💬 Blockquote
```html
<blockquote class="border-l-4 border-zinc-300 dark:border-zinc-600 pl-4 py-2 my-6 italic text-zinc-700 dark:text-zinc-300">
    "Your quote here"
</blockquote>
```

---

## 📐 Layout Classes

### Container
```html
<div class="container mx-auto px-4">
    <!-- Content -->
</div>
```

### Two Column Grid
```html
<div class="grid md:grid-cols-2 gap-8">
    <div>Left column</div>
    <div>Right column</div>
</div>
```

### Three Column Grid
```html
<div class="grid md:grid-cols-3 gap-6">
    <div>Column 1</div>
    <div>Column 2</div>
    <div>Column 3</div>
</div>
```

---

## 🎯 Common Patterns

### Section with Padding
```html
<section class="bg-white dark:bg-zinc-800 py-12">
    <div class="container mx-auto px-4">
        <!-- Content -->
    </div>
</section>
```

### Hero Section
```html
<section class="bg-white dark:bg-zinc-800 py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold text-zinc-900 dark:text-white mb-4">
            Title
        </h1>
        <p class="text-xl text-zinc-600 dark:text-zinc-300">
            Subtitle
        </p>
    </div>
</section>
```

---

## ⚡ Livewire Component Setup

```php
<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class YourPage extends Component
{
    #[Layout('components.layouts.app.frontend')]
    public function render()
    {
        return view('livewire.your-page');
    }
}
```

---

## 📝 Notes

- Always wrap page content in `<div class="w-full">`
- Use `wire:navigate` for internal links for smooth Livewire navigation
- Images should have `dark:opacity-90` for better dark mode appearance
- Add `transition-colors` to buttons/links for smooth hover effects
- Use `container mx-auto px-4` for centered, responsive content
