@php
    $siteSettings = App\Models\SiteSettings::findOrFail(1);
@endphp
{{-- "Me" Focused Header --}}
<header class="tj-header-area header-absolute">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-wrap align-items-center">
                <div class="logo-box">
                    <a href="/">
                        <img src="{{asset($siteSettings->logo)}}" alt=""/>
                    </a>
                </div>

                <div class="header-info-list d-none d-md-inline-block">
                    <ul class="ul-reset" style="list-style: none; padding: 0; margin: 0;">
                        <li style="display: inline-block;"><a href="/home">Home</a></li>
                    </ul>
                </div>

                <div class="header-menu">
                    <nav>
                        <ul>
                            <li><a href="/cv/index.html">Me</a></li>
                            <li><a href="portfolio">MyPortfolio</a></li>
                            <li><a href="portfolio#services-section">MyServices</a></li>
                            <li><a href="portfolio#resume-section">MyResume</a></li>
                            <li><a href="portfolio#skills-section">MySkills</a></li>
                            <li><a href="portfolio#contact-section">ContactMe</a></li>
                            @auth
                                @if(auth()->user()->hasPermissionTo('mycv noaccess'))
                                    <li><a href="mycv" class="navbar-link pointer-enter"
                                           title="My CV and Credentials Page">CV/Creds/Work/Udemy</a>
                                @endif
                            @endauth
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
