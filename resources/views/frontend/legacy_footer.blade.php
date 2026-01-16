<script src="/bootstrapfouroneone/jquery/jquery.js"></script>
<script src="/bootstrapfouroneone/js/bootstrap.js"></script>
<script src="/bootstrapfouroneone/js/popper.min.js"></script>
<script src="/bootstrapfouroneone/jqueryui/jquery-ui.js"></script>


<script src="{{ asset('tinymcefourthirteen/tinymce4/tinymce/tinymce.min.js') }}"></script>
<script>

    tinymce.init({
        selector: "textarea",
        theme: "modern",
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
</script>

<script>
    $(document).ready(function () {
        $('.nav-toggle').click(function () {
            //get collapse content selector
            var collapse_content_selector = $(this).attr('href');
            //make the collapse content to be shown or hide
            var toggle_switch = $(this);
            $(collapse_content_selector).toggle(function () {
                if ($(this).css('display') == 'none') {
                    //change the button label to be 'Show'
                    toggle_switch.html('Show');
                } else {
                    //change the button label to be 'Hide'
                    toggle_switch.html('Hide');
                }
            });
        });
    });
</script>
{{--<script src="{{ asset('bootstrapfourthreeone/js/jquery.js') }}"></script>--}}
{{--<script src="{{ asset('bootstrapfourthreeone/js/bootstrap.js') }}"></script>--}}
{{--<script src="{{ asset('bootstrapfourthreeone/js/popper.min.js') }}"></script>--}}
{{--<script src="{{ asset('bootstrapfourthreeone/js/jquery-ui.js') }}"></script>--}}

<!-- Rest of your code remains the same -->

<footer id="sticky-footer" style="background-color: #111827; padding-top: 20px; padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-1">
                <p class="text-white text-center">Project &amp; Process Management Best Practice <br>at CM Level 2 and above </p>
                <p class="text-center">
                    <a href="/gamestats" >
                        <img alt="Up Stat or Down Stat" class="img-fluid" src="{{ asset('storage/images/devopsimagemedium.png') }}"
                             onmouseover="this.src='{{ asset('storage/images/devops2.gif') }}'"
                             onmouseout="this.src='{{ asset('storage/images/devopsimagemedium.png') }}'"
                             title="How are your game stats? Click here for more">
                    </a>
                </p>
                <p class="text-white text-center">underpinned by ITIL</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-10">
                <p class="text-white">&copy; 2009 PMWay<br> <span class="text-white small">People Process Technology Governance Execution</span></p>
            </div>
        </div>
        <div style="height: 30px;"></div>
</footer>

