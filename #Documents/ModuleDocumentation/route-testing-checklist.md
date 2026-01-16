# Route Testing Checklist

**Testing Guide**: Use this to systematically test each route in your system.
- ✅ = Working
- ❌ = Error/Issue
- ⏳ = Not yet tested
- 👤 = Guest access
- 🔐 = Admin access
- 👑 = Super Admin access

---

## 1. PUBLIC ROUTES (No Authentication Required)

### Home & Landing Pages
- 👤✅ `GET /` (home) - Main home page GY
- 👤✅ `GET /home` - Alternative home route GY
- 👤✅ `GET /public-landing` - Public landing page GY Transition to legacy system.  Lists all the folders on public directory.  Note markjc Zoltar@123  NB exactly the case etc., shown here.
- 👤✅ `GET /transition` - Site transition warning page to legacy  works
- 👤✅ `GET /portfolio` - Portfolio showcase (public for marketing)  
- 👤✅ `GET /workcarousel` - Work carousel display
- 👤✅ `GET /style-guide` - Public style guide
- 👤✅ `GET /atemplate` - Template example
- 👤✅ `GET /tailwind` - Tailwind view  - not sure what this is about

---

## 2. JOKES MODULE (Public)

### Main Jokes Routes
- 🔐✅ `GET /jokes` - List all jokes
- 🔐✅`GET /jokes/create` - Create joke form
- [ ] `POST /jokes` - Store new joke
- 🔐✅ `GET /jokes/random` - Get random joke  (only sends back pretty text?  But there is a random button in /jokes)
- 🔐 `GET /jokes/category/{id}` - Jokes by category
- 🔐 `POST /jokes/delete-multiple` - Delete multiple jokes
- 🔐 `GET /jokes/export/csv` - Export jokes to CSV
- 🔐 `GET /jokes/{joke}` - Show single joke
- 🔐 `GET /jokes/{joke}/edit` - Edit joke form
- 🔐 `PUT /jokes/{joke}` - Update joke
- 🔐 `DELETE /jokes/{joke}` - Delete joke
- 🔐 `POST /jokes/{joke}/toggle-favorite` - Toggle favorite status

### Joke Categories
- 🔐✅ `GET /jokes/categories` - List all categories
- 🔐 `GET /jokes/categories/create` - Create category form
- 🔐 `POST /jokes/categories` - Store new category
- 🔐 `GET /jokes/categories/{jokecat}/edit` - Edit category form
- 🔐 `PUT /jokes/categories/{jokecat}` - Update category
- 🔐 `DELETE /jokes/categories/{jokecat}` - Delete category

### Jokes Backup (AUTH + PERMISSION: "joketable backup")
- 🔐✅ `GET /jokes/backup/create` - Create backup
- 🔐 `GET /jokes/backups` - List backups
- 🔐 `GET /jokes/backups/download/{filename}` - Download backup
- 🔐 `DELETE /jokes/backups/delete/{filename}` - Delete backup
- 🔐 `POST /jokes/backups/restore` - Restore from backup

---

## 3. CONTACT & LEGACY BLOG (Public Viewing)

### Contact
- 🔐✅  `GET /contact` - Contact form page
- 🔐✅  `POST /store-contact-message` - Submit contact message

### Legacy Blog (Public Viewing)
- [ ] `GET /blog` - Main blog listing
- [ ] `GET /most-voted-posts` - Most voted posts
- [ ] `GET /blog/post/{post}` - Single post view (Livewire)
- [ ] `GET /blog/profile/{username}` - User profile with posts
- [ ] `GET /blog/profile/{username}/followers` - User followers
- [ ] `GET /blog/profile/{username}/following` - User following
- [ ] `GET /blog/{id}` - Legacy blog details by ID
- [ ] `GET /post/details/{id}` - Legacy blog details alternative
- [ ] `POST /store-comment` - Submit comment on post

### Blog (Authenticated Routes)
- [ ] `GET /blog/feed` - Blog feed (AUTH)
- [ ] `GET /blog/create` - Create post (AUTH)
- [ ] `GET /blog/post/{post}/edit` - Edit post (AUTH)
- [ ] `GET /blog/top-voted` - Top voted posts (AUTH)

---

## 4. BOOKLETS & PDFs (Public)

### Booklets
- [ ] `GET /booklets/seagull` - Seagull booklet page
- [ ] `GET /booklets/books` - Books page
- [ ] `GET /booklets/dicts` - Tech dictionary
- [ ] `GET /booklets/lrh` - Lectures HTML
- [ ] `GET /booklets/lrhstudy` - Study lectures HTML
- [ ] `GET /booklets/book/{filename}` - Serve book files

### Technical Dictionary PDFs
- [ ] `GET /technical-dictionary/technical-dictionary.pdf` - Technical dictionary PDF
- [ ] `GET /technical-dictionary/master-glossary.pdf` - Master glossary PDF

### PDF Routes
- [ ] `GET /pdf` - PDF index
- [ ] `GET /pdf/view/{filename}` - View PDF
- [ ] `GET /pdf/download/{filename}` - Download PDF
- [ ] `GET /pdf/download-force/{filename}` - Force download PDF

---

## 5. SYSTEM & HEALTH CHECKS (Public)

- [ ] `GET /health` - Comprehensive health check (JSON)
- [ ] `GET /traffic-insights` - Traffic analytics (JSON)
- [ ] `GET /test-raw` - Raw health test
- [ ] `GET /ping` - Quick ping endpoint

---

## 6. SUPER ADMIN ONLY ROUTES

**Requires**: AUTH + ROLE: "Super Admin"

### System Optimization
- [ ] `GET /optimize` - Run system optimization commands
- [ ] `GET /routeslisting` - Display all routes in HTML table
- [ ] `GET /route-cache` - Generate route cache
- [ ] `GET /route-clear` - Clear route cache

### Debug & Diagnostic
- [ ] `GET /check-visitor-system` - Check visitor logging system
- [ ] `GET /simulate-500` - Test 500 error handling

### Protected Content
- [ ] `GET /privateone` - Private Livewire component
- [ ] `GET /stuffs/jokes/{filename}` - Super admin file access

### Scientology Protected Folder (SUPER ADMIN + BASIC AUTH)
- [ ] `GET /test-auth-simple` - Test basic auth
- [ ] `GET /scientology/{path?}` - Protected folder access (requires basicauth + auth + Super Admin role)

---

## 7. AUTHENTICATED CONTENT - Modern Livewire Pages

**Requires**: AUTH (logged in user)

### PM & Project Management
- [ ] `GET /the-pmway` - The PM Way
- [ ] `GET /gamestatsnew` - Game stats new
- [ ] `GET /about-pmway` - About PM Way

### Agile & Scrum
- [ ] `GET /agile-traditional` - Agile vs Traditional
- [ ] `GET /scrumfix` - Scrum Fix
- [ ] `GET /done-done` - Done Done
- [ ] `GET /crocodile-hunter` - Crocodile Hunter
- [ ] `GET /agile-methods` - Agile Methods Carousel
- [ ] `GET /red-bead-experiment` - Red Bead Experiment
- [ ] `GET /scrum-dashboards` - Scrum Dashboards
- [ ] `GET /seven-rules-of-scrum` - Seven Rules of Scrum
- [ ] `GET /scrum-spike` - Scrum Spike
- [ ] `GET /scrum-study-vids` - Scrum Study Videos

### CMMI
- [ ] `GET /cmmidevdashboard` - CMMI Dev Dashboard
- [ ] `GET /cmmi-landing` - CMMI Landing
- [ ] `GET /cmmi-level-one` - CMMI Level One
- [ ] `GET /capability-maturity-model` - Capability Maturity Model

### ITIL
- [ ] `GET /itilfourpracticeslive` - ITIL Four Practices Live
- [ ] `GET /itiloverview` - ITIL Overview (legacy)
- [ ] `GET /itilss` - ITIL SS
- [ ] `GET /itilsd` - ITIL SD
- [ ] `GET /itilst` - ITIL ST
- [ ] `GET /itilso` - ITIL SO
- [ ] `GET /itilcsi` - ITIL CSI

### Process & Methodology
- [ ] `GET /acid-database` - ACID Database
- [ ] `GET /personal-kanban` - Personal Kanban
- [ ] `GET /laws` - Laws (PM laws)
- [ ] `GET /pmbok-process-example` - PMBOK Process Example
- [ ] `GET /vmodel` - V Model
- [ ] `GET /burndownshort` - Burndown Short
- [ ] `GET /hamandeggs` - Ham and Eggs
- [ ] `GET /kanbancoffee` - Kanban Coffee
- [ ] `GET /accelerate` - Accelerate
- [ ] `GET /working-software` - Working Software
- [ ] `GET /release-management` - Release Management
- [ ] `GET /product-increment` - Product Increment
- [ ] `GET /safe-critique` - SAFe Critique
- [ ] `GET /snowbird` - Snowbird
- [ ] `GET /sevenfs` - Seven Fs
- [ ] `GET /sbok-four` - SBOK Four
- [ ] `GET /littles-law` - Little's Law

### Communication & Soft Skills
- [ ] `GET /ethos-logos-pathos` - Ethos Logos Pathos
- [ ] `GET /american-football` - American Football
- [ ] `GET /american-football-videos` - American Football Videos

### Productivity & Personal Development
- [ ] `GET /study-methods` - Study Methods
- [ ] `GET /freedoms-barriers-goals` - Freedoms Barriers Goals
- [ ] `GET /speedboat-tool` - Speedboat Tool

---

## 8. LIVEWIRE DEMO COMPONENTS (Authenticated)

**Requires**: AUTH

- [ ] `GET /greeter` - Greeter component
- [ ] `GET /livewireprocs` - Livewire procs
- [ ] `GET /calculator` - Calculator
- [ ] `GET /todo-list` - Todo list
- [ ] `GET /cascading-dropdown` - Cascading dropdown
- [ ] `GET /products` - Products search
- [ ] `GET /image-upload` - Image upload demo
- [ ] `GET /registertest` - Register form test
- [ ] `GET /lwsearch` - Livewire search

---

## 9. LEGACY BLADE ROUTES (With Transition Warning)

**Requires**: AUTH + TransitionInterceptor middleware

### ITIL Legacy Routes
- [ ] `GET /home/itilfourpractices`
- [ ] `GET /home/itiloverview`
- [ ] `GET /home/itilss`
- [ ] `GET /home/itilsd`
- [ ] `GET /home/itilst`
- [ ] `GET /home/itilso`
- [ ] `GET /home/itilcsi`
- [ ] `GET /home/itil`
- [ ] `GET /home/itilpm`

### Scrum Legacy Routes
- [ ] `GET /home/scrumroleclarity`
- [ ] `GET /home/userstories`
- [ ] `GET /home/mvp`
- [ ] `GET /home/burndownshort`
- [ ] `GET /home/productincrement`
- [ ] `GET /home/sprintupclose`
- [ ] `GET /home/sailboat`
- [ ] `GET /home/scrum`

### SAFe Legacy Routes
- [ ] `GET /home/spo`
- [ ] `GET /home/ssm`

### Change Management Legacy
- [ ] `GET /home/changeman`
- [ ] `GET /home/changeadkar`

### Metrics & Measurement Legacy
- [ ] `GET /home/measurement`
- [ ] `GET /home/gamestats`
- [ ] `GET /home/removetheredbeads`

### Productivity Legacy
- [ ] `GET /home/procrastination`
- [ ] `GET /home/recharge`
- [ ] `GET /home/freedoms`
- [ ] `GET /home/monkey`

### Other Legacy Routes
- [ ] `GET /home/about`
- [ ] `GET /home/baseline`
- [ ] `GET /home/dml`
- [ ] `GET /home/test`

---

## 10. LEGACY FILE SERVING (Authenticated)

**Requires**: AUTH

### General File Serving
- [ ] `GET /home/{page}` - Catch-all for legacy HTML pages

### PDF Viewing
- [ ] `GET /viewpdf/{subfolder}/{filename}`
- [ ] `GET /viewpdf/{filename}`
- [ ] `GET /legacy/pdf/{subfolder}/{filename}`
- [ ] `GET /legacy/pdf/{filename}`

### Video Viewing
- [ ] `GET /viewvideo/{subfolder}/{filename}`
- [ ] `GET /legacy/video/{subfolder}/{filename}`

### Downloads
- [ ] `GET /download/{subfolder}/{filename}`
- [ ] `GET /downloadzip/{filename}`
- [ ] `GET /legacy/download/{subfolder}/{filename}`
- [ ] `GET /legacy/download-zip/{filename}`

### CMMI Files
- [ ] `GET /cmmidev/{path}` - Serve public CMMI files
- [ ] `GET /cmmi/files/{path}` - Serve CMMI files from storage
- [ ] `GET /view-pdf/{filename}` - View ITIL 4 guide PDFs
- [ ] `GET /cmmidevdash` - CMMI Dev Dashboard legacy

### File Demo Routes
- [ ] `GET /myfile-demo` - File demo index
- [ ] `DELETE /myfile-demo/{id}` - Delete file demo
- [ ] `GET /myfile-demo/file/{filename}` - Serve file demo file
- [ ] `GET /myimage-demo` - Image demo index
- [ ] `DELETE /myimage-demo/{id}` - Delete image demo
- [ ] `GET /myimage-demo/image/{imagename}` - Serve image demo

### Authenticated File Operations
- [ ] `POST upload-file` - Upload file (AUTH + VERIFIED + PERMISSION: "file demo")
- [ ] `GET viewpdf/{subfolder}/{filename}` - View PDF
- [ ] `GET viewvideo/{subfolder}/{filename}` - View video
- [ ] `GET download/{subfolder}/{filename}` - Download file
- [ ] `GET downloadzip/{filename}` - Download ZIP
- [ ] `GET user-view/{subfolder}/{filename}` - User view file
- [ ] `GET /download-pdf/{filename}` - Download PDF
- [ ] `GET /download/assets/{filename}` - Download asset files

---

## 11. PMBOK ROUTES (Authenticated)

**Requires**: AUTH

### PMBOK SPA
- [ ] `GET /pmbok-spa` - PMBOK Dashboard
- [ ] `GET /pmbok-spa/projects` - Project list
- [ ] `GET /pmbok-spa/process/{processId}` - Process page

### PMBOK General
- [ ] `GET /pmboknutshell` - PMBOK in a nutshell

### PMBOK Six Controller Routes
- [ ] `GET /pmboksix/initiate`
- [ ] `GET /pmboksix/plan`
- [ ] `GET /pmboksix/execute`
- [ ] `GET /pmboksix/monitorandcontrol`
- [ ] `GET /pmboksix/close`
- [ ] `GET /pmboksix/pmbokprocessnutshell`
- [ ] `GET /pmboksix/pmnotes`
- [ ] `GET /pmboksix/integration`
- [ ] `GET /pmboksix/communication`
- [ ] `GET /pmboksix/procurement`
- [ ] `GET /pmboksix/quality`
- [ ] `GET /pmboksix/resource`
- [ ] `GET /pmboksix/risk`
- [ ] `GET /pmboksix/schedule`
- [ ] `GET /pmboksix/scope`
- [ ] `GET /pmboksix/cost`
- [ ] `GET /pmboksix/stakeholder`

### PMBOK Six Dynamic Routes (four-thirteen + one-seven)
- Multiple routes like `/pmboksix/fourone`, `/pmboksix/fourtwo`, etc.
- Pattern: `{four|five|six|seven|eight|nine|ten|eleven|twelve|thirteen}{one|two|three|four|five|six|seven}`

---

## 12. CHAT MODULE (Authenticated)

**Requires**: AUTH

- [ ] `GET /chat` - Chat dashboard

---

## 13. VISITOR ANALYTICS (Super Admin)

**Requires**: AUTH + ROLE: "Super Admin"

- [ ] `GET /visitor-logs` - Visitor analytics (Livewire)
- [ ] `GET /visitor-analytics` - Visitor analytics alias

---

## 14. NOTES APP (Authenticated)

**Requires**: AUTH

- [ ] `GET /notes` - Notes manager
- [ ] `GET /notes/categories` - Categories manager

---

## 15. TINYMCE & EDITOR (Authenticated)

**Requires**: AUTH

- [ ] `POST /tinymce/upload` - Upload image for TinyMCE
- [ ] `GET /editor/{filename?}` - Load editor with optional filename
- [ ] `POST /editor/save` - Save editor content
- [ ] `POST /editor/delete/{filename}` - Delete editor file

---

## 16. TAILWIND CSS TRAINING (Authenticated)

**Requires**: AUTH

- [ ] `GET /twcsstraining` - Tailwind CSS training
- [ ] `GET /twcsstraining/{file}` - Serve training files

---

## 17. PHPMAILER (Authenticated)

**Requires**: AUTH

- [ ] `GET email` - Email form
- [ ] `POST send-email` - Send email

---

## 18. USER DASHBOARD & MANAGEMENT (Authenticated + Verified)

**Requires**: AUTH + VERIFIED

### Dashboard
- [ ] `GET /dashboard` - Main dashboard
- [ ] `GET /pmwaysearch` - PM Way search
- [ ] `POST /forcelogout` - Force logout

### Avatar Management
- [ ] `GET /manage-avatar` - Manage avatar

### CV (PERMISSION: "mycv noaccess")
- [ ] `GET /mycv` - My CV page

### Document Management
- [ ] `GET /document-uploads` - Document uploads page (PERMISSION: "document uploads")
- [ ] `POST /document-upload` - Upload document (PERMISSION: "document upload")
- [ ] `GET /documents` - List documents
- [ ] `GET /downloadbyshortname/{shortname}` - Download by shortname (PERMISSION: "download byshortname")
- [ ] `DELETE /documents/{id}` - Delete document (PERMISSION: "documents destroy")
- [ ] `GET /documents/{id}/edit` - Edit document (PERMISSION: "documents edit")
- [ ] `PUT /documents/{id}` - Update document (PERMISSION: "documents update")
- [ ] `GET /docusearch/{term}` - Search documents
- [ ] `GET /documents/{shortname}/download` - Download document

### Livewire Documents
- [ ] `GET /livedocuments` - Live documents index
- [ ] `GET /livedocumentslist` - Live documents list

### Image Management
- [ ] `GET /image-uploads` - Image uploads page (PERMISSION: "document uploads")
- [ ] `POST /image-upload` - Upload image (PERMISSION: "image upload")
- [ ] `GET /images` - List images
- [ ] `DELETE /images/{id}` - Delete image (PERMISSION: "images destroy")
- [ ] `GET /images/{id}/edit` - Edit image (PERMISSION: "images edit")
- [ ] `PUT /images/{id}` - Update image (PERMISSION: "images update")
- [ ] `GET /images/{shortname}/download` - Download image

### Livewire Images
- [ ] `GET /liveimages` - Live images index
- [ ] `GET /liveimageslist` - Live images list

### Blog Post Routes (Backend/Admin)
- [ ] `POST /update-post-status` - Update post status (PERMISSION: "blog approved")
- [ ] `GET /useraddpost` - User add post
- [ ] `POST /userstorepost` - User store post
- [ ] `GET /search` - User search
- [ ] `GET /post/details` - First post
- [ ] `GET /writestuff` - Write stuff

### Blog Post Controller Routes
- [ ] `GET all-post` - All posts (PERMISSION: "all post")
- [ ] `GET /blogsbyauthor` - Blogs by author (PERMISSION: "all postsbyauthor")
- [ ] `GET add-post` - Add post (PERMISSION: "add post")
- [ ] `POST store-post` - Store post (PERMISSION: "store post")
- [ ] `GET edit-post/{id}` - Edit post (PERMISSION: "edit post")
- [ ] `POST update-post/{id}` - Update post (PERMISSION: "update post")
- [ ] `GET delete-post/{id}` - Delete post (PERMISSION: "delete post")
- [ ] `GET /post/{post}` - View single post
- [ ] `GET /admin/post/{post}` - View single post (admin)

### Portfolio Dashboard
- [ ] `GET /portfoliodash` - Portfolio dashboard (PERMISSION: "portfolio dash")

### Hero Section
- [ ] `GET here-section` - Hero section (PERMISSION: "all hero")
- [ ] `POST update-here-section` - Update hero section (PERMISSION: "update hero")

### Services
- [ ] `GET all-services` - All services (PERMISSION: "all service")
- [ ] `GET add-service` - Add service (PERMISSION: "add service")
- [ ] `POST store-service` - Store service (PERMISSION: "store service")
- [ ] `GET edit-service/{id}` - Edit service (PERMISSION: "edit service")
- [ ] `POST update-service` - Update service (PERMISSION: "update service")
- [ ] `GET delete-service/{id}` - Delete service (PERMISSION: "delete service")

### Portfolio/Recent Works
- [ ] `GET all-recent-works` - All recent works (PERMISSION: "all work")
- [ ] `GET all-work` - Add work (PERMISSION: "add work")
- [ ] `POST store-work` - Store work (PERMISSION: "store work")
- [ ] `GET edit-word/{id}` - Edit work (PERMISSION: "edit work")
- [ ] `POST update-work` - Update work (PERMISSION: "update work")
- [ ] `GET delete-word/{id}` - Delete work (PERMISSION: "delete work")

### Experience & Education
- [ ] `GET my-experience` - My experience (PERMISSION: "all experience")
- [ ] `POST store-experience` - Store experience (PERMISSION: "store experience")
- [ ] `GET edit-experience/{id}` - Edit experience (PERMISSION: "edit experience")
- [ ] `POST update-experience` - Update experience (PERMISSION: "update experience")
- [ ] `GET delete-experience/{id}` - Delete experience (PERMISSION: "delete experience")
- [ ] `GET my-education` - My education (PERMISSION: "all education")

### Skills
- [ ] `GET add-skill` - Add skill (PERMISSION: "add skill")
- [ ] `POST store-skill` - Store skill (PERMISSION: "store skill")
- [ ] `GET all-skills` - All skills (PERMISSION: "all skill")
- [ ] `GET edit-skill/{id}` - Edit skill (PERMISSION: "edit skill")
- [ ] `POST update-skill` - Update skill (PERMISSION: "update skill")
- [ ] `GET delete-skill/{id}` - Delete skill (PERMISSION: "delete skill")

### Testimonials
- [ ] `GET add-testimony` - Add testimony (PERMISSION: "add testimony")
- [ ] `POST store-testimony` - Store testimony (PERMISSION: "store testimony")
- [ ] `GET all-testimoies` - All testimonies (PERMISSION: "all testimony")
- [ ] `GET edit-testimony/{id}` - Edit testimony (PERMISSION: "edit testimony")
- [ ] `POST update-testimony` - Update testimony (PERMISSION: "update testimony")
- [ ] `GET delete-testimony/{id}` - Delete testimony (PERMISSION: "delete testimony")

### Comments & Contacts
- [ ] `GET user-comments` - User comments
- [ ] `POST comment-status-update` - Update comment status (PERMISSION: "update comment")
- [ ] `GET contact-message` - Contact messages (PERMISSION: "all contact")
- [ ] `GET delete-contact/{id}` - Delete contact (PERMISSION: "delete contact")

### Site Settings
- [ ] `GET site-settings` - Site settings (PERMISSION: "all setting")
- [ ] `POST update-site-settings` - Update site settings (PERMISSION: "update setting")

### FilePond Document Manager
- [ ] `GET /admin/upload-documents` - Upload documents (ROLE: "Super User")
- [ ] `GET /admin/document-manager` - Document manager (PERMISSION: "manage documents")
- [ ] `GET /admin/documents/download` - Download document (PERMISSION: "manage documents")
- [ ] `GET /admin/documents/view` - View document (PERMISSION: "manage documents")

### Impersonation (Super Admin Only)
- [ ] `POST /impersonate/{user}` - Start impersonation (PERMISSION: "impersonate")
- [ ] `DELETE /impersonate/stop` - Stop impersonation

### Settings
- [ ] `GET settings` - Redirect to profile
- [ ] `GET settings/profile` - Profile settings
- [ ] `GET settings/password` - Password settings
- [ ] `GET settings/appearance` - Appearance settings
- [ ] `GET settings/locale` - Locale settings

### Admin Routes
- [ ] `GET /admin` - Admin index (PERMISSION: "access dashboard")
- [ ] `GET /admin/users` - Users list (PERMISSION: "view users")
- [ ] `GET /admin/users/create` - Create user (PERMISSION: "create users")
- [ ] `GET /admin/users/{user}` - View user (PERMISSION: "view users")
- [ ] `GET /admin/users/{user}/edit` - Edit user (PERMISSION: "update users")
- [ ] `GET /admin/roles` - Roles list (PERMISSION: "view roles")
- [ ] `GET /admin/roles/create` - Create role (PERMISSION: "create roles")
- [ ] `GET /admin/roles/{role}/edit` - Edit role (PERMISSION: "update roles")
- [ ] `GET /admin/permissions` - Permissions list (PERMISSION: "view permissions")
- [ ] `GET /admin/permissions/create` - Create permission (PERMISSION: "create permissions")
- [ ] `GET admin/permissions/{permission}/edit` - Edit permission (PERMISSION: "update permissions")

### Scrum Video Lessons
- [ ] `GET /scrumvidlessons` - Scrum video lessons

---

## 19. TEST ROUTES

- [ ] `GET /admins-only` - Test admin access (AUTH + CAN: "visitAdminPages")

---

## 20. PROTECTED STORAGE ROUTES

**Requires**: AUTH + PERMISSION: "protected storage"

### Main Storage Pages
- [ ] `GET /protected-storage` - Storage home
- [ ] `GET /protected-storage/dashboard` - Storage dashboard

### Storage API
- [ ] `GET /protected-storage/api/status` - Get storage status (JSON)
- [ ] `POST /protected-storage/api/clear-cache/{resource}` - Clear cache for resource

### Storage Resource Serving (Catch-all)
- [ ] `GET /protected-storage/{resource}/{path?}` - Serve protected storage files

---

## 21. PROTECTED STORAGE FILES MANAGEMENT

**Requires**: AUTH (assumed based on pattern)

### File Operations
- [ ] `GET /protected-storage-files` - List files
- [ ] `POST /protected-storage-files/upload` - Upload file
- [ ] `GET /protected-storage-files/{id}/view` - View file
- [ ] `GET /protected-storage-files/{id}/stream` - Stream file
- [ ] `GET /protected-storage-files/{id}/download` - Download file
- [ ] `GET /protected-storage-files/{id}/edit` - Edit file metadata
- [ ] `PUT /protected-storage-files/{id}` - Update file
- [ ] `DELETE /protected-storage-files/{id}` - Delete file

### Folder Operations
- [ ] `GET /protected-storage-folders` - List folders
- [ ] `POST /protected-storage-folders` - Create folder
- [ ] `GET /protected-storage-folders/{id}` - Show folder
- [ ] `GET /protected-storage-folders/{id}/edit` - Edit folder
- [ ] `PUT /protected-storage-folders/{id}` - Update folder
- [ ] `DELETE /protected-storage-folders/{id}` - Delete folder
- [ ] `POST /protected-storage-folders/{id}/scan` - Scan folder

---

## 22. GUITAR PRACTICE MEDIA ROUTES

**Requires**: AUTH (assumed based on pattern)

### File Operations
- [ ] `GET /guitar-scores` - List guitar scores
- [ ] `POST /guitar-scores/upload` - Upload score
- [ ] `GET /guitar-scores/{id}/view` - View score
- [ ] `GET /guitar-scores/{id}/stream` - Stream score
- [ ] `GET /guitar-scores/{id}/download` - Download score
- [ ] `GET /guitar-scores/{id}/edit` - Edit score metadata
- [ ] `PUT /guitar-scores/{id}` - Update score
- [ ] `DELETE /guitar-scores/{id}` - Delete score

### Folder Operations
- [ ] `GET /guitar-folders` - List folders
- [ ] `POST /guitar-folders` - Create folder
- [ ] `GET /guitar-folders/{id}` - Show folder
- [ ] `GET /guitar-folders/{id}/edit` - Edit folder
- [ ] `PUT /guitar-folders/{id}` - Update folder
- [ ] `DELETE /guitar-folders/{id}` - Delete folder
- [ ] `POST /guitar-folders/{id}/scan` - Scan folder

---

## 23. DYNAMIC PAGE LOADER (Keep Last)

**Requires**: AUTH

- [ ] `GET home/{page}` - Dynamic page loader for any page under home

---

## SUMMARY OF AUTHENTICATION LEVELS

### 🌍 PUBLIC (No auth required)
- Home pages, portfolio, style guide
- All jokes routes (viewing, creating, editing)
- Contact form
- Blog viewing (not editing)
- Booklets and PDFs
- System health checks

### 🔐 AUTHENTICATED (Login required)
- Dashboard
- PM/Scrum/Agile/ITIL/CMMI educational content
- Notes, editor, documents, images
- Blog management (creating, editing own posts)
- Chat
- Email
- Legacy routes
- Protected storage files
- Guitar scores

### 👑 SUPER ADMIN (Super Admin role)
- System optimization
- Route management
- Debug tools
- Visitor analytics
- Protected scientology folder (also requires basicauth)
- Backup management for jokes

### 🎫 PERMISSION-BASED (Specific Spatie permissions)
- Jokes backup: "joketable backup"
- Document uploads: "document uploads"
- Document operations: "documents destroy", "documents edit", etc.
- Blog approval: "blog approved"
- Portfolio management: "portfolio dash", "all work", etc.
- User/Role/Permission management: "view users", "create users", etc.
- Protected storage: "protected storage"
- Impersonation: "impersonate"

---

## TESTING NOTES

1. **Guest Testing**: Test all PUBLIC routes while logged out
2. **Basic User Testing**: Login with regular user, test all AUTHENTICATED routes
3. **Admin Testing**: Use Super Admin account for SUPER ADMIN routes
4. **Permission Testing**: Create test users with specific permissions for PERMISSION-BASED routes
5. **Edge Cases**: Test invalid IDs, missing parameters, unauthorized access attempts

---

## PROTECTED RESOURCES AVAILABLE IN STORAGE

The following resources are available in protected storage (requires "protected storage" permission):

- agile, azure, bigdata, booklets, books, cobit, computing
- devops, devopsmedia, documents, freezonecourses, headfirst
- helpme, home, itil, java, kanban, laravel, lean, lrh
- microsoft, mor, msp, notil, oop, p3o, php, Pmi
- prince2, programming, python, safe, scientology
- scientologydict, scrum, Scrumban, Scrummanual, Scrummedia
- Search, servicenow, spc, strategy, studentmotivationpdf
- studymanual, studynotes, techdic, technicaldictionary
