@php
   $siteSettings = App\Models\SiteSettings::findOrFail(1);
@endphp

<style>
    @media (max-width: 767px) {
        #site-footer .footer-text {
            font-size: 1.2rem !important;
            line-height: 2rem !important;
        }
    }
</style>

<footer id="site-footer" class="py-5" style="background-color: #111827;">
    <div class="container">
        <!-- All Content Centered -->
        <div class="d-flex flex-column align-items-center text-center">

            <!-- Top Text -->
            <div class="mb-4">
                <p class="text-white mb-0">
                    Project &amp; Process Management <span lang="en-za">Best Practice</span><br>
                    at CM Level 2 and above
                </p>
            </div>

            <!-- Image with GIF Hover -->
            <div class="mb-4 w-100 d-flex justify-content-center">
                <a href="/gamestats"  class="d-block" style="max-width: 600px; width: 100%;">
                    <img alt="Up Stat or Down Stat"
                         class="img-fluid w-100 mx-auto"
                         src="/storage/images/devopsimagemedium.png"
                         onmouseover="this.src='/storage/images/devops2.gif'"
                         onmouseout="this.src='/storage/images/devopsimagemedium.png'"
                         title="How are your game stats? Click here for more">
                </a>
            </div>

            <!-- Bottom Text -->
            <div class="mb-4">
                <p class="text-white mb-0">underpinned by ITIL</p>
            </div>

            <!-- Copyright -->
            <div class="mt-5">
                <p class="text-white small mb-0">
                    &copy; 2009 PMWay<br>
                    <span class="text-white-50" style="font-size: 0.875rem;">
                        People Process Technology Governance Execution
                    </span>
                </p>
            </div>

        </div>
    </div>
</footer>


{{--<footer class="tj-footer-area">--}}
{{--    <div class="container">--}}
{{--       <div class="row">--}}
{{--          <div class="col-md-12 text-center">--}}
{{--             <div class="footer-logo-box">--}}
{{--                 <p><img src="{{ asset('storage/' . $siteSettings->logo) }}" alt="Logo" /></p>--}}

{{--             </div>--}}
{{--             <div class="footer-menu">--}}
{{--                <nav>--}}
{{--                   <ul>--}}
{{--                      <li><a href="#services-section">Services</a></li>--}}
{{--                      <li><a href="#works-section">Works</a></li>--}}
{{--                      <li><a href="#resume-section">Resume</a></li>--}}
{{--                      <li><a href="#skills-section">Skills</a></li>--}}
{{--                      <li><a href="#testimonials-section">Testimonials</a></li>--}}
{{--                      <li><a href="#contact-section">Contact</a></li>--}}
{{--                   </ul>--}}
{{--                </nav>--}}
{{--             </div>--}}
{{--             <div class="copy-text">--}}
{{--                <p>&copy; {{ $siteSettings->footer_note }}</p>--}}
{{--             </div>--}}
{{--          </div>--}}
{{--       </div>--}}
{{--    </div>--}}
{{-- </footer>--}}
