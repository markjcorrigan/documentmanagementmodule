@php
    $siteSettings = App\Models\SiteSettings::findOrFail(1);
@endphp
{{-- Blog/Writing Focused Header --}}
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

                            <li style="display: inline-block;"><li><a href="/blog">Blog</a></li>
                            @auth
                                <li><a href="writestuff">WriteStuff</a></li>
                            @endauth
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>