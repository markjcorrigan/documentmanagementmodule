# Bootstrap Dark Mode Quick Reference
## For Laravel 12 Livewire Pages

---

## 📁 File Structure
```
Layout:     resources/views/components/layout.blade.php
Head:       Inline in layout.blade.php (includes <head> section)
Footer:     <x-footerbs /> component
Navbar:     Defined in layout.blade.php (can be customized there)
```

---

## 🎨 How Dark Mode Works

The `layout.blade.php` file automatically handles dark mode:
- Reads from `localStorage.getItem('flux.appearance')` or `localStorage.getItem('theme')`
- Adds `.dark` class to `<html>` element when in dark mode
- All Bootstrap components are automatically styled via CSS in layout

**You don't need to add dark mode classes** - it's handled automatically!

---

## 📝 Text & Typography

### Headers (Auto-styled)
```html
<h1>Main Page Title</h1>
<h2>Section Title</h2>
<h3>Subsection Title</h3>
<h4>Minor Heading</h4>
<h5>Small Heading</h5>
<h6>Smallest Heading</h6>
```

### Paragraphs
```html
<!-- Regular paragraph with auto dark mode -->
<p class="text-content">Your paragraph text here</p>

<!-- Lead paragraph (larger) -->
<p class="lead text-content">Larger introductory text</p>

<!-- Muted text -->
<p class="text-muted">Less important text</p>

<!-- Small text -->
<small>Fine print or captions</small>
```

### Links
```html
<!-- Primary colored link -->
<a href="#" class="text-primary">Link text</a>

<!-- Link with wire:navigate for Livewire -->
<a wire:navigate href="/page" class="text-primary">Internal link</a>

<!-- Link in paragraph -->
<p class="text-content">
    Text with <a href="#" class="text-primary">a link</a> inside.
</p>
```

---

## 🎯 Layout & Containers

### Container
```html
<!-- Standard container -->
<div class="container">
    <!-- Content -->
</div>

<!-- Narrow container (custom class) -->
<div class="container container--narrow">
    <!-- Content -->
</div>

<!-- Full width container -->
<div class="container-fluid">
    <!-- Content -->
</div>
```

### Grid System
```html
<!-- Two columns -->
<div class="row">
    <div class="col-md-6">Left column</div>
    <div class="col-md-6">Right column</div>
</div>

<!-- Three columns -->
<div class="row">
    <div class="col-md-4">Column 1</div>
    <div class="col-md-4">Column 2</div>
    <div class="col-md-4">Column 3</div>
</div>

<!-- Responsive: 1 col mobile, 2 col tablet, 3 col desktop -->
<div class="row">
    <div class="col-12 col-md-6 col-lg-4">Column</div>
    <div class="col-12 col-md-6 col-lg-4">Column</div>
    <div class="col-12 col-md-6 col-lg-4">Column</div>
</div>
```

---

## 🔘 Buttons

### Standard Buttons
```html
<button class="btn btn-primary">Primary</button>
<button class="btn btn-secondary">Secondary</button>
<button class="btn btn-success">Success</button>
<button class="btn btn-danger">Danger</button>
<button class="btn btn-warning">Warning</button>
<button class="btn btn-info">Info</button>
```

### Outline Buttons
```html
<button class="btn btn-outline-primary">Outline Primary</button>
<button class="btn btn-outline-secondary">Outline Secondary</button>
```

### Button Sizes
```html
<button class="btn btn-primary btn-lg">Large</button>
<button class="btn btn-primary">Normal</button>
<button class="btn btn-primary btn-sm">Small</button>
```

### Button as Link
```html
<a wire:navigate href="/page" class="btn btn-primary">Button Link</a>
```

---

## 📦 Cards

### Basic Card
```html
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Card Title</h5>
        <p class="card-text">Card content goes here.</p>
        <a href="#" class="btn btn-primary">Action</a>
    </div>
</div>
```

### Card with Header
```html
<div class="card">
    <div class="card-header">
        Featured
    </div>
    <div class="card-body">
        <h5 class="card-title">Card Title</h5>
        <p class="card-text">Content here.</p>
    </div>
</div>
```

### Card with Shadow
```html
<div class="card shadow-sm">
    <div class="card-body">
        Content
    </div>
</div>
```

---

## 🚨 Alerts

```html
<!-- Info Alert -->
<div class="alert alert-primary" role="alert">
    <strong>Info:</strong> Information message
</div>

<!-- Success Alert -->
<div class="alert alert-success" role="alert">
    <strong>Success!</strong> Action completed successfully
</div>

<!-- Warning Alert -->
<div class="alert alert-warning" role="alert">
    <strong>Warning:</strong> Be careful about this
</div>

<!-- Error Alert -->
<div class="alert alert-danger" role="alert">
    <strong>Error:</strong> Something went wrong
</div>

<!-- Dismissible Alert -->
<div class="alert alert-info alert-dismissible fade show" role="alert">
    Message here
    <button type="button" class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>
</div>
```

---

## 📋 Lists

### Unordered List
```html
<ul class="text-content">
    <li>First item</li>
    <li>Second item</li>
    <li>Third item</li>
</ul>
```

### Ordered List
```html
<ol class="text-content">
    <li>First item</li>
    <li>Second item</li>
    <li>Third item</li>
</ol>
```

### List Group
```html
<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active">
        Active item
    </a>
    <a href="#" class="list-group-item list-group-item-action">
        Second item
    </a>
    <a href="#" class="list-group-item list-group-item-action">
        Third item
    </a>
</div>
```

---

## 📊 Tables

```html
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Item One</td>
            <td><span class="badge badge-success">Active</span></td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Item Two</td>
            <td><span class="badge badge-warning">Pending</span></td>
        </tr>
    </tbody>
</table>
```

---

## 📝 Forms

### Basic Form
```html
<form>
    <!-- Text Input -->
    <div class="form-group">
        <label for="inputName">Name</label>
        <input type="text" class="form-control" id="inputName" placeholder="Enter name">
    </div>

    <!-- Email Input -->
    <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" placeholder="Enter email">
        <small class="form-text text-muted">Helper text here</small>
    </div>

    <!-- Select Dropdown -->
    <div class="form-group">
        <label for="selectOption">Select</label>
        <select class="form-control" id="selectOption">
            <option>Option 1</option>
            <option>Option 2</option>
        </select>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <label for="textArea">Message</label>
        <textarea class="form-control" id="textArea" rows="3"></textarea>
    </div>

    <!-- Checkbox -->
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="check1">
        <label class="form-check-label" for="check1">
            Check me out
        </label>
    </div>

    <!-- Buttons -->
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
</form>
```

---

## 🏷️ Badges

```html
<span class="badge badge-primary">Primary</span>
<span class="badge badge-secondary">Secondary</span>
<span class="badge badge-success">Success</span>
<span class="badge badge-danger">Danger</span>
<span class="badge badge-warning">Warning</span>
<span class="badge badge-info">Info</span>
```

---

## 🖼️ Images

```html
<!-- Responsive image -->
<img src="image.jpg" class="img-fluid" alt="Description">

<!-- Rounded image -->
<img src="image.jpg" class="img-fluid rounded" alt="Description">

<!-- Thumbnail -->
<img src="image.jpg" class="img-thumbnail" alt="Description">

<!-- Circle -->
<img src="image.jpg" class="rounded-circle" style="width: 100px; height: 100px;" alt="Avatar">
```

---

## 💬 Blockquote

```html
<blockquote class="blockquote">
    <p class="mb-0">Quote text here</p>
    <footer class="blockquote-footer">
        Author Name in <cite title="Source">Source Title</cite>
    </footer>
</blockquote>
```

---

## 🎨 Common Patterns

### Section with Background
```html
<section class="bg-white py-5">
    <div class="container">
        <!-- Content -->
    </div>
</section>

<!-- Alternate background -->
<section class="bg-light py-5">
    <div class="container">
        <!-- Content -->
    </div>
</section>
```

### Hero Section
```html
<section class="bg-white py-5">
    <div class="container">
        <h1 class="display-4 font-weight-bold mb-3">
            Main Title
        </h1>
        <p class="lead text-content mb-4">
            Subtitle or description
        </p>
        <a href="#" class="btn btn-primary btn-lg">Get Started</a>
    </div>
</section>
```

### Divider
```html
<hr class="my-5">
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
    #[Layout('components.layout')]
    public function render()
    {
        return view('livewire.your-page');
    }
}
```

---

## 📝 Important Notes

1. **Dark Mode is Automatic**: The layout.blade.php handles all dark mode styling via CSS
2. **Use `.text-content` for paragraphs**: This ensures proper color in both modes
3. **Navbar customization**: Edit the navbar directly in `layout.blade.php`
4. **Footer component**: Uses `<x-footerbs />` - create/edit at `resources/views/components/footerbs.blade.php`
5. **Bootstrap 4**: This layout uses Bootstrap 4.1.3
6. **Spacing**: Use Bootstrap's spacing utilities: `mt-3`, `mb-4`, `py-5`, etc.
7. **Responsive**: Use Bootstrap's grid classes: `col-12`, `col-md-6`, `col-lg-4`

---

## 🔍 Spacing Utilities

```html
<!-- Margins -->
mt-1 to mt-5  (margin-top)
mb-1 to mb-5  (margin-bottom)
ml-1 to ml-5  (margin-left)
mr-1 to mr-5  (margin-right)
mx-1 to mx-5  (margin horizontal)
my-1 to my-5  (margin vertical)

<!-- Padding -->
pt-1 to pt-5  (padding-top)
pb-1 to pb-5  (padding-bottom)
pl-1 to pl-5  (padding-left)
pr-1 to pr-5  (padding-right)
px-1 to px-5  (padding horizontal)
py-1 to py-5  (padding vertical)
```

---

## 🎯 Display Utilities

```html
<!-- Display types -->
d-block, d-inline, d-inline-block, d-flex, d-none

<!-- Responsive display -->
d-none d-md-block  (hidden on mobile, visible on tablet+)
d-block d-md-none  (visible on mobile, hidden on tablet+)

<!-- Text alignment -->
text-left, text-center, text-right
text-sm-center  (centered on small screens and up)
```
