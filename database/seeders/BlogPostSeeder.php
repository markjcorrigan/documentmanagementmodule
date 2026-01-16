<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'user_id' => 1,
                'post_title' => '10 and 2: Keeping Your Project on the Road',
                'post_description' => '<style>
    /* Light mode (default) */
    .blog-content {
        --text-primary: #333333;
        --text-secondary: #555555;
        --heading-color: #2c3e50;
        --accent-color: #3498db;
        --accent-hover: #2980b9;
        --quote-bg: #ecf0f1;
        --quote-text: #2c3e50;
        --resources-bg: #e8f4f8;
    }

    /* Dark mode */
    [data-bs-theme="dark"] .blog-content {
        --text-primary: #f5f5f5;
        --text-secondary: #e8e8e8;
        --heading-color: #bbdefb;
        --accent-color: #90caf9;
        --accent-hover: #bbdefb;
        --quote-bg: #1a1a1a;
        --quote-text: #f5f5f5;
        --resources-bg: #1a2a3a;
    }

    .blog-content {
        line-height: 1.7;
        color: var(--text-primary);
    }

    .blog-content h3 {
        color: var(--heading-color);
        font-size: 1.8em;
        margin-top: 40px;
        margin-bottom: 20px;
        border-left: 5px solid var(--accent-color);
        padding-left: 15px;
    }

    .blog-content p {
        margin-bottom: 20px;
        font-size: 1.1em;
        color: var(--text-primary);
    }

    .blog-content p:first-of-type {
        font-size: 1.3em;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .blog-content strong {
        color: var(--heading-color);
        font-weight: 600;
    }

    .blog-content em {
        color: var(--text-secondary);
        font-style: italic;
    }

    .blog-content .quote-block {
        background-color: var(--quote-bg);
        border-left: 5px solid var(--accent-color);
        padding: 25px 30px;
        margin: 30px 0;
        font-size: 1.15em;
        font-style: italic;
        color: var(--quote-text);
    }

    .blog-content .quote-block strong {
        display: block;
        margin-bottom: 15px;
        font-size: 1.1em;
        color: var(--heading-color);
    }

    .blog-content .divider {
        border: 0;
        height: 2px;
        background: linear-gradient(to right, transparent, var(--accent-color), transparent);
        margin: 40px 0;
    }

    .blog-content .resources {
        background-color: var(--resources-bg);
        padding: 25px;
        border-radius: 5px;
        margin-top: 40px;
    }

    .blog-content .resources h3 {
        margin-top: 0;
        border-left: none;
        padding-left: 0;
    }

    .blog-content .resources ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .blog-content .resources li {
        margin-bottom: 10px;
    }

    .blog-content .resources a {
        color: var(--accent-color);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .blog-content .resources a:hover {
        color: var(--accent-hover);
        text-decoration: underline;
    }

    .blog-content .blog-image {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 30px auto;
        border-radius: 8px;
    }

    .blog-content .image-container {
        text-align: center;
        margin: 30px 0;
    }

    @media (max-width: 768px) {
        .blog-content h3 {
            font-size: 1.5em;
        }

        .blog-content .blog-image {
            margin: 20px auto;
        }
    }
</style>

<div class="blog-content">
<h3>10 and 2: Keeping Your Project on the Road</h3>

<h3>Projects vs. Business as Usual</h3>
<p>Before we dive into the driving analogy, it\'s essential to understand what distinguishes a project from everyday operations. According to the PMBOK Guide, a project is "a temporary endeavor undertaken to create a unique product, service, or result." This stands in stark contrast to what PRINCE2 defines as Business as Usual (BAU)—the routine, repetitive operations that keep an organization running day-to-day. Projects are about building something new, solving a unique problem, or creating a deliverable that has never existed before in quite that way. Understanding this distinction is fundamental because projects require a different management approach than ongoing operations.</p>

<h3>The License to Drive: Project Initiation</h3>
<p>Every driver needs a license before getting behind the wheel, and every project needs proper authorization before it can begin. This is where the Initiation phase becomes crucial. The <strong>Develop Project Charter</strong> process (PMBOK 6 process 4.1) and the <strong>Identify Stakeholders</strong> process (PMBOK 6 process 13.1) serve as your project\'s license to operate. Without sign-off of the Charter by key and empowered stakeholders, moving into Project Planning, Execution, or Project Monitoring and Control is essentially illegal. The Charter is your green light—it authorizes the project, assigns the project manager, and provides the authority needed to apply organizational resources to project activities.</p>

<h3>Planning Your Route: The 10 O\'Clock Position</h3>
<p>Once you have your license (approved Charter), it\'s time to plan your route. In our driving analogy, <strong>Project Planning (PP)</strong> represents the 10 o\'clock position on the steering wheel. This is where you determine exactly how you\'ll reach your destination. Planning in project management is comprehensive and touches every aspect of the project through the knowledge areas:</p>

<ul>
<li><strong>Project Integration Management</strong> - The master plan that summarizes all other knowledge areas</li>
<li><strong>Project Scope Management</strong> - Defining what\'s in and out of the project</li>
<li><strong>Project Schedule Management</strong> - Determining when things will happen</li>
<li><strong>Project Cost Management</strong> - Budgeting and financial planning</li>
<li><strong>Project Quality Management</strong> - Establishing quality standards and metrics</li>
<li><strong>Project Resource Management</strong> - Planning for people, equipment, and materials</li>
<li><strong>Project Communications Management</strong> - Determining who needs what information and when</li>
<li><strong>Project Risk Management</strong> - Identifying and planning responses to uncertainties</li>
<li><strong>Project Procurement Management</strong> - Planning for external acquisitions</li>
<li><strong>Project Stakeholder Management</strong> - Managing expectations and engagement</li>
</ul>

<h3>Monitoring the Journey: The 2 O\'Clock Position</h3>
<p>While planning tells you where you want to go, <strong>Project Monitoring and Control (PMC)</strong>—our 2 o\'clock position—tells you where you actually are. For every planning process, there\'s a corresponding control process that ensures you\'re staying on track. These control processes are your dashboard indicators, telling you when you\'re drifting off course and need to make adjustments.</p>

<h3>The Driver\'s Head: Project Execution</h3>
<p>If Planning is your left hand at 10 and Monitoring and Control is your right hand at 2, then your head—looking forward and steering the actual direction—is <strong>Execution</strong>. This is where the work actually gets done through <strong>Direct and Manage Project Work</strong> (4.3) and <strong>Manage Project Knowledge</strong> (4.4). Your execution must be guided by the constant interplay between your plan (10 o\'clock) and your monitoring (2 o\'clock).</p>

<h3>Making Safe Lane Changes: Integrated Change Control</h3>
<p>Sometimes you need to change your route—perhaps there\'s unexpected traffic or a road closure. In project management, changes can and do occur, but they must go through proper processes. <strong>Monitor and Control Project Work</strong> (4.5) identifies the need for changes, while <strong>Perform Integrated Change Control</strong> (4.6) evaluates, approves, and implements them. Just as you check your mirrors and signal before changing lanes, you must follow proper change control to keep your project safe.</p>

<h3>Agile Scrum: The Same Principles in a Different Vehicle</h3>
<p>While traditional project management might be like driving a sedan on a highway, Agile Scrum is like navigating a rally car through varied terrain—but the 10 and 2 principle still applies. Scrum projects are <strong>Initiated</strong> by empowered stakeholders who define scope through Epics and User Stories—essentially plotting the course. The <strong>Plan and Estimate</strong> phase in Scrum is exactly like Project Planning—it\'s the 10 o\'clock position. Teams estimate effort, plan sprints, and determine how they\'ll deliver value. The <strong>Review and Retrospect</strong> processes represent the 2 o\'clock position, functioning like PMC in traditional project management. Teams constantly monitor progress, inspect deliverables, and adapt their approach.</p>

<h3>The Capability Maturity Ladder: From Jail to Excellence</h3>

<h3>Capability Maturity Level Zero: The Road to Jail</h3>
<p>Before we discuss proper project management maturity, we must acknowledge the darkest scenario—<strong>Capability Maturity Level Zero</strong>. This is where project budgets are mismanaged and money is being lost through corruption, such as over-inflating the price of procurements to steal money off the top. This is surely a sign that the project is operating at Capability Maturity Level Zero, and the project, its team, and its stakeholders are nowhere. As the Cheshire Cat wisely told Alice in Wonderland: "If you don\'t know where you are going, then any road will take you there." At CMM Level Zero, the road should be direct to jail.</p>

<h3>Capability Maturity Level 1: Driving Without Hands on the Wheel</h3>
<p>At <strong>Capability Maturity Level 1</strong>, organizations run projects without the 10 and 2 approach in operation. There is no systematic Project Planning and no Project Monitoring and Control. Projects are characterized by ad-hoc, chaotic processes where success depends entirely on individual heroics rather than proven processes. It\'s like driving with your hands off the wheel—you might stay on the road through luck or exceptional reflexes, but you\'re far more likely to crash.</p>

<h3>Capability Maturity Level 2: Hands at 10 and 2</h3>
<p>When you properly demonstrate the use of Project Planning and Project Monitoring and Control, and when you follow the correct stage gates between Initiation and Planning, and Planning and Execution, you\'re operating at <strong>Capability Maturity Model (CMM) Level 2</strong>. This means your organization has moved beyond ad-hoc, chaotic project execution and has achieved repeatable project management processes. You have established the discipline to repeat earlier successes and built the foundation upon which higher levels of maturity rest.</p>

<h3>Conclusion: Stay Between the Lines</h3>
<p>Whether you\'re managing a traditional waterfall project or running Agile sprints, the principle remains the same: keep your hands at 10 and 2. Balance your planning with your monitoring and control. Respect the quality gates between phases. And always remember that without proper initiation and stakeholder authorization, you don\'t have a license to drive. By maintaining this discipline, you\'ll keep your project on the road, reach your destination successfully, and demonstrate organizational maturity in project delivery.</p>

<hr class="divider">

<h3>PMBOK Dashboard: The Project Management Roadmap</h3>
<div class="image-container">
    <img src="/storage/images/blogpostimage_pmbokdashboard.jpg" alt="PMBOK Dashboard showing project phases and processes" class="blog-image">
</div>

<h3>Scrum Processes: PP and PMC in Agile</h3>
<div class="image-container">
    <img src="/storage/images/blogpostimage_scrumprocessespppmc.jpg" alt="Scrum processes showing Plan-Estimate and Review-Retrospect alignment with PP and PMC" class="blog-image">
</div>
</div>

<script>
    const theme = localStorage.getItem(\'theme\');
    const htmlElement = document.documentElement;

    if(theme === \'dark\') {
        htmlElement.setAttribute(\'data-bs-theme\', \'dark\');
    } else {
        htmlElement.setAttribute(\'data-bs-theme\', \'light\');
    }
</script>',
                'post_slug' => '10-and-2-keeping-your-project-on-the-road',
                'photo' => 'blogpostimage_alice.png',
                'post_tags' => 'project-management, pmbok, agile, scrum, capability-maturity, leadership',
                'approved' => 1,
                'created_at' => '2025-08-05 10:14:00',
                'updated_at' => '2025-08-05 10:14:00',
            ],

            [
                'user_id' => 1,
                'post_title' => 'Who\'s Got the Monkey? Reclaiming Your Time with Smarter TAsking and Resource Management',
                'post_description' => '<style>
    /* Light mode (default) */
    .blog-content {
        --text-primary: #333333;
        --text-secondary: #555555;
        --heading-color: #2c3e50;
        --accent-color: #3498db;
        --accent-hover: #2980b9;
        --quote-bg: #ecf0f1;
        --quote-text: #2c3e50;
        --resources-bg: #e8f4f8;
    }

    /* Dark mode */
    [data-bs-theme="dark"] .blog-content {
        --text-primary: #f5f5f5;
        --text-secondary: #e8e8e8;
        --heading-color: #bbdefb;
        --accent-color: #90caf9;
        --accent-hover: #bbdefb;
        --quote-bg: #1a1a1a;
        --quote-text: #f5f5f5;
        --resources-bg: #1a2a3a;
    }

    .blog-content {
        line-height: 1.7;
        color: var(--text-primary);
    }

    .blog-content h3 {
        color: var(--heading-color);
        font-size: 1.8em;
        margin-top: 40px;
        margin-bottom: 20px;
        border-left: 5px solid var(--accent-color);
        padding-left: 15px;
    }

    .blog-content p {
        margin-bottom: 20px;
        font-size: 1.1em;
        color: var(--text-primary);
    }

    .blog-content p:first-of-type {
        font-size: 1.3em;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .blog-content strong {
        color: var(--heading-color);
        font-weight: 600;
    }

    .blog-content em {
        color: var(--text-secondary);
        font-style: italic;
    }

    .blog-content .quote-block {
        background-color: var(--quote-bg);
        border-left: 5px solid var(--accent-color);
        padding: 25px 30px;
        margin: 30px 0;
        font-size: 1.15em;
        font-style: italic;
        color: var(--quote-text);
    }

    .blog-content .quote-block strong {
        display: block;
        margin-bottom: 15px;
        font-size: 1.1em;
        color: var(--heading-color);
    }

    .blog-content .divider {
        border: 0;
        height: 2px;
        background: linear-gradient(to right, transparent, var(--accent-color), transparent);
        margin: 40px 0;
    }

    .blog-content .resources {
        background-color: var(--resources-bg);
        padding: 25px;
        border-radius: 5px;
        margin-top: 40px;
    }

    .blog-content .resources h3 {
        margin-top: 0;
        border-left: none;
        padding-left: 0;
    }

    .blog-content .resources ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .blog-content .resources li {
        margin-bottom: 10px;
    }

    .blog-content .resources a {
        color: var(--accent-color);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .blog-content .resources a:hover {
        color: var(--accent-hover);
        text-decoration: underline;
    }

    .blog-content .blog-image {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 30px auto;
        border-radius: 8px;
    }

    .blog-content .image-container {
        text-align: center;
        margin: 30px 0;
    }

    @media (max-width: 768px) {
        .blog-content h3 {
            font-size: 1.5em;
        }

        .blog-content .blog-image {
            margin: 20px auto;
        }
    }
</style>

<div class="blog-content">

<p><em>By Mark Corrigan, inspired by Sally Dillon and “Who\'s Got the Monkey?” by William Oncken Jr. &amp; Donald L. Wass</em><br>
<em>Also credit to an old gem by Engwall &amp; Jerbrant\'s “The Resource Allocation Syndrome in Multi-Project Environments”</em><br>
<em>22 January, 2002</em></p>

<p>It\'s a pity that the wisdom is not better understood. Edwards W. Deming understood this perfectly!</p>

<div class="image-container">
    <img src="/storage/images/blogpostimage_irritatingmonkeyonyourback.jpg" alt="A manager carrying a monkey on their back metaphor" class="blog-image">
</div>

<p>In today\'s fast-moving work environment, the classic management dilemma still rings true: managers are buried under workloads that were never really theirs. Sally Dillon\'s reflections on <em>Who\'s Got the Monkey?</em> remind us that too often, managers take ownership of problems that rightly belong to their team. But when we add modern concepts like <strong>TA (Time Asking)</strong> and the danger of <strong>resource overallocation</strong>, the picture becomes even clearer—and the solutions, far more practical.</p>

<hr class="divider">

<h3>The Monkey Problem: Ownership and Accountability</h3>

<p>Imagine walking down the corridor and being stopped by a team member with an urgent issue. At that moment, the “monkey” (the problem) is on their back. Yet when you agree to “look into it,” that monkey leaps to yours. Suddenly, your time—not theirs—is being consumed.</p>

<p>This dynamic happens every day in both traditional and Agile environments. The key lesson? Every problem must stay with the person who can—and should—solve it.</p>

<ul>
    <li><strong>Empowerment over rescue:</strong> Ask, “What\'s your plan to fix it?” rather than stepping in immediately.</li>
    <li><strong>Boundaries over chaos:</strong> Make it clear who owns each next step and when it\'s due.</li>
    <li><strong>Time discipline:</strong> Protect your discretionary time for strategy, not firefighting.</li>
</ul>

<p>Managers aren\'t paid to carry everyone else\'s monkeys—they\'re paid to build a team capable of carrying their own.</p>

<hr class="divider">

<h3>Introducing TAsking: Time Asking, Not Just Tasking</h3>

<p>In traditional project management, to <strong>task</strong> someone meant assigning deliverables and deadlines—often using structured tools like Microsoft Project Server. Each team member could agree to their TAsks, update progress, and submit evidence for approval. That\'s the heart of what I call <strong>TA (Time Asking)</strong>—not just giving tasks, but asking for clear commitments of time and accountability.</p>

<ul>
    <li><strong>Microsoft Project Server:</strong> Each member accepts and updates their TAsks, creating workflow transparency for the project manager.</li>
    <li><strong>Agile &amp; Scrum:</strong> Incorporate TAsking into daily stand-ups—each person states explicitly what they will deliver by tomorrow\'s meeting, by the end of the week, or by the sprint\'s close.</li>
    <li><strong>Jira Tip:</strong> Use <code>(+)</code> and <code>(/)</code> to mark a circle with a tick or plus, and <code>//</code> to insert a timestamp for today\'s date. Do this every sprint to see measurable progress and ensure monkeys stay exactly where they belong—on the backs of those responsible.</li>
</ul>

<p><strong>TA (Time Asking)</strong> is the antidote to ambiguity. It\'s about commitment, clarity, and mutual accountability—ensuring that time, not just tasks, is being actively managed.</p>

<hr class="divider">

<h3>The Hidden Enemy: Resource Overallocation</h3>

<p>Even with perfect delegation and clear TAsks, many projects still grind to a halt. Why? Because of a structural issue known as <strong>overallocation of resources</strong>.</p>

<p>Resource overallocation occurs when one person is assigned to multiple deliverables that overlap in time—sometimes across different projects. It\'s not just a scheduling issue; it\'s a systemic leadership failure. A single human resource cannot deliver fully to two simultaneous priorities. When this happens, tasks jam up, progress stalls, and project management unfairly takes the blame.</p>

<ul>
    <li><strong>Traditional project overload:</strong> Multiple dependencies and deadlines collide on a single team member\'s schedule.</li>
    <li><strong>Agile burnout:</strong> Too many user stories in flight, too few people to close them cleanly.</li>
    <li><strong>The executive\'s role:</strong> Resource overallocation isn\'t a project manager\'s problem to solve—it\'s an executive issue. Leadership must ensure resources are allocated realistically to avoid chronic work-in-progress bottlenecks.</li>
</ul>

<p><strong>Insight:</strong> Overallocated teams don\'t need more meetings—they need fewer competing priorities.</p>

<hr class="divider">

<h3>Modern Leadership Strategies</h3>

<p>To thrive in today\'s environment, managers must evolve from “doing” to “enabling.” Combine the timeless Monkey principle with modern TAsking and resource realism to create a culture of ownership and balance:</p>

<ul>
    <li><strong>Empowerment through TAsking:</strong> Encourage people to commit their own time estimates and take accountability for progress.</li>
    <li><strong>Clarity through documentation:</strong> Keep a living record of commitments, progress, and outcomes.</li>
    <li><strong>Balance through realistic allocation:</strong> Protect your team from taking on overlapping deliverables. It\'s not heroic to be overallocated—it\'s counterproductive.</li>
    <li><strong>Technology as an enabler:</strong> Use digital tools to automate tracking and reduce administrative drag.</li>
</ul>

<p>Ultimately, leadership today is about creating the conditions where both time and energy are used wisely.</p>

<hr class="divider">

<h3>Conclusion: Reclaiming Control and Flow</h3>

<p>The message from <em>Who\'s Got the Monkey?</em> remains timeless—keep ownership with those who own the work. By integrating <strong>TAsking</strong> and addressing <strong>resource overallocation</strong>, modern leaders can finally fix one of the most persistent problems in management: overloaded managers and jammed-up teams.</p>

<div class="image-container">
    <img src="/storage/images/blogpostimage_monkeymanagement.jpg" alt="Illustration of monkey management concept" class="blog-image">
</div>

<p>Protect your time. Respect your team\'s capacity. And ensure every monkey stays where it belongs.</p>

<p><strong>Essential insight from Engwall &amp; Jerbrant\'s “The Resource Allocation Syndrome in Multi-Project Environments”:</strong></p>

<div class="quote-block">
    <strong>Insight:</strong>
    "The key takeaway from the paper is that the resource allocation issues are a consequence of flawed organisational procedures rather than poor project management practices. Project and portfolio managers responsible for resource allocation are only too aware of this. However, they are powerless to do anything about it because, as Engwall and Jerbrant suggest, addressing the root cause of this syndrome is a task for executive management.”
</div>

<p>In other words, fixing the jammed state of project delivery requires executive-level commitment to reforming how resources are assigned, prioritised, and protected. Only then can managers and teams truly work at a sustainable pace and deliver consistent value.</p>

<hr class="divider">

<div class="resources">
    <h3>Download the Original References</h3>
    <p><small>If you register with PMWay you will be able to use these links below</small></p>
    <ul>
        <li><a href="/download/assets/blogpostdocument_monkey.pdf"  rel="noopener">Download <em>Who\'s Got the Monkey?</em> (PDF)</a></li>
        <li><a href="/download/assets/blogpostdocument_overallocationsyndrome.pdf"  rel="noopener">Download <em>The Resource Allocation Syndrome in Multi-Project Environments</em> (PDF)</a></li>
    </ul>
</div>

</div>

<script>
    const theme = localStorage.getItem(\'theme\');
    const htmlElement = document.documentElement;

    if(theme === \'dark\') {
        htmlElement.setAttribute(\'data-bs-theme\', \'dark\');
    } else {
        htmlElement.setAttribute(\'data-bs-theme\', \'light\');
    }
</script>',
                'post_slug' => 'whos-got-the-monkey-reclaiming-your-time-with-smarter-tasking-and-resource-management',
                'photo' => 'blogpostimage_monkeyseverywhere.jpg',
                'post_tags' => 'management, leadership, productivity, delegation, project-management, time-management',
                'approved' => 1,
                'created_at' => '2025-08-21 15:32:12',
                'updated_at' => '2025-08-21 15:32:12',
            ],

            [
                'user_id' => 1,
                'post_title' => 'Risk Management Simplified and Demystified',
                'post_slug' => 'risk-management-simplified-and-demystified',
                'photo' => 'blogpostimage_riskybusiness.jpg',
                'post_tags' => 'risk, issues, management, project, planning',
                'approved' => 1,
                'post_description' => '<style>
    /* Light mode (default) */
    .blog-content {
        --text-primary: #333333;
        --text-secondary: #555555;
        --heading-color: #2c3e50;
        --accent-color: #3498db;
        --accent-hover: #2980b9;
        --quote-bg: #ecf0f1;
        --quote-text: #2c3e50;
        --resources-bg: #e8f4f8;
    }

    /* Dark mode */
    [data-bs-theme="dark"] .blog-content {
        --text-primary: #f5f5f5;
        --text-secondary: #e8e8e8;
        --heading-color: #bbdefb;
        --accent-color: #90caf9;
        --accent-hover: #bbdefb;
        --quote-bg: #1a1a1a;
        --quote-text: #f5f5f5;
        --resources-bg: #1a2a3a;
    }

    .blog-content {
        line-height: 1.7;
        color: var(--text-primary);
    }

    .blog-content h3 {
        color: var(--heading-color);
        font-size: 1.8em;
        margin-top: 40px;
        margin-bottom: 20px;
        border-left: 5px solid var(--accent-color);
        padding-left: 15px;
    }

    .blog-content p {
        margin-bottom: 20px;
        font-size: 1.1em;
        color: var(--text-primary);
    }

    .blog-content p:first-of-type {
        font-size: 1.3em;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .blog-content strong {
        color: var(--heading-color);
        font-weight: 600;
    }

    .blog-content em {
        color: var(--text-secondary);
        font-style: italic;
    }

    .blog-content .quote-block {
        background-color: var(--quote-bg);
        border-left: 5px solid var(--accent-color);
        padding: 25px 30px;
        margin: 30px 0;
        font-size: 1.15em;
        font-style: italic;
        color: var(--quote-text);
    }

    .blog-content .divider {
        border: 0;
        height: 2px;
        background: linear-gradient(to right, transparent, var(--accent-color), transparent);
        margin: 40px 0;
    }

    .blog-content .resources {
        background-color: var(--resources-bg);
        padding: 25px;
        border-radius: 5px;
        margin-top: 40px;
    }

    .blog-content .blog-image {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 30px auto;
        border-radius: 8px;
    }
</style>

<div class="blog-content">

<p>Many project managers and team members seem stumped about what exactly is required in Risk Management. This blog provides a clear, no-nonsense explanation and a practical approach you can actually use.</p>

<h3>Why Risk Management?</h3>
<p>Imagine we live in a perfect world where nothing ever goes wrong. In that world, you wouldn\'t need Risk Management. But in the real world, things break, delays happen, and plans fall apart.</p>
<p>That\'s why Risk Management matters — it helps you anticipate trouble before it happens.</p>
<p>Interestingly, Carnegie Mellon University\'s Capability Maturity Model (CMM) places Risk Management at Level 3 — higher than essentials like Project Planning or Quality Assurance. It builds on those foundations to take your process maturity up a level.</p>

<h3>Risks vs. Issues</h3>
<p>Let\'s clear this up: <strong>Risks</strong> are things that might happen that you want to avoid. <strong>Issues</strong> are those risks actually happening.</p>
<p>Simple enough, right? You manage both, but at different stages of the game.</p>

<h3>A Practical Example: The Family Holiday</h3>
<p>Picture this — a family planning a road trip holiday. The plan: leave Saturday and drive seven hours to a beach destination. A clear <em>risk</em>? A tire could burst along the way. So, they pack a fully pumped spare and all the right tools. Smart move.</p>
<p>During the trip, the car hits a pothole — boom. Flat tire. That risk just became an issue. But because they had a plan, it\'s no big drama.</p>
<div class="image-container">
    <img src="/storage/images/blogpostimage_changeatire.jpg" alt="Changing a Tire" class="blog-image">
</div>
<p>Dad pulls over, sets up triangles, unpacks the boot, swaps the tire, and they\'re back on the road. That\'s effective Risk Management in action.</p>

<h3>Types of Risk Responses</h3>
<p>Here are your main options when dealing with risk:</p>
<p>a. <strong>Avoid</strong> – Don\'t do the risky activity.<br>
b. <strong>Take</strong> – Accept the risk to chase an opportunity.<br>
c. <strong>Remove the source</strong> – Eliminate what\'s causing it.<br>
d. <strong>Change likelihood</strong> – Make it less likely to occur.<br>
e. <strong>Change consequences</strong> – Reduce the damage if it does happen.<br>
f. <strong>Share</strong> – Spread the risk (insurance, contracts, partners).<br>
g. <strong>Retain</strong> – Accept it knowingly.<br>
h. <strong>Modify</strong> – Put in controls.<br>
i. <strong>Mitigate</strong> – Reduce its impact.<br>
j. <strong>Contingency plan</strong> – Have a recovery plan ready.</p>

<h3>Another Example: Swimming in the Sea</h3>
<p>Let\'s apply those responses to a fun one — the risk of a shark attack:</p>
<p><strong>Avoid</strong>: Don\'t swim in the sea.<br>
<strong>Take</strong>: Go anyway, you love the thrill.<br>
<strong>Remove source</strong>: Swim behind shark nets.<br>
<strong>Change likelihood</strong>: Stick to the pool.<br>
<strong>Modify</strong>: Wear a chainmail suit.<br>
<strong>Change consequences</strong>: Limit how often you swim.<br>
<strong>Share</strong>: Swim with a cage-diving company.<br>
<strong>Retain</strong>: Swim freely, fully aware.<br>
<strong>Mitigate</strong>: Use shark repellent.<br>
<strong>Contingency plan</strong>: Have medical aid, lifeguards, and emergency contacts ready.</p>

<div class="image-container">
    <img src="/storage/images/blogpostimage_cagediving.jpg" alt="Cage Diving" class="blog-image">
</div>

<h3>Implementing a Simple Risk Management Approach</h3>
<p>Keep it simple — not every potential problem deserves a place in your log. Track only the meaningful risks your team identifies.</p>
<p>Here\'s what to include:</p>
<p><strong>ID</strong>: Unique identifier<br>
<strong>Risk Statement</strong>: What could go wrong?<br>
<strong>Risk Description</strong>: Details of the risk<br>
<strong>Owner</strong>: Who\'s responsible<br>
<strong>Completion Date</strong>: When mitigation is due<br>
<strong>Severity</strong>: High / Medium / Low<br>
<strong>Likelihood</strong>: High / Medium / Low<br>
<strong>Treatment</strong>: Which response strategy you\'re applying</p>

<p>A spreadsheet works beautifully. Three tabs are enough:</p>
<ul>
    <li><strong>Tab 1:</strong> Project Information</li>
    <li><strong>Tab 2:</strong> Risks Log – Track ID, Statement, Description, Owner, Dates, Severity, Likelihood, Treatment, Status</li>
    <li><strong>Tab 3:</strong> Issues Log – ID, Description, Type, Owner, Dates, Status</li>
</ul>

<h3>Managing the Risk Register</h3>
<p>Risks evolve. Some fade, others escalate. Sometimes an issue today becomes a lesson learned — a new risk for tomorrow.</p>
<p>Keep the log alive. Update it, review it, and make sure each action taken is recorded and dated.</p>

<h3>Conclusion</h3>
<p>Risk Management doesn\'t need to be complex. It\'s simply about being ready when things go sideways. Understand your risks, track them smartly, and respond with purpose — so your projects don\'t derail when life happens.</p>

<div class="resources">
    <h3>Download the Tools</h3>
    <ul>
        <li><a href="/download/assets/blogpostasset_risksandissuestracker.zip"  rel="noopener">Download <em>The Risks and Issues Tracker</em> (ZIP)</a></li>
    </ul>
</div>

</div>

<script>
    const theme = localStorage.getItem(\'theme\');
    const htmlElement = document.documentElement;
    if(theme === \'dark\') {
        htmlElement.setAttribute(\'data-bs-theme\', \'dark\');
    } else {
        htmlElement.setAttribute(\'data-bs-theme\', \'light\');
    }
</script>',
                'created_at' => '2025-09-03 08:47:55',
                'updated_at' => '2025-09-03 08:47:55',
            ],

            [
                'user_id' => 1,
                'post_title' => 'Done Done: It ain\'t over \'till it\'s over!',
                'post_description' => '<style>.blog-image { display: block; margin: 20px auto; max-width: 90%; height: auto; border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
} </style><h1 align="left">Done Done: It ain\'t over \'till it\'s over!</h1> <br> <p>In the Scrum.org Headquarters there is a picture of Ken Schwaber - one of the founders of Scrum - pointing at a sticky saying "Done." This picture underscores the most essential rule in Scrum: create "Done" increments every Sprint.</p> <p>Many people assume Scrum is only about building software. In reality, Scrum is a framework for delivering value in any
 complex environment. Scrum Teams can build products, services, or outcomes—anything that requires collaboration, iterative improvement, and risk reduction. For example, Scrum has been applied successfully to marketing campaigns, event planning, healthcare processes, machinery development, and even writing books. The principles of creating "Done" increments, inspecting, and adapting remain the same, no matter what the team is building.</p>
 <p>But many teams struggle with this rule. It is tempting to fall into "shades of Done." An increment is considered "Done" by the Development Team, but requires further testing and stabilization in the next Sprint. Or work is considered "Done" by the Development Team, but the install package still needs to be created. Or work is considered "Done," but acceptance testing hasn\'t been done yet.</p>
 <p>"Done" doesn\'t support adjectives like "nearly," "pretty much," or "almost." An increment is "Done" or it isn\'t—there is no gray area. And there is a very powerful, compelling reason behind this: the Scrum Framework only helps reduce the risk of wasted effort when you deliver "Done" increments <em>every</em> Sprint!</p> <p>Essentially, a "Done" increment is a version of your product that is, or can immediately be, released to users and is valuable to them.</p> <p><b>If you are unable to deliver a "Done" increment during a Sprint, you are not doing Scrum!</b> <br><br> This is clearly explained in the image directly below. Click the image to see what happens if this problem continues sprint after sprint.</p>
 <img src="/storage/images/blogpostimage_doneandundone.jpg" alt="Done and Undone Scrum" class="blog-image" style="max-width: 100%; height: auto; display: block; margin: 20px 0;" onmouseover=\'this.src="/storage/images/blogpostimage_undonescrum.jpg"\' onmouseout=\'this.src="/storage/images/blogpostimage_doneandundone.jpg"\'><br> <i>I have a section in PMWay that deals with the 7 types of Scrum Dysfunctions which is awesome. <br>Undone Scrum is one of the Scrum Dysfunctions!</i> </a> </p> <h3>Defining "Done"</h3> <p>What constitutes "Done" depends greatly on context. Building a website for an external customer will require different work than working on mission-critical software for internal users. It depends on your organization’s quality guidelines, the criticality of the product, the level of user involvement, the technologies in use, and many other factors.</p> <p>Suppose you are building a new feature for your product during the current Sprint. This requires a workflow of tasks—from writing code to creating unit tests, from designing to testing on mobile devices, and from user testing to integrating with other teams’ work—ultimately deploying it to users. It demands diverse skills in the Development Team and an effective workflow to accomplish everything within a single Sprint.</p> <p>New Scrum Teams often struggle with this. It can be tempting to define "Done" as only what the team can realistically achieve in a Sprint, such as:</p> <ul> <li>Code peer-reviewed by another developer;</li> <li>Unit tests written and passing;</li> <li>Code merged and checked into the development branch.</li> </ul> <p>While this may seem sufficient, it does not always result in a truly releasable increment.</p> <h3>"Done" and Undone Work</h3> <p>A Development Team may believe they are delivering a "Done" increment every Sprint. After all, they can tick all the boxes. But focusing only on working code often leaves the increment incomplete from the Product Owner’s perspective. The remaining steps—testing, integration, scaling, deployment, or documentation—may get discovered in future Sprints. Some examples:</p> <ul> <li>The Product Owner discovers missing features promised to stakeholders;</li> <li>Users report critical bugs that require fixes;</li> <li>Code integration with other teams fails, creating complex merge conflicts;</li> <li>The feature doesn’t scale correctly;</li> <li>Deployment fails due to missing dependencies;</li> <li>Security scans reveal vulnerabilities;</li> <li>Performance issues arise post-deployment;</li> <li>Missing documentation triggers support calls;</li> <li>The feature proves unusable for certain user groups.</li> </ul> <p>This <strong>undone work</strong> disrupts future Sprints, decreases transparency, gives a false sense of progress, and maintains high risk. Over time, it erodes stakeholders’ trust in the Scrum Team.</p> <h3>Three examples to illustrate the point</h3> <ul> <li>A Scrum Team customizing machinery software involved users early but rolled out late, encountering hardware issues that negated previous investments;</li> <li>A product team invested heavily without exposing it to users, and demand failed to meet expectations;</li> <li>A small Development Team building a website observed that only fully "Done" items generated useful feedback from stakeholders.</li> </ul> <p>These examples show that releasing increments to users early mitigates risk and highlights the importance of collaboration between Development Teams and Product Owners in defining "Done."</p> <h3>Definition of Done as a "risk detector"</h3> <p>In Scrum, a complete definition of "Done" is your most powerful risk detector. It reduces undone work by making all required steps transparent and exposes impediments preventing the creation of "Done" increments <em>every</em> Sprint.</p> <h3>Now what?</h3> <p>Creating "Done" increments every Sprint is challenging. Key strategies include:</p> <ul> <li><strong>Maintain a ruthless focus on "Done":</strong> Only include items in the Sprint Backlog that can result in a potentially releasable increment.</li> <li><strong>Make the gap transparent:</strong> Identify what should be done versus what can currently be done and address impediments.</li> <li><strong>Make it smaller & simpler:</strong> Focus on smaller increments that can be completed fully within a Sprint.</li> <li><strong>Focus on risk reduction and value:</strong> Scrum is about reducing risk, maximizing value, and exposing impediments.</li> </ul> <h3>A hard truth</h3> <p>If you cannot deliver a "Done" increment every Sprint, you aren’t truly doing Scrum. Maintaining focus on "Done" makes obstacles highly visible and allows teams to adapt quickly.</p> <p><a href="https://medium.com/the-liberators/why-scrum-requires-completely-done-software-every-sprint-f7fa3ca33286">Thanks to the Liberators for the above. Excellent work!</a></p> <p>Also thanks to Head First who supplied the quick one page summary below:</p><div align="center"> <img src="/storage/images/blogpostimage_donedone.jpg" alt="Done Done" class="blog-image"> </div>',
                'post_slug' => 'done-done-it-aint-over-till-its-over',
                'photo' => 'blogpostimage_lackingdone.png',
                'post_tags' => 'project management, Scrum, leadership, planning, governance',
                'approved' => 1,
                'created_at' => '2025-09-19 13:05:33',
                'updated_at' => '2025-09-19 13:05:33',
            ],

            [
                'user_id' => 1,
                'post_title' => 'Empirical Process Control: Delivering Value Fast with Scrum',
                'post_description' => '
<style>
    /* Light mode (default) */
    .blog-content {
        --text-primary: #333333;
        --text-secondary: #555555;
        --heading-color: #2c3e50;
        --accent-color: #3498db;
        --accent-hover: #2980b9;
        --quote-bg: #ecf0f1;
        --quote-text: #2c3e50;
        --resources-bg: #e8f4f8;
    }

    /* Dark mode */
    [data-bs-theme="dark"] .blog-content {
        --text-primary: #f5f5f5;
        --text-secondary: #e8e8e8;
        --heading-color: #bbdefb;
        --accent-color: #90caf9;
        --accent-hover: #bbdefb;
        --quote-bg: #1a1a1a;
        --quote-text: #f5f5f5;
        --resources-bg: #1a2a3a;
    }

    .blog-content {
        line-height: 1.7;
        color: var(--text-primary);
    }

    .blog-content h3 {
        color: var(--heading-color);
        font-size: 1.8em;
        margin-top: 40px;
        margin-bottom: 20px;
        border-left: 5px solid var(--accent-color);
        padding-left: 15px;
    }

    .blog-content p {
        margin-bottom: 20px;
        font-size: 1.1em;
        color: var(--text-primary);
    }

    .blog-content p:first-of-type {
        font-size: 1.3em;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .blog-content strong {
        color: var(--heading-color);
        font-weight: 600;
    }

    .blog-content em {
        color: var(--text-secondary);
        font-style: italic;
    }

    .blog-content .quote-block {
        background-color: var(--quote-bg);
        border-left: 5px solid var(--accent-color);
        padding: 25px 30px;
        margin: 30px 0;
        font-size: 1.15em;
        font-style: italic;
        color: var(--quote-text);
    }

    .blog-content .quote-block strong {
        display: block;
        margin-bottom: 15px;
        font-size: 1.1em;
        color: var(--heading-color);
    }

    .blog-content .divider {
        border: 0;
        height: 2px;
        background: linear-gradient(to right, transparent, var(--accent-color), transparent);
        margin: 40px 0;
    }

    .blog-content .resources {
        background-color: var(--resources-bg);
        padding: 25px;
        border-radius: 5px;
        margin-top: 40px;
    }

    .blog-content .resources h3 {
        margin-top: 0;
        border-left: none;
        padding-left: 0;
    }

    .blog-content .resources ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .blog-content .resources li {
        margin-bottom: 10px;
    }

    .blog-content .resources a {
        color: var(--accent-color);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .blog-content .resources a:hover {
        color: var(--accent-hover);
        text-decoration: underline;
    }

    .blog-content .blog-image {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 30px auto;
        border-radius: 8px;
    }

    .blog-content .image-container {
        text-align: center;
        margin: 30px 0;
    }

    @media (max-width: 768px) {
        .blog-content h3 {
            font-size: 1.5em;
        }

        .blog-content .blog-image {
            margin: 20px auto;
        }
    }
</style>

<div class="blog-content">

<h3>As you can see from the Scrum Principles below, Empirical Process Control is right up there with Iterative Development</h3>
<p>Click the button at the bottom of this blog to see Iterative Development in action.</p>

<div class="image-container">
    <img class="img-fluid blog-image" src="/storage/images/blogpostimage_principles.png" alt="Scrum Principles">
</div>

<p>Scrum isn\'t about rigid plans—it\'s about <strong>learning, adapting, and delivering real value continuously</strong>. This is the essence of <strong>empirical process control</strong>: making decisions based on observation, experimentation, and feedback.</p>

<div class="image-container">
    <img class="img-fluid blog-image" src="/storage/images/blogpostimage_agileprinciples.png" alt="Agile Principles">
</div>

<div id="keyIdeaBox" class="border-start border-4 border-success p-3 my-3">
    <strong>Key Idea:</strong> Empirical process control ensures every sprint produces <span class="fw-bold text-success">done-done</span> deliverables, delivering real value, not just work in progress.
</div>

<h3>What is Empirical Process Control</h3>
<p>The three essential parts of Empirical Process Control are discussed below.</p>

<h3>1. Transparency</h3>
<p>Transparency makes everything visible, fostering trust and effective decision-making:</p>
<ul>
    <li><strong>Artifacts:</strong> Vision Statement, Prioritized Product Backlog, Release Plans</li>
    <li><strong>Meetings:</strong> Daily Standups, Sprint Reviews</li>
    <li><strong>Information Radiators:</strong> Scrumboards, Burndown Charts</li>
</ul>

<h3>2. Inspection</h3>
<p>Inspection allows early detection of issues and ensures quality:</p>
<ul>
    <li>Monitoring progress via Scrumboards and metrics</li>
    <li>Gathering feedback from customers and stakeholders</li>
    <li>Reviewing deliverables during Demonstrate & Validate Sprints</li>
</ul>

<h3>3. Adaptation</h3>
<p>Adaptation ensures continuous improvement based on insights:</p>
<ul>
    <li>Daily Standups and risk identification</li>
    <li>Backlog refinement and change requests</li>
    <li>Retrospectives at sprint and project levels</li>
</ul>

<h3>Iteration & Incrementation</h3>
<p>Scrum emphasizes <strong>short iterations (sprints)</strong> and <strong>incremental delivery</strong>, allowing teams to release the <strong>minimum viable product (MVP)</strong> quickly:</p>
<ul>
    <li>Deliver a working solution to users as soon as possible</li>
    <li>Collect real feedback to guide improvements</li>
    <li>Focus on high-value features first, add enhancements later</li>
</ul>

<p align="center">
    <button id="toggleSecretBtn" style="padding:10px 20px; background-color:#2196F3; color:white; border:none; border-radius:5px; cursor:pointer;">Click for the Secret</button>
</p>

<div id="secretImage" style="display:none; text-align:center; margin-top:15px;">
    <img class="img-fluid blog-image" src="/storage/images/blogpostimage_incrementaldeliveryofvalue.gif" alt="Secret Iteration Image">
</div>

</div>

<script>
    const keyIdeaBox = document.getElementById(\'keyIdeaBox\');
    const theme = localStorage.getItem(\'theme\');
    if(theme === \'dark\') {
        keyIdeaBox.classList.add(\'bg-dark\', \'text-light\');
        keyIdeaBox.classList.remove(\'bg-light\', \'text-dark\');
    } else {
        keyIdeaBox.classList.add(\'bg-light\', \'text-dark\');
        keyIdeaBox.classList.remove(\'bg-dark\', \'text-light\');
    }

    const btn = document.getElementById(\'toggleSecretBtn\');
    const secret = document.getElementById(\'secretImage\');
    btn.addEventListener(\'click\', function() {
        if(secret.style.display === \'none\') {
            secret.style.display = \'block\';
            btn.textContent = \'Close Secret\';
        } else {
            secret.style.display = \'none\';
            btn.textContent = \'Click for the Secret\';
        }
    });
</script>

<script>
    const themeSetting = localStorage.getItem(\'theme\');
    const htmlElement = document.documentElement;
    if(themeSetting === \'dark\') {
        htmlElement.setAttribute(\'data-bs-theme\', \'dark\');
    } else {
        htmlElement.setAttribute(\'data-bs-theme\', \'light\');
    }
</script>
',
                'post_slug' => 'empirical-process-control-delivering-value-fast-with-scrum',
                'photo' => 'blogpostimage_agileprinciples2.png',
                'post_tags' => 'project management, agile, scrum, leadership, planning, governance',
                'approved' => 1,
                'created_at' => '2025-10-02 09:22:41',
                'updated_at' => '2025-10-02 09:22:41',
            ],

            [
                'user_id' => 1,
                'post_title' => 'Freedoms, Barriers and Goals',
                'post_description' => '<style>
    /* Light mode (default) */
    .blog-content {
        --text-primary: #333333;
        --text-secondary: #555555;
        --heading-color: #2c3e50;
        --accent-color: #3498db;
        --accent-hover: #2980b9;
        --quote-bg: #ecf0f1;
        --quote-text: #2c3e50;
        --resources-bg: #e8f4f8;
    }

    /* Dark mode */
    [data-bs-theme="dark"] .blog-content {
        --text-primary: #f5f5f5;
        --text-secondary: #e8e8e8;
        --heading-color: #bbdefb;
        --accent-color: #90caf9;
        --accent-hover: #bbdefb;
        --quote-bg: #1a1a1a;
        --quote-text: #f5f5f5;
        --resources-bg: #1a2a3a;
    }

    .blog-content {
        line-height: 1.7;
        color: var(--text-primary);
    }

    .blog-content h1 {
        color: var(--heading-color);
        font-size: 2.5em;
        margin-bottom: 30px;
        border-bottom: 4px solid var(--accent-color);
        padding-bottom: 15px;
    }

    .blog-content h2 {
        color: var(--heading-color);
        font-size: 1.8em;
        margin-top: 40px;
        margin-bottom: 20px;
        border-left: 5px solid var(--accent-color);
        padding-left: 15px;
    }

    .blog-content h3 {
        color: var(--heading-color);
        font-size: 1.3em;
        margin-top: 30px;
        margin-bottom: 15px;
    }

    .blog-content p {
        margin-bottom: 20px;
        font-size: 1.1em;
        color: var(--text-primary);
    }

    .blog-content p:first-of-type {
        font-size: 1.3em;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .blog-content strong {
        color: var(--heading-color);
        font-weight: 600;
    }

    .blog-content em {
        color: var(--text-secondary);
        font-style: italic;
    }

    .blog-content .quote-block {
        background-color: var(--quote-bg);
        border-left: 5px solid var(--accent-color);
        padding: 25px 30px;
        margin: 30px 0;
        font-size: 1.15em;
        font-style: italic;
        color: var(--quote-text);
    }

    .blog-content .quote-block strong {
        display: block;
        margin-bottom: 15px;
        font-size: 1.1em;
        color: var(--heading-color);
    }

    .blog-content .divider {
        border: 0;
        height: 2px;
        background: linear-gradient(to right, transparent, var(--accent-color), transparent);
        margin: 40px 0;
    }

    .blog-content .resources {
        background-color: var(--resources-bg);
        padding: 25px;
        border-radius: 5px;
        margin-top: 40px;
    }

    .blog-content .resources h3 {
        margin-top: 0;
    }

    .blog-content .resources ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .blog-content .resources li {
        margin-bottom: 10px;
    }

    .blog-content .resources a {
        color: var(--accent-color);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .blog-content .resources a:hover {
        color: var(--accent-hover);
        text-decoration: underline;
    }

    .blog-content .blog-image {
        max-width: 100%;
        height: auto;
        display: inline-block;
        margin: 20px 10px;
    }

    .blog-content .image-container {
        text-align: center;
        margin: 30px 0;
    }

    @media (max-width: 768px) {
        .blog-content h1 {
            font-size: 2em;
        }

        .blog-content h2 {
            font-size: 1.5em;
        }

        .blog-content .blog-image {
            margin: 10px 0;
        }
    }
</style>

<div class="blog-content">
    <h1>Freedoms, Barriers and Goals</h1>

    <p>Think about a beer bottle for a second.</p>

    <p>No, seriously—stick with me here. That simple bottle sitting in your fridge is actually a masterclass in how life works. It demonstrates three forces that shape everything from your morning routine to billion-dollar projects: <strong>freedoms</strong>, <strong>barriers</strong>, and <strong>goals</strong>.</p>

    <p>The bottle gives the beer freedom to exist in liquid form. The glass creates barriers that keep it contained. And the goal? Getting that cold one from the brewery to your hand (or glass, if you\'re fancy).</p>

    <div class="image-container">
        <img src="/storage/images/blogpostimage_bottle.png" alt="Beer bottle" class="blog-image">
        <img src="/storage/images/blogpostimage_sixpackofbeer.png" alt="Six pack of beer bottles" class="blog-image">
    </div>

    <p>Remove any one of these elements and the system collapses. No barriers? Beer everywhere. No freedom? The liquid can\'t flow. No goal? Why bother?</p>

    <h2>The Same Rules Run Everything</h2>

    <p>A dam works the same way. Water has the freedom to flow, barriers channel that energy, and the goal is providing water (or hydroelectric power) where it\'s needed.</p>

    <div class="image-container">
        <img src="/storage/images/blogpostimage_dam.jpg" alt="Dam showing barriers and controlled water" class="blog-image">
    </div>

    <p>Your project? Same deal. The PMBOK Dashboard shows this perfectly—those knowledge areas on the left are your barriers. They constrain and guide your project\'s freedom so you actually hit your goal instead of spiraling into chaos.</p>

    <div class="image-container">
        <img src="/storage/images/blogpostimage_mainprocessdashraised.png" alt="PMBOK dashboard example" class="blog-image">
    </div>

    <p>Living well, building great products, running successful projects—they all come down to balancing these three forces.</p>

    <h2>How We Learn the Hard Way</h2>

    <p>Here\'s where it gets interesting.</p>

    <p>When you were a baby, you had zero barriers. Hungry? Cry. Food appears. Cold? Cry. Warmth appears. You were the center of the universe, and the universe delivered.</p>

    <p>Then life started teaching you otherwise.</p>

    <p>You bumped into a table—ouch. Something existed outside your control. You grabbed another kid\'s toy and got a firm "No." You threw a tantrum and your parents didn\'t cave. Bit by bit, your boundaries took shape.</p>

    <p>And here\'s the thing: <strong>you needed those boundaries</strong>.</p>

    <p>Some people never get this lesson. The kid who grows up with zero structure becomes the teenager who thinks rules don\'t apply. The adult who avoids all responsibility. The extreme version? Someone lost in addiction, chasing total freedom in a haze, avoiding the discipline that real goals require.</p>

    <h2>"No" Isn\'t a Dirty Word</h2>

    <p>The word "No" gets a bad rap. But it\'s not always negative—it establishes healthy limits. It teaches us how to operate within constraints.</p>

    <p>"Respect" is the flip side. It shows you understand others have boundaries too—their privacy, their stuff, their space, their time.</p>

    <p>In a perfect utopia, everyone gets everything they want. But we don\'t live there. We live in a world of scarcity. Limited jobs. Limited wealth. Limited resources.</p>

    <p>Economists call it having a <em>multiplicity of wants</em> with <em>scarce resources</em>. There\'s only so much land (oil, minerals, space). Only so much labor. Only so much capital.</p>

    <p>But the most important resource? <strong>The entrepreneur.</strong> The person with the vision, training, and guts to pull it all together. They see the goal, navigate the barriers, and make it happen.</p>

    <h2>When Balance Breaks Down</h2>

    <p>Remember the story of the golden goose? Guy gets a goose that lays one golden egg per day. Nice setup, right? But greed kicks in. He wants all the eggs NOW. So he kills the goose.</p>

    <p>No more eggs. Ever.</p>

    <p>That\'s what happens when you mismanage freedoms, barriers, and goals.</p>

    <p>Too many barriers? You drown in restrictions. People burn out, shut down, give up entirely.</p>

    <p>Or consider the workaholic obsessed with goals. They work 80-hour weeks, ignore their family, sacrifice their health. They\'ve loaded up so many barriers that freedom disappears. Often, they eventually snap—maybe through an affair or a breakdown—and face brutal consequences when reality crashes back in.</p>

    <p>Then there\'s the opposite: too many goals, no focus. The "jack of all trades, master of none." Spread so thin they never actually achieve anything meaningful.</p>

    <p>In project management, this is why <strong>risk management</strong> exists. It\'s about identifying and breaking down barriers before they derail your project.</p>



    <h2>The Bottom Line</h2>

    <p>As W. Edwards Deming put it:</p>

    <div class="quote-block">
        <strong>"It does not happen all at once. There is (more often than not) no instant pudding."</strong>
        And:
        <strong>"A goal without a method is nonsense!"</strong>
    </div>

    <p>Hard work matters. But not at the cost of your health or relationships. A project run on unrealistic expectations or insufficient resources will fail.</p>

    <p>Success—real, sustainable success—comes from understanding these three forces and keeping them balanced. Know your freedoms. Respect your barriers. Lock onto your goals.</p>

    <p>Do that, and whether you\'re managing a project or managing your life, you\'ll hit the target.</p>
       <div class="resources">
        <h3>Want to Dig Deeper?</h3>
        <p>For more detail click the link below:</p>
        <ul>
            <li><a href="/freedoms-barriers-goals">Use the Freedoms Barriers and Goals mindset and find happiness</a></li>
        </ul>
    </div>

</div>

<script>
    // Read theme from localStorage and apply to blog content
    const theme = localStorage.getItem(\'theme\'); // expects \'light\' or \'dark\'
    const htmlElement = document.documentElement;

    if(theme === \'dark\') {
        htmlElement.setAttribute(\'data-bs-theme\', \'dark\');
    } else {
        htmlElement.setAttribute(\'data-bs-theme\', \'light\');
    }
</script>',
                'post_slug' => 'freedoms-barriers-and-goals',
                'photo' => 'blogpostimage_barrier.jpg',
                'post_tags' => 'project management, PMBOK, psychology, leadership, balance, constraints',
                'approved' => 1,
                'created_at' => '2025-10-18 16:11:20',
                'updated_at' => '2025-10-18 16:11:20',
            ],

            [
                'user_id' => 1,
                'post_title' => 'ScrumBut: The Dangerous Phrase Killing Your Agility',
                'post_description' => '<style>
    /* Light mode (default) */
    .blog-content {
        --text-primary: #333333;
        --text-secondary: #555555;
        --heading-color: #2c3e50;
        --accent-color: #3498db;
        --accent-hover: #2980b9;
        --quote-bg: #ecf0f1;
        --quote-text: #2c3e50;
        --resources-bg: #e8f4f8;
    }

    /* Dark mode */
    [data-bs-theme="dark"] .blog-content {
        --text-primary: #f5f5f5;
        --text-secondary: #e8e8e8;
        --heading-color: #bbdefb;
        --accent-color: #90caf9;
        --accent-hover: #bbdefb;
        --quote-bg: #1a1a1a;
        --quote-text: #f5f5f5;
        --resources-bg: #1a2a3a;
    }

    .blog-content {
        line-height: 1.7;
        color: var(--text-primary);
    }

    .blog-content h3 {
        color: var(--heading-color);
        font-size: 1.8em;
        margin-top: 40px;
        margin-bottom: 20px;
        border-left: 5px solid var(--accent-color);
        padding-left: 15px;
    }

    .blog-content p {
        margin-bottom: 20px;
        font-size: 1.1em;
        color: var(--text-primary);
    }

    .blog-content p:first-of-type {
        font-size: 1.3em;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .blog-content strong {
        color: var(--heading-color);
        font-weight: 600;
    }

    .blog-content em {
        color: var(--text-secondary);
        font-style: italic;
    }

    .blog-content .quote-block {
        background-color: var(--quote-bg);
        border-left: 5px solid var(--accent-color);
        padding: 25px 30px;
        margin: 30px 0;
        font-size: 1.15em;
        font-style: italic;
        color: var(--quote-text);
    }

    .blog-content .quote-block strong {
        display: block;
        margin-bottom: 15px;
        font-size: 1.1em;
        color: var(--heading-color);
    }

    .blog-content .divider {
        border: 0;
        height: 2px;
        background: linear-gradient(to right, transparent, var(--accent-color), transparent);
        margin: 40px 0;
    }

    .blog-content .resources {
        background-color: var(--resources-bg);
        padding: 25px;
        border-radius: 5px;
        margin-top: 40px;
    }

    .blog-content .resources h3 {
        margin-top: 0;
        border-left: none;
        padding-left: 0;
    }

    .blog-content .resources ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .blog-content .resources li {
        margin-bottom: 10px;
    }

    .blog-content .resources a {
        color: var(--accent-color);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .blog-content .resources a:hover {
        color: var(--accent-hover);
        text-decoration: underline;
    }

    .blog-content .blog-image {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 30px auto;
        border-radius: 8px;
    }

    .blog-content .image-container {
        text-align: center;
        margin: 30px 0;
    }

    .blog-content ul.scrumbut-list {
        list-style: disc;
        margin-left: 30px;
        color: var(--text-primary);
    }

    .blog-content ul.scrumbut-list li {
        margin-bottom: 15px;
        font-size: 1.1em;
    }

    @media (max-width: 768px) {
        .blog-content h3 {
            font-size: 1.5em;
        }

        .blog-content .blog-image {
            margin: 20px auto;
        }
    }
</style>

<div class="blog-content">
    <p>"We\'re doing Scrum, but..."</p>

    <p>If you\'ve ever heard this phrase in your organization—or worse, caught yourself saying it—you\'ve encountered ScrumBut. It\'s the most common indicator that your team isn\'t actually doing Scrum. You\'re doing something else entirely.</p>

    <p>And here\'s the problem: that "something else" usually gives you all the overhead of Scrum with none of the benefits.</p>

       <h3>What Exactly is ScrumBut?</h3>

    <p>ScrumBut is a term coined by Ken Schwaber and Jeff Sutherland (the co-creators of Scrum) to describe teams that claim to practice Scrum while systematically skipping or modifying key elements of the framework.</p>

    <p>The pattern is always the same:</p>

    <div class="quote-block">
        <strong>"We use Scrum, but [we don\'t do X] because [reason that seems sensible at the time]."</strong>
    </div>

    <p>The "but" is where agility goes to die.</p>

    <h3>The Hall of Shame: Most Common ScrumButs</h3>

    <p>Let\'s look at the classics. You\'ve probably heard—or said—at least one of these:</p>

    <ul class="scrumbut-list">
        <li><strong>"We\'re doing Scrum, but we don\'t do retrospectives."</strong> Translation: "We repeat the same mistakes every sprint and wonder why nothing improves."</li>

        <li><strong>"We\'re doing Scrum, but our sprints are six weeks long."</strong> That\'s not a sprint. That\'s a mini-waterfall with daily standups.</li>

        <li><strong>"We\'re doing Scrum, but we add work to the sprint whenever it comes up."</strong> So you have no sprint goal, no commitment, and no ability to plan. Got it.</li>

        <li><strong>"We\'re doing Scrum, but the Product Owner is too busy to attend sprint planning."</strong> Then you don\'t have a Product Owner. You have someone with a fancy title who isn\'t doing the job.</li>

        <li><strong>"We\'re doing Scrum, but we skip daily standups when we\'re busy."</strong> You mean when you need coordination the most? Brilliant.</li>

        <li><strong>"We\'re doing Scrum, but we don\'t have a Scrum Master."</strong> Because who needs someone focused on improving how the team works, right?</li>
    </ul>

    <div class="image-container">
        <img src="/storage/images/blogpostimage_scrumframework.jpg" alt="Proper Scrum framework diagram" class="blog-image">
    </div>

    <h3>Why Teams Fall Into the ScrumBut Trap</h3>

    <p>Here\'s the thing: teams don\'t adopt ScrumBut because they\'re lazy or incompetent. They do it because they\'re under pressure and something has to give.</p>

    <p>The typical story goes like this:</p>

    <p>Management mandates "agile." The team starts with genuine Scrum. Everything feels like extra work at first—ceremonies eat up time, the Product Owner role is awkward, the Definition of Done seems restrictive.</p>

    <p>Then pressure hits. A deadline looms. A key stakeholder demands a feature mid-sprint. The team is "too busy" for that retrospective.</p>

    <p>One compromise leads to another. Before long, you\'re not doing Scrum anymore. You\'re doing ScrumBut.</p>

    <p><strong>The cruel irony?</strong> The shortcuts taken to save time usually create more problems than they solve. You end up spending more time firefighting than you would have spent doing Scrum properly.</p>

    <h3>The Real Cost of ScrumBut</h3>

    <p>ScrumBut isn\'t just about violated principles or purist complaints. It has real, measurable consequences:</p>

    <p><strong>You lose predictability.</strong> Without consistent sprint lengths and protected sprint scope, you can\'t forecast. Your velocity data becomes meaningless. Stakeholders never know when things will actually ship.</p>

    <p><strong>You lose transparency.</strong> When you skip retrospectives or daily standups, problems stay hidden. Technical debt accumulates. Team dysfunction festers. By the time issues surface, they\'re crises.</p>

    <p><strong>You lose the feedback loops.</strong> Scrum\'s ceremonies exist to create rapid feedback. Skip them, and you\'re flying blind. You find out six weeks later that you built the wrong thing.</p>

    <p><strong>You lose team morale.</strong> Nothing kills motivation faster than fake agile. The team knows they\'re not really doing Scrum. They see the dysfunction. But they\'re told to keep pretending everything is "agile."</p>

    <div class="image-container">
        <img src="/storage/images/blogpostimage_agilefailure.jpg" alt="The cost of cutting corners in Scrum" class="blog-image">
    </div>

    <h3>How to Spot ScrumBut in Your Organization</h3>

    <p>Not sure if you\'re guilty? Ask yourself these questions:</p>

    <ul class="scrumbut-list">
        <li>Can anyone outside the team add work to your current sprint without consequence?</li>
        <li>Are your sprints longer than four weeks—or do they vary in length?</li>
        <li>Do you regularly skip any Scrum ceremonies?</li>
        <li>Is your Product Owner unavailable for sprint planning or backlog refinement?</li>
        <li>Do you go more than three months without adjusting how you work based on retrospective insights?</li>
        <li>Can you articulate your current sprint goal without checking documentation?</li>
        <li>Does your team have a clear, enforced Definition of Done?</li>
    </ul>

    <p>If you answered "yes" to the first five questions or "no" to the last two, you\'ve got ScrumBut.</p>

    <h3>Breaking Free: From ScrumBut to Actual Scrum</h3>

    <p>The good news? You can fix this. But it requires honesty and commitment.</p>

    <p><strong>Step 1: Admit the problem.</strong> Stop saying you\'re doing Scrum when you\'re not. Call it what it is—ScrumBut, hybrid agile, or just "our process." Honesty is the first step to improvement.</p>

    <p><strong>Step 2: Understand why Scrum works.</strong> Each ceremony and artifact exists for a reason. Retrospectives aren\'t optional touchy-feely sessions—they\'re how you improve. Daily standups aren\'t status reports—they\'re coordination mechanisms. Learn the "why" before you decide to skip the "what."</p>

    <p><strong>Step 3: Pick one thing to fix.</strong> Don\'t try to fix everything at once. Choose your worst ScrumBut and address it. If you\'re skipping retrospectives, commit to holding them for the next three sprints. If your sprints are too long, cut them to two weeks.</p>

    <p><strong>Step 4: Protect the team.</strong> This is the Scrum Master\'s job. When stakeholders try to add mid-sprint scope, push back. When meetings threaten to overrun, facilitate better. When the organization pressures the team to skip ceremonies, be the shield.</p>

    <p><strong>Step 5: Measure the impact.</strong> Track what changes when you fix your ScrumBut patterns. Did your velocity stabilize? Did your team engagement improve? Did your quality metrics go up? Use data to prove that proper Scrum works.</p>

    <div class="quote-block">
        <strong>Remember: Scrum is a framework, not a buffet.</strong>
        You can\'t pick and choose which parts to follow and expect it to work. It\'s a system where each element supports the others.
    </div>

    <h3>When "Not Scrum" Is Actually OK</h3>

    <p>Here\'s a truth bomb: maybe you shouldn\'t be doing Scrum at all.</p>

    <p>Scrum works brilliantly for complex product development with uncertain requirements. But if you\'re doing operational work, small enhancements, or projects with completely fixed scope, there might be better approaches.</p>

    <p>Kanban might suit you better. Or a hybrid approach. Or even—gasp—waterfall for certain types of work.</p>

    <p><strong>The sin isn\'t in not doing Scrum.</strong> The sin is claiming you\'re doing Scrum while systematically undermining its core principles, then blaming "agile" when things go wrong.</p>

    <p>Be honest about what you\'re doing and why. If Scrum doesn\'t fit, choose something else. But don\'t do ScrumBut and expect Scrum results.</p>

    <h3>The Bottom Line</h3>

    <p>ScrumBut is a symptom, not a disease. It\'s a signal that something in your organization is broken—maybe your understanding of Scrum, maybe your organizational culture, maybe your leadership support.</p>

    <p>The solution isn\'t to double down on the compromise. It\'s to address the root cause.</p>

    <p>Either commit to doing Scrum properly—all of it, even the uncomfortable parts—or admit you\'re doing something else and optimize for that instead.</p>

    <p>Because the worst place to be is the middle: all the ceremony of Scrum with none of the agility. That\'s not agile. That\'s just exhausting.</p>

    <p><strong>So the next time you hear "We\'re doing Scrum, but..."—stop.</strong> Ask why. Question the assumption. Challenge the compromise.</p>

    <p>Your team will thank you for it.</p>


</div>

<script>
    const theme = localStorage.getItem(\'theme\');
    const htmlElement = document.documentElement;

    if(theme === \'dark\') {
        htmlElement.setAttribute(\'data-bs-theme\', \'dark\');
    } else {
        htmlElement.setAttribute(\'data-bs-theme\', \'light\');
    }
</script>',
                'post_slug' => 'scrumbut-dangerous-phrase-killing-agility',
                'photo' => 'blogpostimage_scrumbut.png',
                'post_tags' => 'scrum, agile, project management, scrumbut, team dynamics, leadership, sprint planning, retrospectives',
                'approved' => 1,
                'created_at' => '2025-11-04 11:58:03',
                'updated_at' => '2025-11-04 11:58:03',
            ],

            [
                'user_id' => 1,
                'post_title' => 'SAFe, the Antichrist of Agility?',
                'post_description' => '
<style>
/* Light mode (default) */
.blog-content {
    --text-primary: #333333;
    --text-secondary: #555555;
    --heading-color: #2c3e50;
    --accent-color: #3498db;
    --accent-hover: #2980b9;
    --quote-bg: #ecf0f1;
    --quote-text: #2c3e50;
    --resources-bg: #e8f4f8;
}
/* Dark mode */
[data-bs-theme="dark"] .blog-content {
    --text-primary: #f5f5f5;
    --text-secondary: #e8e8e8;
    --heading-color: #bbdefb;
    --accent-color: #90caf9;
    --accent-hover: #bbdefb;
    --quote-bg: #1a1a1a;
    --quote-text: #f5f5f5;
    --resources-bg: #1a2a3a;
}
.blog-content {
    line-height: 1.7;
    color: var(--text-primary);
}
.blog-content h3 {
    color: var(--heading-color);
    font-size: 1.8em;
    margin-top: 40px;
    margin-bottom: 20px;
    border-left: 5px solid var(--accent-color);
    padding-left: 15px;
}
.blog-content p {
    margin-bottom: 20px;
    font-size: 1.1em;
}
.blog-content p:first-of-type {
    font-size: 1.3em;
    color: var(--text-secondary);
    font-weight: 500;
}
.blog-content strong {
    color: var(--heading-color);
    font-weight: 600;
}
.blog-content .image-container {
    text-align: center;
    margin: 30px 0;
}
.blog-content .blog-image {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 30px auto;
    border-radius: 8px;
}
</style>

<div class="blog-content">

<p><em>“Since evil is specially characterized by its diffusion, and attains its greatest height when it simulates the appearance of the good…”</em><br>
— Origen, on recognizing the Antichrist</p>

<p>Origen wasn’t talking about enterprise Agile frameworks—yet his words feel eerily relevant when looking at the Scaled Agile Framework for Enterprise (SAFe). SAFe presents itself as the path to alignment, clarity, and true business agility. It looks good. It sounds good. It promises miracles.</p>

<p>And yet, once implemented at scale, it often <strong>diffuses dysfunction</strong> instead of curing it.</p>

<p>Since its introduction in 2011, SAFe has exploded in popularity—hundreds of thousands certified, countless enterprises adopting it. If you work in product, design, or engineering, you will likely encounter SAFe at some point. And if you do, it’s worth asking: <strong>Does this framework generate agility, or does it simulate the appearance of agility while reinforcing the exact opposite?</strong></p>

<p>My view: <strong>SAFe is unsafe—especially when foundational Scrum isn’t healthy.</strong></p>

<h3>SAFe Fails Because It Scales What Already Isn’t Working</h3>

<p>Here’s the central premise:</p>

<p><strong>If basic Scrum isn’t functioning, scaling Scrum will amplify the dysfunction.</strong></p>

<p>Trying to “fix” weak Scrum by layering SAFe on top is like trying to stabilize a shaky table by attaching a second, larger shaky table underneath.</p>

<p>Before we talk about Portfolio Epics, Agile Release Trains, or multiple levels of planning hierarchy, we need to address the real root cause:</p>

<p><strong>Most organizations never achieve working Scrum in the first place.</strong></p>

<p>Below are the seven most common Scrum dysfunctions. If any of these exist, SAFe doesn’t fix them.<br>
<strong>It institutionalizes them.</strong></p>

<h3>1. Undone Scrum</h3>
<p>Teams that can’t deliver a “Done” increment each Sprint can’t inspect and adapt meaningfully. SAFe assumes reliable two-week increments, but if you can’t finish work in two weeks, planning ten-week increments (PIs) is pure theatre.</p>
<p><strong>Scaled effect:</strong> Undone work gets buried under layers of trains, dependencies, and PI plans.</p>

<h3>2. Mechanical (Zombie) Scrum</h3>
<p>Events occur but without intention or empiricism. SAFe adds more ceremonies and governance, but without a heartbeat of continuous improvement they just become more motions to go through.</p>

<h3>3. Dogmatic Scrum</h3>
<p>Scrum experts enforcing “best practices” kill team self-organization. SAFe, being prescriptive at scale, becomes dogma with job titles.</p>

<h3>4. One-Size-Fits-All Scrum</h3>
<p>Scrum is intentionally lightweight so teams can shape their own ways of working. SAFe standardizes practices across dozens or hundreds of teams.</p>

<h3>5. Water-Scrum-Fall</h3>
<p>Micro-waterfall within Sprints or “Sprint execution” surrounded by big upfront planning. SAFe’s PI Planning can easily bring back waterfall—just with sticky notes.</p>

<h3>6. Good Enough Scrum</h3>
<p>Teams get some efficiency while tolerating major impediments. SAFe bakes these organizational impediments into its governance model.</p>

<h3>7. Snowflake Scrum</h3>
<p>Teams believe they’re unique and distort Scrum to hide problems. SAFe offers an even bigger environment to hide dysfunction under “alignment.”</p>

<h3>SAFe’s Top-Down Control: A Familiar Smell from PRINCE2 Agile</h3>

<p>Some argue that SAFe’s top-down control is similar to PRINCE2 Agile, and they’re right—and this isn’t always bad. When Scrum teams lack a strong, empowered Product Owner, the team is effectively rudderless. Scrum doesn’t fail for lack of mechanics; it fails because:</p>

<ul>
    <li>The Product Owner isn’t making decisions</li>
    <li>Backlog items aren’t shaped or prioritized</li>
    <li>Vision isn’t communicated</li>
    <li>No one owns value</li>
</ul>

<p>Scrum’s design is explicit:</p>

<p><strong>The Product Owner should place Epics and Stories onto the backlog, prioritize them, and provide leadership. The team selects work based on that prioritization.</strong></p>

<p>When the Product Owner is weak, disengaged, or stripped of authority, the whole system collapses.</p>

<p>SAFe attempts to solve this through structure—Portfolio, Product Managers, System Architects, Release Train Engineers—but structure doesn’t create leadership. What often happens is dilution: decision-making is spread across multiple roles, and no one is truly accountable for the product.</p>

<p>This mirrors PRINCE2 and PRINCE2 Agile where the Project Board Executive is effectively the Product Owner. If that leader is weak, indecisive, or politically constrained, the entire governance system collapses, regardless of how well-documented the framework is.</p>

<p><strong>And this is the uncomfortable truth:</strong><br>
A weak Product Owner in Scrum almost always becomes a weak Product Owner in SAFe.<br>
SAFe cannot manufacture courage, clarity, or accountability.<br>
It can only scale whatever you already have—good or bad.</p>

<h3>SAFe Doesn’t Remove Root Causes — It Scales Them</h3>

<p>Applying the classic 5 Whys, almost every release delay or dysfunction eventually traces back to:</p>

<ul>
    <li>Backlog items are too large</li>
    <li>Work isn’t broken down early enough</li>
    <li>Progress isn’t transparent</li>
    <li>Silos persist</li>
    <li>Risks aren’t surfaced early</li>
    <li>Team collaboration is weak</li>
    <li>Ownership is unclear</li>
</ul>

<p>SAFe does not remove any of these conditions. It just adds dependencies, roles, and ceremonies that make the symptoms harder to see.</p>

<h3>So… When Is SAFe Safe?</h3>

<p>Only when:</p>

<ul>
    <li>Teams deliver “Done” increments every Sprint</li>
    <li>The Product Owner is strong, empowered, and accountable</li>
    <li>Scrum is practiced with intention, not mechanics</li>
    <li>Dependencies are shrinking, not growing</li>
    <li>Leadership understands empiricism and trusts teams</li>
</ul>

<p><strong>In short: SAFe only works when you already don’t really need SAFe.</strong></p>

<h3>Conclusion</h3>

<p>Scaling agility is possible—but only when the basics are strong. Healthy Scrum teams with clear ownership, transparency, and courage can scale. Dysfunctional teams cannot.</p>

<p>Origen warned that the greatest dangers appear when evil imitates the good. SAFe often looks like agility, sounds like agility, brands itself as agility… but without healthy Scrum beneath it, it becomes bureaucracy with a new coat of paint.</p>

<p><strong>If Scrum is weak, SAFe will be unsafe.</strong></p>

</div>

<script>
const theme = localStorage.getItem(\'theme\');
const htmlElement = document.documentElement;
htmlElement.setAttribute(\'data-bs-theme\', theme === \'dark\' ? \'dark\' : \'light\');
</script>
',
                'post_slug' => 'safe-antichrist-of-agility',
                'photo' => 'blogpostimage_devil.gif',
                'post_tags' => 'agile, scrum, safe, prince2, product ownership, scaling agile, organisational design, leadership, dysfunctions',
                'approved' => 1,
                'created_at' => '2025-11-29 09:00:00',
                'updated_at' => '2025-11-29 09:00:00',
            ],

            [
                'user_id' => 1,
                'post_title' => 'Taking Your AI for Dog Training',
                'post_description' => '<style> /* Light mode (default) */ .blog-content { --text-primary: #333333; --text-secondary: #555555; --heading-color: #2c3e50; --accent-color: #3498db; --accent-hover: #2980b9; --quote-bg: #ecf0f1; --quote-text: #2c3e50; --resources-bg: #e8f4f8; } /* Dark mode */ [data-bs-theme="dark"] .blog-content { --text-primary: #f5f5f5; --text-secondary: #e8e8e8; --heading-color: #bbdefb; --accent-color: #90caf9; --accent-hover: #bbdefb; --quote-bg: #1a1a1a; --quote-text: #f5f5f5; --resources-bg: #1a2a3a; } .blog-content { line-height: 1.7; color: var(--text-primary); } .blog-content h3 { color: var(--heading-color); font-size: 1.8em; margin-top: 40px; margin-bottom: 20px; border-left: 5px solid var(--accent-color); padding-left: 15px; } .blog-content p { margin-bottom: 20px; font-size: 1.1em; } .blog-content p:first-of-type { font-size: 1.3em; color: var(--text-secondary); font-weight: 500; } .blog-content strong { color: var(--heading-color); font-weight: 600; } .blog-content .image-container { text-align: center; margin: 30px 0; } .blog-content .blog-image { max-width: 100%; height: auto; display: block; margin: 30px auto; border-radius: 8px; } </style> <div class="blog-content"> <p>People love calling AI a “co-pilot” or an “assistant.” Let’s be honest — here in 2025, that’s generous.</p> <p>AI is still a two-year-old dog.</p> <p>Brilliant? Yes. Full of potential? Absolutely. But also stubborn, overconfident, distractible, and very capable of dragging you straight through a metaphorical hedge <strong>if you keep holding the leash when it decides to bolt</strong>.</p> <p>Yet, when you work with it properly, that energetic two-year-old becomes one of the most powerful development partners you’ll ever have.</p> <h3>1. First Step: Put the Dog on a Leash (a.k.a. Bash)</h3> <p>Think of your codebase like a Greek phalanx. Or a Roman formation. Or — fine — a well-trained dog on a leash.</p> <div class="image-container"> <img src="/storage/images/blogpostimage_hoplites.jpg" alt="The Greek Phalanx" class="blog-image"> </div> <p>When everything moves together, it’s strong, disciplined, efficient, and reliable. But if the unit — or the dog — suddenly charges off in its own direction, the whole structure starts to wobble.</p><p>While we are on the subject of control here is another analogy to keep in mind.  If you are a pilot of an airplane, no matter how sophisticated the aricraft is, always remember that you fly the plane. The plane must never fly you! Yes I am aware of automation and most planes are being flown by autopilot to some degree.  However, and this is very important, you fly the plane, it does not and must not ever fly you!  A professional pilot, who knows this, will always have a way to take back control if the plane is behaving in a manner that will threaten his life, the lives of his passengers and crew, his cargo or the lives of others on the ground.</p><div class="image-container"><img src="/storage/images/blogpostimage_pilot.jpg" alt="The pilot is in charge not the plane" class="blog-image"></div><p>So before I let AI anywhere near my project, I back up, tag a stable version, basically wrap everything in version-controlled bubble wrap… and then I open the most important tool in the entire process:</p> <p><strong>Git Bash (Windows) or Bash (Linux).</strong></p> <p>This is the leash.</p> <p>Bash is predictable, structured, and immune to hallucinations — the world’s strictest obedience instructor. AI can suggest whatever it wants, but nothing happens until Bash approves. That keeps the AI walking beside me instead of sprinting off to chase imaginary squirrels in my code.</p> <h3>2. The Training Routine: Step, Command, Check, Repeat</h3> <p>A typical session goes like this:</p> <p><em>AI:</em> “Run this command in Git Bash.” <br><em>Me:</em> Runs it. <br><em>Bash:</em> Outputs cold, unemotional truth. <br><em>Me:</em> “Okay AI, here’s what happened.” <br><em>AI:</em> Refines the plan.</p> <p>It’s basically:</p> <p>“Heel.” <br>“Sit.” <br>“No, not that direction.” <br>“Good dog.”</p> <p>If the AI pulls too hard?</p> <p>I revert and say: <strong>“Back to the training line.”</strong></p> <p>Git resets instantly. Bash keeps the ground firm. AI keeps things… interesting.</p> <h3>3. Example: A 6-Month Project Done in 3 Weeks</h3> <p>I planned six months to rebuild my entire site in Laravel 12 with Livewire.</p> <p>With AI — on a Bash leash?</p> <p><strong>Three weeks.</strong></p> <p>Bash kept everything safe and incremental. AI handled the grunt work:</p> <ul> <li>Full style guide in under an hour</li> <li>Complete light + dark mode in a few hours</li> <li>Tailwind architecture structured cleanly</li> <li>Components built faster and cleaner than ever</li> </ul> <p>A two-year-old dog with proper training? Shockingly fast.</p> <h3>4. Last Night’s Walk: Reverb Installed in 3 Hours</h3> <p>I had to remove Pusher and install Reverb. I had no idea where to start.</p> <p>So I turned it into a dog-training session:</p> <p><em>Me:</em> “Give me a solution that does X, Y, Z. We’ll run everything through Bash.” <br><em>AI:</em> “Run this command.” <br><em>Me:</em> Bash → paste → report. <br><em>AI:</em> “Great, next one.” <br><em>Me:</em> Bash → paste → report. <br><em>AI:</em> “Actually, revert that.” <br><em>Me:</em> Deep sigh. Tightens leash.</p> <p>A small example of the back-and-forth:</p> <div class="image-container"> <img src="/storage/images/blogpostimage_bash.png" alt="Iteration via bash" class="blog-image"> </div> <p>Three hours later, Reverb was running in both dev and production.</p> <p>Why so smooth?</p> <p>Bash gave structure. AI gave the steps. I provided the patience.</p> <h3>5. Burnout: When the Dog Still Has Energy and You Don’t</h3> <p>Plenty of developers say they’re exhausted by AI. Some are taking “AI detox months.” And honestly? I get it.</p> <p>A two-year-old dog can go all day. AI is the same — endless enthusiasm, zero concept of fatigue.</p> <p>You, however, are human.</p> <p>When your brain is mush, even Bash output looks like alien hieroglyphs. That’s when the AI-dog drags you through the mental bushes.</p> <p>Solution?</p> <ul> <li>Step away</li> <li>Hydrate</li> <li>Take a break</li> <li>Reset your nerves</li> </ul> <p>Calcium + magnesium works wonders for me — like putting a padded harness on your nervous system.</p> <p>And sometimes the best fix is the simplest: code slowly and quietly by yourself. Leave the AI-dog at home and enjoy a peaceful walk.</p> <h3>6. Clear Commands = Good Behaviour</h3> <p>AI is a Large Language Model. Meaning: it hears words, not nuance.</p> <p>Tell a two-year-old dog:</p> <p>“Whatever you do, don’t jump in that muddy puddle.”</p> <p>You already know what happens.</p> <p>Tell AI:</p> <p>“Don’t delete anything important.”</p> <p>It somehow hears:</p> <p>“delete anything important??”</p> <p>Type “do NOT press the red button” and it highlights “press red button” like it’s the main quest objective.</p> <p>That’s where Bash saves the day.</p> <p>Bash only executes clear, explicit instructions.</p> <p>Clear commands. Controlled execution. Predictable behaviour.</p> <h3>Conclusion: Know Your Role</h3> <p>You are the trainer — or the phalanx commander, if you want to stay historical.</p> <p>AI wants to race ahead, improvise, and “help” by doing twelve extra things you never requested.</p> <p>Bash anchors the process:</p> <ul> <li>One command at a time</li> <li>One output at a time</li> <li>One correction at a time</li> </ul> <p>You guide. You pace. You prevent chaos.</p> <p>AI is the enthusiastic two-year-old dog. Bash is the leash. And you? You’re the trainer who makes the entire walk possible.</p> <p>Master this trio, and your development speed will surprise you.</p> </div>

<script>
    const theme = localStorage.getItem(\'theme\');
    const htmlElement = document.documentElement;
    htmlElement.setAttribute(\'data-bs-theme\', theme === \'dark\' ? \'dark\' : \'light\');
</script>',
                'post_slug' => 'taking-ai-for-dog-training',
                'photo' => 'blogpostimage_aidogtraining.png',
                'post_tags' => 'ai, development workflow, git bash, productivity, laravel, livewire, reverb, coding tools, humour',
                'approved' => 1,
                'created_at' => '2025-11-17 07:30:00',
                'updated_at' => '2025-11-17 07:30:00',
            ],

            [

                'user_id' => 1,
                'post_title' => 'Undone or Zombie Scrum and 6 other horrors',
                'post_description' => '<style>
    /* Light mode (default) */
    .blog-content {
        --text-primary: #333333;
        --text-secondary: #555555;
        --heading-color: #2c3e50;
        --accent-color: #3498db;
        --accent-hover: #2980b9;
        --quote-bg: #ecf0f1;
        --quote-text: #2c3e50;
        --resources-bg: #e8f4f8;
    }

    /* Dark mode */
    [data-bs-theme="dark"] .blog-content {
        --text-primary: #f5f5f5;
        --text-secondary: #e8e8e8;
        --heading-color: #bbdefb;
        --accent-color: #90caf9;
        --accent-hover: #bbdefb;
        --quote-bg: #1a1a1a;
        --quote-text: #f5f5f5;
        --resources-bg: #1a2a3a;
    }

    .blog-content {
        line-height: 1.7;
        color: var(--text-primary);
    }

    .blog-content h3 {
        color: var(--heading-color);
        font-size: 1.8em;
        margin-top: 40px;
        margin-bottom: 20px;
        border-left: 5px solid var(--accent-color);
        padding-left: 15px;
    }

    .blog-content p {
        margin-bottom: 20px;
        font-size: 1.1em;
        color: var(--text-primary);
    }

    .blog-content p:first-of-type {
        font-size: 1.3em;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .blog-content strong {
        color: var(--heading-color);
        font-weight: 600;
    }

    .blog-content em {
        color: var(--text-secondary);
        font-style: italic;
    }

    .blog-content .quote-block {
        background-color: var(--quote-bg);
        border-left: 5px solid var(--accent-color);
        padding: 25px 30px;
        margin: 30px 0;
        font-size: 1.15em;
        font-style: italic;
        color: var(--quote-text);
    }

    .blog-content .quote-block strong {
        display: block;
        margin-bottom: 15px;
        font-size: 1.1em;
        color: var(--heading-color);
    }

    .blog-content .divider {
        border: 0;
        height: 2px;
        background: linear-gradient(to right, transparent, var(--accent-color), transparent);
        margin: 40px 0;
    }

    .blog-content .resources {
        background-color: var(--resources-bg);
        padding: 25px;
        border-radius: 5px;
        margin-top: 40px;
    }

    .blog-content .resources h3 {
        margin-top: 0;
        border-left: none;
        padding-left: 0;
    }

    .blog-content .resources ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .blog-content .resources li {
        margin-bottom: 10px;
    }

    .blog-content .resources a {
        color: var(--accent-color);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .blog-content .resources a:hover {
        color: var(--accent-hover);
        text-decoration: underline;
    }

    .blog-content .blog-image {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 30px auto;
        border-radius: 8px;
    }

    .blog-content .image-container {
        text-align: center;
        margin: 30px 0;
    }

    .blog-content ul.scrum-horrors-list {
        list-style: none;
        margin-left: 0;
        color: var(--text-primary);
    }

    .blog-content ul.scrum-horrors-list li {
        margin-bottom: 25px;
        font-size: 1.1em;
        padding-left: 30px;
        position: relative;
    }

    .blog-content ul.scrum-horrors-list li:before {
        content: "👻";
        position: absolute;
        left: 0;
        font-size: 1.2em;
    }

    @media (max-width: 768px) {
        .blog-content h3 {
            font-size: 1.5em;
        }

        .blog-content .blog-image {
            margin: 20px auto;
        }
    }
</style>

<div class="blog-content">
    <p>Your Scrum team might look alive, but deep down, it could be a zombie. Or worse—it might be suffering from one of these seven Scrum dysfunctions that turn agile dreams into nightmares.</p>

    <p>You know the signs: the daily standups feel like seances, the retrospectives are ghost towns, and your "sprints" move at a snail\'s pace. But fear not! We\'re here to shine a light on the seven Scrum horrors haunting your team.</p>

    <div class="image-container">
        <img src="/storage/images/blogpostnew_zombie.jpg" alt="Zombie Scrum - when Scrum goes undead" class="blog-image">
    </div>

    <h3>The 7 Scrum Nightmares (and How to Exorcise Them)</h3>

    <ul class="scrum-horrors-list">
        <li><strong>Undone Scrum:</strong> The "Done" Increment that\'s never actually done. It\'s like baking a cake but forgetting the oven—you\'ve got all the ingredients but nothing edible to show for it.</li>

        <li><strong>Zombie Scrum:</strong> Teams going through the motions without any life or passion. They attend ceremonies but their brains are elsewhere. "Brains... I mean, user stories..."</li>

        <li><strong>Dogmatic Scrum:</strong> When "Scrum experts" insist their way is the only way. It\'s Scrum by dictatorship, where experimentation goes to die.</li>

        <li><strong>One-Size-Fits-All Scrum:</strong> The organizational straightjacket that forces every team into the same process. Because clearly, the marketing team and the engineering team have identical needs, right?</li>

        <li><strong>Water-Scrum-Fall:</strong> The Frankenstein\'s monster of methodologies. All the overhead of waterfall with just enough Scrum to confuse everyone.</li>

        <li><strong>Good Enough Scrum:</strong> When "that\'s how we\'ve always done it" becomes the team mantra. Continuous improvement? More like continuous napping.</li>

        <li><strong>Snowflake Scrum:</strong> The "we\'re special" syndrome where teams modify Scrum beyond recognition, then wonder why it doesn\'t work.</li>
    </ul>

    <h3>Why These Horrors Haunt Your Team</h3>

    <p>These dysfunctions don\'t appear out of thin air. They\'re usually symptoms of deeper issues:</p>

    <p><strong>Pressure to deliver</strong> turns Undone Scrum into a recurring nightmare. <strong>Lack of understanding</strong> creates Zombie teams. <strong>Control issues</strong> breed Dogmatic and One-Size-Fits-All approaches.</p>

    <div class="quote-block">
        <strong>The good news?</strong> None of these are permanent conditions. With the right approach, you can turn your Scrum horror story into a success story.
    </div>

    <h3>Simple Fixes for Scrum Nightmares</h3>

    <p><strong>For Undone Scrum:</strong> Start smaller. If you can\'t get to "Done" in a sprint, your slices are too big. Think appetizers, not full-course meals.</p>

    <p><strong>For Zombie Scrum:</strong> Bring back the passion! Retrospectives should be about real change, not just going through motions. Add some energy—maybe even donuts.</p>

    <p><strong>For Dogmatic Scrum:</strong> Remember Scrum is a framework, not a religion. The best practice is what works for your team right now.</p>

    <p><strong>For One-Size-Fits-All:</strong> Trust your teams to figure out their own processes within Scrum\'s guardrails.</p>

    <p><strong>For Water-Scrum-Fall:</strong> Actually aim for releasable increments every sprint. Revolutionary, we know.</p>

    <p><strong>For Good Enough Scrum:</strong> Challenge the status quo. What if "good enough" isn\'t actually good enough?</p>

    <p><strong>For Snowflake Scrum:</strong> Either commit to proper Scrum or admit you\'re doing something else. No shame in that!</p>

    <h3>The Real Horror Story</h3>

    <p>The scariest part? Most teams don\'t realize they\'re suffering from these dysfunctions. They think "this is just how Scrum works" when actually, they\'re experiencing ScrumBut in its various monstrous forms.</p>

    <p>Your team might be going through the motions, delivering "sort of done" increments, and wondering why Scrum isn\'t delivering the promised benefits. The horror! The horror!</p>

    <div class="quote-block">
        <strong>Remember:</strong> Scrum is meant to expose problems, not hide them. If your process feels comfortable all the time, you\'re probably doing it wrong.
    </div>

    <h3>Time for an Exorcism?</h3>

    <p>If you recognize any of these horrors in your team, don\'t panic! The first step is awareness. The second is action.</p>

    <p>Start with one dysfunction. Pick the one causing the most pain. Run small experiments. Measure results. Rinse and repeat.</p>

    <p>Your Scrum practice doesn\'t have to be a horror story. With some courage and persistence, you can turn those zombies back into living, breathing, high-performing team members.</p>

    <div class="resources">
        <h3>Want to Dig Deeper?</h3>
        <p>For more detailed analysis and root cause solutions for these Scrum dysfunctions, check out our comprehensive guide:</p>
        <ul>
            <li><a href="/scrumfix">Scrum Root Cause Analysis - Fixing What\'s Really Broken</a></li>
        </ul>
    </div>

    <p><strong>Sweet dreams and happy Scrumming!</strong> May your sprints be zombie-free and your increments truly "Done."</p>
</div>

<script>
    const theme = localStorage.getItem(\'theme\');
    const htmlElement = document.documentElement;

    if(theme === \'dark\') {
        htmlElement.setAttribute(\'data-bs-theme\', \'dark\');
    } else {
        htmlElement.setAttribute(\'data-bs-theme\', \'light\');
    }
</script>',
                'post_slug' => 'undone-zombie-scrum-6-other-horrors',
                'photo' => 'blogpostnew_zombie.jpg',
                'post_tags' => 'scrum, agile, zombie scrum, undone scrum, scrum dysfunctions, team improvement, agile coaching, project management',
                'approved' => 1,
                'created_at' => '2025-11-18 10:17:00',
                'updated_at' => '2025-11-18 10:17:00',
            ],
            [
                'user_id' => 1,
                'post_title' => 'Quality Gates in Waterfall and Agile',
                'post_slug' => 'quality-gates-in-waterfall-and-agile',
                'photo' => 'blogpostimage_nohands.png',
                'post_tags' => 'quality, gates, agile, scrum, pmbok, pmo, project',
                'approved' => 1,
                'post_description' => '<style>
    /* Light mode (default) */
    .blog-content {
        --text-primary: #333333;
        --text-secondary: #555555;
        --heading-color: #2c3e50;
        --accent-color: #3498db;
        --accent-hover: #2980b9;
        --quote-bg: #ecf0f1;
        --quote-text: #2c3e50;
        --resources-bg: #e8f4f8;
    }

    /* Dark mode */
    [data-bs-theme="dark"] .blog-content {
        --text-primary: #f5f5f5;
        --text-secondary: #e8e8e8;
        --heading-color: #bbdefb;
        --accent-color: #90caf9;
        --accent-hover: #bbdefb;
        --quote-bg: #1a1a1a;
        --quote-text: #f5f5f5;
        --resources-bg: #1a2a3a;
    }

    .blog-content {
        line-height: 1.7;
        color: var(--text-primary);
    }

    .blog-content h3 {
        color: var(--heading-color);
        font-size: 1.8em;
        margin-top: 40px;
        margin-bottom: 20px;
        border-left: 5px solid var(--accent-color);
        padding-left: 15px;
    }

    .blog-content p {
        margin-bottom: 20px;
        font-size: 1.1em;
        color: var(--text-primary);
    }

    .blog-content p:first-of-type {
        font-size: 1.3em;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .blog-content strong {
        color: var(--heading-color);
        font-weight: 600;
    }

    .blog-content em {
        color: var(--text-secondary);
        font-style: italic;
    }

    .blog-content .quote-block {
        background-color: var(--quote-bg);
        border-left: 5px solid var(--accent-color);
        padding: 25px 30px;
        margin: 30px 0;
        font-size: 1.15em;
        font-style: italic;
        color: var(--quote-text);
    }

    .blog-content .divider {
        border: 0;
        height: 2px;
        background: linear-gradient(to right, transparent, var(--accent-color), transparent);
        margin: 40px 0;
    }

    .blog-content .resources {
        background-color: var(--resources-bg);
        padding: 25px;
        border-radius: 5px;
        margin-top: 40px;
    }

    .blog-content .blog-image {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 30px auto;
        border-radius: 8px;
    }
</style>

<div class="blog-content">

<p>In high-volume project environments, quality gates are essential for keeping delivery consistent, controlled, and compliant. When I led a government PMO managing more than 300 projects a year with over 40 project managers, our Microsoft Project Server–based PMIS depended on well-defined gates to ensure that no project moved forward without meeting the required standards. What many teams miss is that quality gates aren\'t just for predictive or Waterfall projects — Agile frameworks like Scrum rely on them too.</p>

<h3>Quality Gates in Predictive Delivery</h3>
    <div class="image-container">
        <img src="/storage/images/blogpostimage_gate.jpg" alt="The cost of cutting corners in Scrum" class="blog-image">
    </div>

<p>Each PMBOK&reg; Guide process group had a mandatory gate before work could progress.</p>

<p><strong>Initiating Gate:</strong> A project could not move into planning until the Project Charter was formally approved and the Stakeholder Register was completed, including RACI assignments. Once validated, these documents were secured in SharePoint under PMO control.</p>

<p><strong>Planning Gate:</strong> The Planning phase required a complete, integrated project plan — schedule, scope baseline, cost estimates, risk plan, and communication plan. Only after PMO approval could execution begin.</p>

<p><strong>Change Control Gate:</strong> No change was allowed without documentation, impact analysis, and formal approval through the PMO or Change Control Board.</p>

<p><strong>Closing Gate:</strong> A project couldn\'t close without accepted deliverables, archived documentation, and completed lessons learned.</p>

<h3>Agile Needs Gates Too</h3>
 <div class="image-container">
        <img src="/storage/images/blogpostimage_kissinggate.jpg" alt="The cost of cutting corners in Scrum" class="blog-image">
    </div>

<p>There\'s a common misconception that Agile, especially Scrum, operates without gates. In reality, Scrum contains frequent, lightweight, and enforceable gates that ensure discipline, prevent rework, and maintain flow.</p>

<p><strong>Sprint Entry Gate (Definition of Ready):</strong> Before a sprint begins, backlog items must pass a readiness check. Items must have clear acceptance criteria, estimated effort, and alignment with the Sprint Goal. If an item isn\'t ready, it does not enter the sprint — this is a gate.</p>

<p><strong>Sprint Exit Gate (Definition of Done):</strong> A sprint cannot close until the increment meets the Definition of Done. This gate enforces quality, completeness, and adherence to standards while preventing hidden technical debt.</p>

<p><strong>Demonstration & Acceptance Gate:</strong> During the Sprint Review, completed work must be demonstrated and accepted. Anything that fails acceptance does not enter the increment — another gate.</p>

<p><strong>Value Release Gate:</strong> Even after acceptance, releasing value requires checks such as compliance validation, stability verification, and governance approvals. This ensures the product increment is safe and ready for real-world use.</p>

<h3>Why Gates Matter in Both Approaches</h3>

<p>Whether your organization follows predictive, Agile, or hybrid methods, quality gates provide:</p>

<p>- Clarity and alignment<br>
- Governance and regulatory compliance<br>
- Reduced rework and operational risk<br>
- Controlled flow of project work<br>
- Transparent approval and accountability</p>

<p>Gates aren\'t bureaucratic obstacles — they are structural guardrails that allow teams to move fast while maintaining quality. Agile simply places these gates in shorter cycles, improving responsiveness and feedback without losing the discipline that successful delivery requires.</p>

<h3>Conclusion</h3>

<p>Quality gates ensure projects, whether Waterfall or Agile, progress with confidence and control. When implemented well, they strengthen governance, improve predictability, and enable teams to deliver value safely and consistently.</p>

</div>

<script>
    const theme = localStorage.getItem(\'theme\');
    const htmlElement = document.documentElement;
    if(theme === \'dark\') {
        htmlElement.setAttribute(\'data-bs-theme\', \'dark\');
    } else {
        htmlElement.setAttribute(\'data-bs-theme\', \'light\');
    }
</script>',
                'created_at' => '2025-12-01 08:47:55',
                'updated_at' => '2025-12-01 08:47:55',
            ],
            [
                'user_id' => 2,
                'post_title' => 'Beware of Prejudice: Why PRINCE2 Agile Is the Fighter Jet of Modern Delivery',
                'post_slug' => 'prince2-agile-fighter-jet-metaphor',
                'photo' => 'blogpostimage_fighterjet.jpg',
                'post_tags' => 'prince2 agile, scrum, governance, project management, fighter jet metaphor, agility, control',
                'approved' => 1,
                'post_description' => '<style>
    /* Light mode (default) */
    .blog-content {
        --text-primary: #333333;
        --text-secondary: #555555;
        --heading-color: #2c3e50;
        --accent-color: #3498db;
        --accent-hover: #2980b9;
        --quote-bg: #ecf0f1;
        --quote-text: #2c3e50;
        --resources-bg: #e8f4f8;
    }

    /* Dark mode */
    [data-bs-theme="dark"] .blog-content {
        --text-primary: #f5f5f5;
        --text-secondary: #e8e8e8;
        --heading-color: #bbdefb;
        --accent-color: #90caf9;
        --accent-hover: #bbdefb;
        --quote-bg: #1a1a1a;
        --quote-text: #f5f5f5;
        --resources-bg: #1a2a3a;
    }

    .blog-content {
        line-height: 1.7;
        color: var(--text-primary);
    }

    .blog-content h3 {
        color: var(--heading-color);
        font-size: 1.8em;
        margin-top: 40px;
        margin-bottom: 20px;
        border-left: 5px solid var(--accent-color);
        padding-left: 15px;
    }

    .blog-content p {
        margin-bottom: 20px;
        font-size: 1.1em;
        color: var(--text-primary);
    }

    .blog-content p:first-of-type {
        font-size: 1.3em;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .blog-content strong {
        color: var(--heading-color);
        font-weight: 600;
    }

    .blog-content em {
        color: var(--text-secondary);
        font-style: italic;
    }

    .blog-content .quote-block {
        background-color: var(--quote-bg);
        border-left: 5px solid var(--accent-color);
        padding: 25px 30px;
        margin: 30px 0;
        font-size: 1.15em;
        font-style: italic;
        color: var(--quote-text);
    }

    .blog-content .divider {
        border: 0;
        height: 2px;
        background: linear-gradient(to right, transparent, var(--accent-color), transparent);
        margin: 40px 0;
    }

    .blog-content .resources {
        background-color: var(--resources-bg);
        padding: 25px;
        border-radius: 5px;
        margin-top: 40px;
    }

    .blog-content .blog-image {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 30px auto;
        border-radius: 8px;
    }
</style>

<div class=\"blog-content\">

<p>PRINCE2 Agile&reg; warns us to "Beware of Prejudice" &mdash; the false belief that governance and agility oppose each other. The truth is the opposite: <strong>agility thrives because of control</strong>, not in the absence of it. This is the lesson behind PRINCE2 Agile\'s iconic fighter jet metaphor.</p>

<h3>The Fighter Jet: Deliberately Agile, Deliberately Controlled</h3>

<p>A fighter jet is intentionally unstable to achieve agility. It can turn sharply, respond instantly, and adapt continuously. But instability alone is unflyable without:</p>

<p>- a stable engine platform<br>
- advanced control systems<br>
- robust electronic flight management<br>
- a disciplined pilot<br>
- a mission-directed command structure</p>

<p><strong>Agility requires governance.</strong><br>
<strong>Speed requires structure.</strong><br>
<strong>Responsiveness requires boundaries.</strong></p>

<p>PRINCE2 Agile applies these same principles to project delivery.</p>

<h3>Scrum Without Control Becomes "Loose and Floppy"</h3>

<p>Scrum is powerful, but its lightweight nature makes it easy to misuse. Many teams drift into what can only be described as <strong>loose, floppy Scrum</strong>:</p>

<p>- ceremonies skipped or performed mechanically<br>
- retrospectives losing meaning<br>
- sprint reviews becoming unsatisfactory "demo theatre"<br>
- weak or absent Product Owners<br>
- a misunderstanding of self-organisation<br>
- bloated, unrefined backlogs<br>
- half-done work piling up<br>
- sprints that don&apos;t deliver a Done increment</p>

<p>A sprint without a Done increment is catastrophic.</p>

<h3>Undone Scrum Is Like an Aircraft That Never Lands</h3>

<p>Imagine a jet that takes off, consumes fuel, performs manoeuvres... but never reaches its destination and land successfully. Eventually, gravity wins. The same is true for Scrum teams that never finish sprints.</p>

<p>Undone work leads to:</p>

<p>- rolling over sprint work<br>
- meaningless velocity<br>
- growing technical debt<br>
- frustrated stakeholders<br>
- low morale<br>
- rising risk<br>
- management frustration and eventual intervention</p>

<p>This isn&apos;t agility. It&apos;s uncontrolled directionless motion.</p>

<h3>PRINCE2 Agile: Agility With an Engine Room</h3>

<p>PRINCE2 Agile doesn&apos;t dilute Scrum &mdash; it enables it. It provides the governance structure that keeps teams aligned and predictable:</p>

<p>- Project Board oversight<br>
- Executive accountability<br>
- Clear tolerances for self-organisation<br>
- Defined roles and responsibilities<br>
- Expected agile behaviours<br>
- Transparency and flow-based controls<br>
- Quality and Stage Gates</p>

<p>Agile (Think Scrum) are the wings.<br>
PRINCE2 is the fuselage.<br>
Together (Prince2 Agile), they form the fighter jet.</p>

<h3>Scrum Has a Pilot Too &mdash; The Product Owner</h3>

<p>The Product Owner is the pilot of the Scrum team &mdash; choosing direction, managing risk, and making trade-offs. Yet many organisations assign POs who are:</p>

<p>- too busy<br>
- under-empowered<br>
- spread across teams<br>
- unclear on vision<br>
- afraid to say "no"</p>

<p>This is like blindfolding a trainee pilot and expecting clear direction and a safe landing.</p>

<h3>PRINCE2 Agile Ensures the Aircraft Can Land</h3>

<p>Scrum delivers increments. PRINCE2 Agile ensures those increments matter. Governance brings:</p>

<p>- real priorities<br>
- real accountability<br>
- real Done criteria<br>
- managed risks<br>
- predictable flow</p>

<p>Sprints land. Increments (User Stories) accumulate. Projects (Epics) burn down and finish.</p>

<h3>Final Message: If It Doesn&rsquo;t Deliver, It Doesn&rsquo;t Fly</h3>

<p>Agility isn&apos;t measured by ceremonies or motion. It&apos;s measured by <strong>delivery</strong>.</p>

<p>- A sprint that doesn&apos;t deliver is a failed landing.<br>
- A team without governance is a pilot without instruments.<br>
- Scrum without discipline is uncontrolled aerobatics.</p>

<p>PRINCE2 Agile understood this long ago: <strong>agility + governance = true delivery capability</strong>. Together, they create an agile fighter jet that reaches its destination safely, repeatedly, and predictably.</p>

</div>

<script>
    const theme = localStorage.getItem(\'theme\');
    const htmlElement = document.documentElement;
    if(theme === \'dark\') {
        htmlElement.setAttribute(\'data-bs-theme\', \'dark\');
    } else {
        htmlElement.setAttribute(\'data-bs-theme\', \'light\');
    }
</script>',
                'created_at' => '2025-12-02 08:47:55',
                'updated_at' => '2025-12-02 08:47:55',
            ],

        ];

        DB::table('blog_posts')->insert($posts);
    }
}
