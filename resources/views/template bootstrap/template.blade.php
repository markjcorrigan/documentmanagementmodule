{{--
┌─────────────────────────────────────────────────────────────────────────────┐
│ BOOTSTRAP PAGE TEMPLATE - REUSABLE FOR MULTIPLE PAGES                      │
├─────────────────────────────────────────────────────────────────────────────┤
│                                                                             │
│ LAYOUT USED:                                                                │
│   - resources/views/components/layout.blade.php                            │
│   - Head: Inline in layout.blade.php (not a separate partial)             │
│   - Footer: <x-footerbs /> component                                       │
│                                                                             │
│ LIVEWIRE COMPONENT EXAMPLE:                                                │
│   namespace App\Livewire;                                                  │
│   use Livewire\Component;                                                  │
│   use Livewire\Attributes\Layout;                                          │
│                                                                             │
│   class YourPage extends Component {                                       │
│       #[Layout('components.layout')]                                       │
│       public function render() {                                           │
│           return view('livewire.your-page');                               │
│       }                                                                     │
│   }                                                                         │
│                                                                             │
│ NAVBAR:                                                                     │
│   - Defined in layout.blade.php                                            │
│   - Has Home link, Search, Chat (if @auth)                                │
│   - Shows "Following" and "Create Post" buttons when authenticated         │
│   - You can customize the navbar in layout.blade.php if needed            │
│                                                                             │
│ DARK/LIGHT MODE:                                                           │
│   - All styling is handled by layout.blade.php CSS                         │
│   - Uses .dark class on <html> element                                     │
│   - Dark mode reads from localStorage ('theme' or 'flux.appearance')      │
│                                                                             │
│ BOOTSTRAP CLASSES THAT WORK IN BOTH MODES:                                │
│   Text:       .text-dark (auto switches to light in dark mode)            │
│   Background: .bg-white (auto switches to dark gray in dark mode)         │
│   Borders:    .border (auto adjusts color)                                 │
│   Cards:      .card (fully styled for both modes)                          │
│   Alerts:     .alert-info, .alert-success, .alert-warning                  │
│                                                                             │
│ CUSTOM CLASSES FOR DARK MODE:                                             │
│   .text-content  - For main body text (auto adjusts)                       │
│   .slot-text     - For dynamic content in $slot                            │
│                                                                             │
│ QUICK REFERENCE:                                                           │
│   Headers:    <h1-h6> (auto styled)                                        │
│   Paragraphs: <p class="text-content">                                     │
│   Links:      <a href="#" class="text-primary">                            │
│   Containers: .container or .container--narrow                             │
│   Cards:      .card .card-body                                             │
│   Buttons:    .btn .btn-primary / .btn-success / .btn-outline-primary     │
│                                                                             │
└─────────────────────────────────────────────────────────────────────────────┘
--}}

<div>

    {{-- ============================================================
         HERO SECTION - Main page header with title and subtitle
         ============================================================ --}}
    <section class="bg-white py-5">
        <div class="container">
            {{-- Main Page Title --}}
            <h1 class="display-4 font-weight-bold mb-3">
                Your Page Title Here
            </h1>

            {{-- Subtitle with description --}}
            <p class="lead text-content mb-4">
                A compelling subtitle that describes what this page is about.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>

            {{-- Optional Call-to-Action Button --}}
            <a wire:navigate href="#content" class="btn btn-primary btn-lg">
                Get Started
            </a>
        </div>
    </section>

    {{-- ============================================================
         MAIN CONTENT SECTION - Primary content area
         ============================================================ --}}
    <section id="content" class="py-5">
        <div class="container">

            {{-- Section Header (H2) --}}
            <h2 class="mb-4">Main Section Title</h2>

            {{-- Regular Paragraphs with .text-content for dark mode --}}
            <p class="text-content mb-3 lead">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>

            <p class="text-content mb-4">
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum.
            </p>

            {{-- Paragraph with Link --}}
            <p class="text-content mb-4">
                This is a paragraph with a
                <a wire:navigate href="#" class="text-primary font-weight-medium">
                    link that works in both light and dark modes
                </a>
                and continues with more text after the link.
            </p>

            {{-- Divider --}}
            <hr class="my-5">

            {{-- Subsection (H3) --}}
            <h3 class="mb-3">Subsection Title</h3>

            <p class="text-content mb-4">
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                architecto beatae vitae dicta sunt explicabo.
            </p>

            {{-- ============================================================
                 CARD EXAMPLES - Bootstrap cards in light/dark mode
                 ============================================================ --}}
            <div class="row mb-5">
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">Card Title One</h5>
                            <p class="card-text">
                                This is a Bootstrap card that automatically adapts to dark mode.
                                The styling is handled by the layout CSS.
                            </p>
                            <a wire:navigate href="#" class="btn btn-primary btn-sm">Learn More</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">Card Title Two</h5>
                            <p class="card-text">
                                Cards are perfect for displaying grouped information. They look
                                great in both light and dark themes.
                            </p>
                            <a wire:navigate href="#" class="btn btn-outline-primary btn-sm">Explore</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">Card Title Three</h5>
                            <p class="card-text">
                                Use cards to organize content into digestible sections. Perfect
                                for features, services, or product listings.
                            </p>
                            <a wire:navigate href="#" class="btn btn-success btn-sm">View More</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ============================================================
                 BUTTON EXAMPLES - Different Bootstrap button styles
                 ============================================================ --}}
            <h4 class="mb-3">Button Examples</h4>

            <div class="mb-4">
                <button class="btn btn-primary mb-2 mr-2">Primary Button</button>
                <button class="btn btn-secondary mb-2 mr-2">Secondary Button</button>
                <button class="btn btn-success mb-2 mr-2">Success Button</button>
                <button class="btn btn-danger mb-2 mr-2">Danger Button</button>
                <button class="btn btn-warning mb-2 mr-2">Warning Button</button>
                <button class="btn btn-info mb-2 mr-2">Info Button</button>
                <button class="btn btn-outline-primary mb-2 mr-2">Outline Primary</button>
                <button class="btn btn-outline-secondary mb-2 mr-2">Outline Secondary</button>
            </div>

            <hr class="my-5">

            {{-- ============================================================
                 LIST EXAMPLES - Unordered and ordered lists
                 ============================================================ --}}
            <div class="row mb-5">
                <div class="col-md-6">
                    <h4 class="mb-3">Unordered List</h4>
                    <ul class="text-content">
                        <li>First bullet point item</li>
                        <li>Second bullet point item</li>
                        <li>Third bullet point item with more text to demonstrate wrapping</li>
                        <li>Fourth bullet point item</li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <h4 class="mb-3">Ordered List</h4>
                    <ol class="text-content">
                        <li>First numbered item</li>
                        <li>Second numbered item</li>
                        <li>Third numbered item with more text to show how it wraps</li>
                        <li>Fourth numbered item</li>
                    </ol>
                </div>
            </div>

            {{-- ============================================================
                 ALERT EXAMPLES - Bootstrap alerts in dark mode
                 ============================================================ --}}
            <h4 class="mb-3">Alert Examples</h4>

            <div class="alert alert-primary mb-3" role="alert">
                <strong>Info:</strong> This is a primary alert with some information.
            </div>

            <div class="alert alert-success mb-3" role="alert">
                <strong>Success!</strong> Your action was completed successfully.
            </div>

            <div class="alert alert-warning mb-3" role="alert">
                <strong>Warning:</strong> Please be aware of this important information.
            </div>

            <div class="alert alert-danger mb-3" role="alert">
                <strong>Error:</strong> Something went wrong. Please try again.
            </div>

            <div class="alert alert-info mb-3" role="alert">
                <strong>Note:</strong> Here's some additional information you should know.
            </div>

            <hr class="my-5">

            {{-- ============================================================
                 TABLE EXAMPLE - Bootstrap table with dark mode
                 ============================================================ --}}
            <h4 class="mb-3">Table Example</h4>

            <div class="table-responsive mb-5">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Item One</td>
                        <td>Description of the first item</td>
                        <td><span class="badge badge-success">Active</span></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Item Two</td>
                        <td>Description of the second item</td>
                        <td><span class="badge badge-warning">Pending</span></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Item Three</td>
                        <td>Description of the third item</td>
                        <td><span class="badge badge-danger">Inactive</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            {{-- ============================================================
                 LIST GROUP EXAMPLE - Bootstrap list group
                 ============================================================ --}}
            <h4 class="mb-3">List Group Example</h4>

            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="list-group">
                        <a wire:navigate href="#" class="list-group-item list-group-item-action active">
                            Active list item
                        </a>
                        <a wire:navigate href="#" class="list-group-item list-group-item-action">
                            Second list item
                        </a>
                        <a wire:navigate href="#" class="list-group-item list-group-item-action">
                            Third list item
                        </a>
                        <a wire:navigate href="#" class="list-group-item list-group-item-action">
                            Fourth list item
                        </a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="list-group">
                        <div class="list-group-item">
                            <h5 class="mb-1">List group item heading</h5>
                            <p class="mb-1">Some content for the list item.</p>
                            <small>Additional small text</small>
                        </div>
                        <div class="list-group-item">
                            <h5 class="mb-1">Another item heading</h5>
                            <p class="mb-1">More content goes here.</p>
                            <small>More small text</small>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ============================================================
                 FORM EXAMPLE - Bootstrap form with dark mode
                 ============================================================ --}}
            <h4 class="mb-3">Form Example</h4>

            <div class="card mb-5">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputName">Full Name</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="Enter your name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter email">
                            <small class="form-text text-muted">
                                We'll never share your email with anyone else.
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="exampleSelect">Example select</label>
                            <select class="form-control" id="exampleSelect">
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleTextarea">Example textarea</label>
                            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Enter your message"></textarea>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary ml-2">Reset</button>
                    </form>
                </div>
            </div>

            {{-- ============================================================
                 BADGE EXAMPLES
                 ============================================================ --}}
            <h4 class="mb-3">Badge Examples</h4>

            <p class="mb-4">
                <span class="badge badge-primary">Primary</span>
                <span class="badge badge-secondary">Secondary</span>
                <span class="badge badge-success">Success</span>
                <span class="badge badge-danger">Danger</span>
                <span class="badge badge-warning">Warning</span>
                <span class="badge badge-info">Info</span>
                <span class="badge badge-light">Light</span>
                <span class="badge badge-dark">Dark</span>
            </p>

            <hr class="my-5">

            {{-- ============================================================
                 BLOCKQUOTE EXAMPLE
                 ============================================================ --}}
            <h4 class="mb-3">Blockquote Example</h4>

            <blockquote class="blockquote">
                <p class="mb-0">
                    "This is a blockquote. Use it to highlight important quotes or testimonials
                    that should stand out from your regular content."
                </p>
                <footer class="blockquote-footer">
                    Someone famous in <cite title="Source Title">Source Title</cite>
                </footer>
            </blockquote>

            <hr class="my-5">

            {{-- ============================================================
                 IMAGE EXAMPLE
                 ============================================================ --}}
            <h4 class="mb-3">Image Example</h4>

            <div class="row mb-5">
                <div class="col-md-6 mb-3">
                    <img src="{{ asset('storage/images/placeholder.jpg') }}"
                         alt="Example image"
                         class="img-fluid rounded">
                    <p class="text-muted small mt-2">
                        <em>Image caption: This is an example of a responsive image with rounded corners.</em>
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <img src="{{ asset('storage/images/placeholder.jpg') }}"
                         alt="Example thumbnail"
                         class="img-thumbnail">
                    <p class="text-muted small mt-2">
                        <em>Image with thumbnail styling that adapts to dark mode.</em>
                    </p>
                </div>
            </div>

            {{-- ============================================================
                 SMALLER HEADINGS (H5, H6)
                 ============================================================ --}}
            <h5 class="mb-2">This is an H5 Heading</h5>
            <p class="text-content mb-4">
                Smaller heading for minor sections within your content.
            </p>

            <h6 class="mb-2">This is an H6 Heading</h6>
            <p class="text-content mb-4">
                The smallest heading size, useful for very minor subsections.
            </p>

        </div>
    </section>

    {{-- ============================================================
         CALL TO ACTION SECTION - Final section with CTA
         ============================================================ --}}
    <section class="bg-light py-5">
        <div class="container text-center">
            <h2 class="mb-3">Ready to Get Started?</h2>
            <p class="lead text-content mb-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Take action today
                and join thousands of satisfied users!
            </p>
            <a wire:navigate href="#" class="btn btn-primary btn-lg mr-2">Get Started</a>
            <a wire:navigate href="#" class="btn btn-outline-secondary btn-lg">Learn More</a>
        </div>
    </section>

</div>
