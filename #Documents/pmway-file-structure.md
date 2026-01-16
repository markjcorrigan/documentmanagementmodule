# PMWay Site File Structure - Complete Architecture Map

**Date:** December 11, 2024  
**Purpose:** High-level overview of the PMWay Laravel/Livewire application structure

---

## 📋 Table of Contents

1. [Layout Architecture](#layout-architecture)
2. [Route → Component → View Mapping](#route--component--view-mapping)
3. [Blog System (Dual Architecture)](#blog-system-dual-architecture)
4. [Legacy Twig Files](#legacy-twig-files)
5. [Key Dependencies](#key-dependencies)

---

## 🏗️ Layout Architecture

### Primary Layouts

#### 1. Frontend Layout (Main Site)
**File:** `resources/views/components/layouts/app/frontend.blade.php`  
**Supporting Files:**
- `resources/views/partials/head.blade.php` - Meta, styles, scripts
- `resources/views/components/layouts/app/header.blade.php` - Navigation bar
- `resources/views/components/layouts/app/sidebar.blade.php` - Sidebar navigation
- `resources/views/components/footer.blade.php` - Footer component

**Used By:** All frontend Livewire components that extend `FrontendComponent`

#### 2. Admin Layout
**File:** `resources/views/components/layouts/admin.blade.php`  
**Used By:** All admin components (Users, Roles, Permissions management)

#### 3. Auth Layout
**File:** `resources/views/components/layouts/auth.blade.php`  
**Variants:**
- `resources/views/components/layouts/auth/card.blade.php`
- `resources/views/components/layouts/auth/simple.blade.php`
- `resources/views/components/layouts/auth/split.blade.php`

**Used By:** Login, Register, Password Reset, Email Verification

#### 4. Legacy Layout (Bootstrap)
**File:** `resources/views/frontend/legacy_master.blade.php`  
**Supporting Files:**
- `resources/views/frontend/legacy_header.blade.php`
- `resources/views/frontend/legacy_nav.blade.php`
- `resources/views/frontend/legacy_footer.blade.php`

**Used By:** Old Twig-based pages, legacy blog views

---

## 🗺️ Route → Component → View Mapping

### Core Routing Pattern

```
URL Pattern                 → Livewire Component                  → Layout
════════════════════════════════════════════════════════════════════════════
```

### Frontend Routes (Modern Livewire)

#### Home & Landing
```
/                          → Home                                → frontend
/home                      → Home                                → frontend
```

#### About & Company Info
```
/about-pmway               → AboutPmway                          → frontend
/the-pmway                 → ThePMWay                            → frontend
```

#### Agile & Scrum
```
/agile-traditional         → AgilevsTraditional                  → frontend
/agile-methods             → AgileMethodsCarousel                → frontend
/scrumfix                  → Scrumfix                            → frontend
/scrum-dashboards          → ScrumDashboards                     → frontend
/scrum-spike               → ScrumSpike                          → frontend
/seven-rules-of-scrum      → SevenRulesOfScrum                   → frontend
/ham-and-eggs              → HamAndEggs (Pigs & Chickens)        → frontend
/done-done                 → DoneDone                            → frontend
/product-increment         → ProductIncrement                    → frontend
/red-bead-experiment       → RedBeadExperiment                   → frontend
/working-software          → WorkingSoftware                     → frontend
/burndownshort             → BurndownShort                       → frontend
```

#### CMMi & Maturity Models
```
/cmmi-landing              → CMMiLanding                         → frontend
/cmmidevdashboard          → CmmiDevDashboard                    → frontend
/cmmi-level-one            → CmmiLevelOne                        → frontend
/cmmi-dev-resources        → CmmiDevResources                    → frontend
/capability-maturity       → CapabilityMaturityModel             → frontend
```

#### PMBOK & Project Management
```
/pmbok-process-example     → PmbokProcessExample                 → frontend
/pmbok-process-nutshell    → PmbokProcessNutshell                → frontend
/pmbok-spa                 → PmbokSpa\Dashboard                  → frontend
/pmbok-spa/process/{id}    → PmbokSpa\ProcessPage                → frontend
```

#### ITIL
```
/itil-four-practices       → ItilFourPracticesLive               → frontend
```

#### Kanban & Lean
```
/personal-kanban           → PersonalKanban                      → frontend
/kanban-coffee             → KanbanCoffee                        → frontend
/littles-law               → LittlesLaw                          → frontend
```

#### Study & Training
```
/american-football         → AmericanFootball                    → frontend
/american-football-videos  → AmericanFootballVideos              → frontend
/study-methods             → StudyMethods                        → frontend
/snowbird                  → Snowbird (Agile Manifesto)          → frontend
/ethos-logos-pathos        → EthosLogosPathos                    → frontend
/accelerate                → Accelerate                          → frontend
/seven-fs                  → SevenFs                             → frontend
```

#### Database & Technical
```
/acid-database             → AcidDatabase                        → frontend
```

#### Games & Interactive
```
/crocodile-hunter          → CrocodileHunter                     → frontend
/speedboat-tool            → SpeedboatTool                       → frontend
/gamestatsnew              → GameStatsNew                        → frontend
```

#### Tools & Utilities
```
/twcsstraining             → TWCSSTraining                       → frontend
/style-guide               → StyleGuide                          → frontend
/atemplate                 → ATemplate                           → frontend
/transition                → SiteTransition                      → frontend
```

#### Portfolio & CV
```
/mycv                      → CvIndex                             → frontend
/workcarousel              → WorkCarousel                        → frontend
/portfolio                 → FrontendController@portfolio        → legacy
```

---

### Blog Routes (Modern Livewire - /blog/* prefix)

```
Route Pattern                           → Component              → Layout
═══════════════════════════════════════════════════════════════════════════

Public Blog Routes:
/blog/post/{post}                       → Blog\SinglePost        → frontend
/blog/profile/{username}                → Blog\ProfilePosts      → frontend
/blog/profile/{username}/followers      → Blog\ProfileFollowers  → frontend
/blog/profile/{username}/following      → Blog\ProfileFollowing  → frontend

Authenticated Blog Routes:
/blog/feed                              → Blog\Writefull         → frontend
/blog/create                            → Blog\CreatePost        → frontend
/blog/post/{post}/edit                  → Blog\EditPost          → frontend
/blog/most-voted                        → FrontendController     → legacy
```

---

### Legacy Blog Routes (Bootstrap-based)

```
Route Pattern                    → Controller/View
═══════════════════════════════════════════════════════════════════
/blog                            → FrontendController@blog
/post/details/{slug}             → FrontendController@BlogDetails
/writestuff                      → Redirects to /blog/feed
```

**Legacy Blog Views:**
- `resources/views/frontend/blogpage.blade.php`
- `resources/views/frontend/blog/add_post.blade.php`
- `resources/views/frontend/blog/most_voted.blade.php`
- `resources/views/frontend/blog/post_details.blade.php`
- `resources/views/frontend/blog/searchresults.blade.php`

---

### Admin Routes (Auth Required)

```
Route Pattern                    → Component                      → Layout
═══════════════════════════════════════════════════════════════════════════

Admin Dashboard:
/admin                          → Admin\Index                    → admin

User Management:
/admin/users                    → Admin\Users                    → admin
/admin/users/create             → Admin\Users\CreateUser         → admin
/admin/users/{user}/edit        → Admin\Users\EditUser           → admin
/admin/users/{user}             → Admin\Users\ViewUser           → admin

Role Management:
/admin/roles                    → Admin\Roles                    → admin
/admin/roles/create             → Admin\Roles\CreateRole         → admin
/admin/roles/{role}/edit        → Admin\Roles\EditRole           → admin

Permission Management:
/admin/permissions              → Admin\Permissions              → admin
/admin/permissions/create       → Admin\Permissions\CreatePerm   → admin
/admin/permissions/{id}/edit    → Admin\Permissions\EditPerm     → admin
```

---

### Auth Routes

```
Route Pattern                    → Component                      → Layout
═══════════════════════════════════════════════════════════════════════════
/login                          → Auth\Login                     → auth
/register                       → Auth\Register                  → auth
/forgot-password                → Auth\ForgotPassword            → auth
/reset-password/{token}         → Auth\ResetPassword             → auth
/verify-email                   → Auth\VerifyEmail               → auth
/confirm-password               → Auth\ConfirmPassword           → auth
```

---

### Analytics & Logs (Auth Required)

```
Route Pattern                    → Component                      → Layout
═══════════════════════════════════════════════════════════════════════════
/visitor-analytics              → VisitorAnalytics               → frontend
/logs                           → LogsManager                    → frontend
/logs/categories                → LogCategoriesManager           → frontend
```

---

### Settings (Auth Required)

```
Route Pattern                    → Component                      → Layout
═══════════════════════════════════════════════════════════════════════════
/settings/profile               → Settings\Profile               → settings
/settings/password              → Settings\Password              → settings
/settings/appearance            → Settings\Appearance            → settings
/settings/locale                → Settings\Locale                → settings
/settings/delete-account        → Settings\DeleteUserForm        → settings
```

---

### Notes & Chat (Auth Required)

```
Route Pattern                    → Component                      → Layout
═══════════════════════════════════════════════════════════════════════════
/notes                          → NotesManager                   → app
/notes/categories               → CategoriesManager              → app
/chat                           → ChatDashboard                  → app
```

---

### Jokes Module

```
Route Pattern                    → Controller
═══════════════════════════════════════════════════════════════════
/jokes                          → JokeController@index
/jokes/create                   → JokeController@create
/jokes/{joke}                   → JokeController@show
/jokes/{joke}/edit              → JokeController@edit
/jokes/random                   → JokeController@random
/jokes/category/{id}            → JokeController@byCategory
/categories                     → JokecatController@index
```

---

### Legacy Routes (With /home/ prefix - Twig/Blade)

These routes use the `TransitionInterceptor` middleware to warn users about style changes:

```
Route Pattern                    → Controller Method             → View Type
═══════════════════════════════════════════════════════════════════════════
/home/procrastination           → IndexController@procrastination → Twig
/home/itilsd                    → IndexController@itilsd          → Twig
/home/itilss                    → IndexController@itilss          → Twig
/home/itilst                    → IndexController@itilst          → Twig
/home/itilso                    → IndexController@itilst          → Twig
/home/itilcsi                   → IndexController@itilcsi         → Twig
```

**Important:** Any URL with `/home/` prefix is a legacy page with old styling.

---

### File Serving Routes

```
Route Pattern                              → Controller/Action
═══════════════════════════════════════════════════════════════════
/viewpdf/{subfolder}/{filename}            → IndexController@viewpdf
/viewvideo/{subfolder}/{filename}          → IndexController@viewvideo
/download/{subfolder}/{filename}           → IndexController@saveAction
/downloadzip/{filename}                    → IndexController@downloadZip
/user-view/{subfolder}/{filename}          → IndexController@userViewFile
```

---

## 🏢 Blog System (Dual Architecture)

### Modern Blog (Livewire + Tailwind)

**Base Component:** `App\Livewire\NewBlogComponent`  
**Layout:** `components.layouts.app.frontend`

#### Components:
```
app/Livewire/Blog/
├── CreatePost.php         → /blog/create
├── EditPost.php           → /blog/post/{post}/edit
├── SinglePost.php         → /blog/post/{post}
├── ProfilePosts.php       → /blog/profile/{username}
├── ProfileFollowers.php   → /blog/profile/{username}/followers
├── ProfileFollowing.php   → /blog/profile/{username}/following
├── Writefull.php          → /blog/feed
├── Addfollow.php          → Follow management
└── Removefollow.php       → Unfollow management
```

#### Views:
```
resources/views/livewire/blog/
├── create-post.blade.php
├── edit-post.blade.php
├── single-post.blade.php
├── profile-posts.blade.php
├── profile-followers.blade.php
├── profile-following.blade.php
├── writefull.blade.php
├── addfollow.blade.php
└── removefollow.blade.php
```

#### Components Used:
```
resources/views/livewire/
├── blog-post-list.blade.php       → List of posts
├── blog-post-votes.blade.php      → Voting component
└── tailwind/blog-post-votes.blade.php
```

---

### Legacy Blog (Bootstrap)

**Controller:** `App\Http\Controllers\FrontendController`  
**Layout:** `resources/views/frontend/legacy_master.blade.php`

#### Routes:
```
/blog                      → Main blog listing (Bootstrap)
/post/details/{slug}       → Single post view (Bootstrap)
/writestuff                → Old feed (redirects to /blog/feed)
/most-voted-posts          → Legacy most voted
```

#### Views:
```
resources/views/frontend/
├── blogpage.blade.php                → Main blog page
└── blog/
    ├── add_post.blade.php           → Create post form
    ├── most_voted.blade.php         → Top posts
    ├── post_details.blade.php       → Single post
    └── searchresults.blade.php      → Search results

resources/views/backend/blog/        → Backend blog views
├── add_post.blade.php
├── all_posts.blade.php
├── blogsbyauthor.blade.php
├── edit_post.blade.php
└── single_post.blade.php
```

---

## 📁 Legacy Twig Files

**Location:** `resources/views/Home/`

All Twig files are legacy content using the old Bootstrap styling and accessed via `/home/*` routes.

### ITIL Twig Files (100+ files)
```
resources/views/Home/
├── itilsd.twig            → Service Design overview
├── itilsdone.twig         → Service Design Process 1
├── itilsdtwo.twig         → Service Design Process 2
├── itilsdthree.twig       → Service Design Process 3
│   ... (continues through itilsdten.twig)
│
├── itilss.twig            → Service Strategy overview
├── itilssone.twig         → Service Strategy Process 1
│   ... (continues through itilssfive.twig)
│
├── itilst.twig            → Service Transition overview
├── itilstone.twig         → Service Transition Process 1
│   ... (continues through itilsteight.twig)
│
├── itilso.twig            → Service Operation overview
├── itilsoone.twig         → Service Operation Process 1
│   ... (continues through itilsonine.twig)
│
└── itilcsi.twig           → Continual Service Improvement
```

### Other Legacy Twig Content
```
resources/views/Home/
├── procrastination.twig
├── measurement.twig
├── kanban.twig
├── kanbancoffee.twig
├── laws.twig
├── littleslaw.twig
├── landscape.twig
├── linuxcommands.twig
├── justdoitbadly.twig
├── leanagilemindset.twig
├── levelonewheel.twig
├── leveltwowheel.twig
└── mars.twig
```

**Total Twig Files:** ~100+ legacy content pages

**Access Pattern:** All accessed via `/home/{page-name}` routes  
**Controller:** `App\Http\Controllers\IndexController`

---

## 🎯 Component Base Classes

### Frontend Component Hierarchy

```
Component (Livewire\Component)
    ↓
FrontendComponent
    #[Layout('components.layouts.app.frontend')]
    ↓
├── AboutPmway
├── AgilevsTraditional
├── CmmiDevDashboard
├── Home
├── ThePMWay
└── ... (all frontend pages)
```

### Blog Component Hierarchy

```
Component (Livewire\Component)
    ↓
NewBlogComponent
    #[Layout('components.layouts.app.frontend')]
    ↓
├── Blog\CreatePost
├── Blog\EditPost
├── Blog\SinglePost
├── Blog\Writefull
└── ... (all blog components)
```

---

## 🔧 Key File Dependencies

### Frontend Layout Stack
```
components/layouts/app/frontend.blade.php
    ↓ includes
partials/head.blade.php              → Meta, styles, scripts
    ↓ uses
components/layouts/app/header.blade.php    → Navigation
components/layouts/app/sidebar.blade.php   → Sidebar
components/footer.blade.php               → Footer
```

### Head Partial Contents
```
resources/views/partials/head.blade.php
├── Meta tags (title, description, charset)
├── CSS imports (Tailwind, custom styles)
├── Font imports (Google Fonts, Font Awesome)
├── JavaScript (Alpine.js, Livewire)
└── Analytics scripts
```

### Component Library
```
resources/views/components/
├── Buttons:
│   ├── button.blade.php
│   ├── danger-button.blade.php
│   └── secondary-button.blade.php
│
├── Forms:
│   ├── input.blade.php
│   ├── label.blade.php
│   ├── checkbox.blade.php
│   ├── input-error.blade.php
│   └── validation-errors.blade.php
│
├── Modals:
│   ├── modal.blade.php
│   ├── dialog-modal.blade.php
│   └── confirmation-modal.blade.php
│
├── Navigation:
│   ├── nav-link.blade.php
│   ├── responsive-nav-link.blade.php
│   ├── dropdown.blade.php
│   └── dropdown-link.blade.php
│
├── Tables:
│   ├── table.blade.php
│   └── table/
│       ├── cell.blade.php
│       ├── heading.blade.php
│       └── row.blade.php
│
└── Utility:
    ├── alert.blade.php
    ├── toast-notification.blade.php
    ├── action-message.blade.php
    └── page-heading.blade.php
```

---

## 📊 Statistics Summary

### Total Livewire Components: **~150+**
```
- Frontend Components: ~100+
- Blog Components: ~10
- Admin Components: ~13
- Auth Components: 6
- Settings Components: 5
- Other: ~20
```

### Total Views: **~500+**
```
- Livewire Views: ~150+
- Component Views: ~70
- Legacy Views: ~100+ (Twig)
- Blade Views: ~100+
- PMBOK Views: ~50
```

### Layout Types: **4 Main Layouts**
```
1. Frontend Layout (Tailwind) - Most used
2. Admin Layout - Admin panel
3. Auth Layout - Authentication pages
4. Legacy Layout (Bootstrap) - Old pages
```

---

## 🚀 Migration Strategy

### Current State:
- **Modern Pages:** Use Livewire + Tailwind CSS (no `/home/` prefix)
- **Legacy Pages:** Use Twig/Blade + Bootstrap (`/home/` prefix)
- **Blog:** Dual system (new Livewire + old Bootstrap)

### URL Pattern Rules:

#### Rule 1: Legacy Pages (with `/home/` prefix)
```
✅ /home/procrastination  → Legacy Twig page
✅ /home/itilsd           → Legacy Twig page
❌ /procrastination       → Would be 404 (no route)
```

#### Rule 2: Modern Pages (no prefix)
```
✅ /agile-traditional     → Modern Livewire page
✅ /burndownshort         → Modern Livewire page
❌ /home/agile-traditional → Would show transition warning
```

#### Rule 3: Blog URLs
```
✅ /blog/post/{id}        → New Livewire blog
✅ /blog                  → Legacy Bootstrap blog
✅ /blog/feed             → New Livewire feed
```

---

## 🔍 Quick Reference Lookup

### Need to find a page? Use this lookup table:

| Feature/Page           | Modern Route              | Legacy Route           |
|------------------------|---------------------------|------------------------|
| Home                   | `/`                       | N/A                    |
| Blog Feed              | `/blog/feed`              | `/writestuff`          |
| Blog Listing           | `/blog/post/{id}`         | `/post/details/{id}`   |
| Agile vs Traditional   | `/agile-traditional`      | N/A                    |
| ITIL Service Design    | `/itil-four-practices`    | `/home/itilsd`         |
| Kanban                 | `/personal-kanban`        | `/home/kanban`         |
| CMM                    | `/capability-maturity`    | N/A                    |
| CMMi                   | `/cmmidevdashboard`       | N/A                    |
| Admin Panel            | `/admin`                  | N/A                    |
| User Settings          | `/settings/profile`       | N/A                    |

---

## 📝 Notes for Developers

1. **Layout Declaration:** All Livewire components use the `#[Layout()]` attribute
2. **Frontend Component:** Most pages extend `FrontendComponent` base class
3. **Blog Component:** Blog pages extend `NewBlogComponent` base class
4. **Transition Middleware:** Legacy pages use `TransitionInterceptor` middleware
5. **File Structure:** Livewire components follow `app/Livewire/{ComponentName}.php` pattern
6. **View Structure:** Livewire views follow `resources/views/livewire/{component-name}.blade.php` pattern

---

## 🎨 Styling

- **Modern Pages:** Tailwind CSS 3.x
- **Legacy Pages:** Bootstrap 4.x
- **Icons:** Font Awesome, Lucide Icons
- **Fonts:** Google Fonts (various)

---

## 📦 Key Technologies

- **Framework:** Laravel 11.x
- **Frontend:** Livewire 3.x
- **Templating:** Blade, Twig (legacy)
- **CSS:** Tailwind CSS, Bootstrap (legacy)
- **JavaScript:** Alpine.js, Livewire's JavaScript
- **Database:** MySQL
- **Real-time:** Websockets (Laravel Echo, Pusher)

---

**Document Version:** 1.0  
**Last Updated:** December 11, 2024  
**Maintained By:** PMWay Development Team

---

*This document provides a complete map of the PMWay application structure. Use it as a reference for understanding the routing, component relationships, and file organization.*
