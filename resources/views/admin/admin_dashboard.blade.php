<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="PMWay">
    <meta name="keywords" content="PMWay">

    <title>PMWay Blog</title>

    <!-- Prevent theme flash - apply theme immediately before any rendering -->
    <script>
        (function() {
            const theme = localStorage.getItem('theme') || 'dark';
            document.documentElement.className = theme === 'dark' ? 'dark-mode' : 'light-mode';
        })();
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- Font Awesome for theme toggle icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('../backend/assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('../backend/assets/vendors/flatpickr/flatpickr.min.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('../backend/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('../backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('../backend/assets/css/demo2/style.css') }}">
    <!-- End layout styles -->

    <!--Favicon-->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
    {{--  <link rel="shortcut icon" href="{{ asset('../backend/assets/images/favicon.png') }}" />--}}

    <!-- toaster link starts -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <!-- toaster link ends -->

    <!-- jquery cdn link starts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- jquery cdn link ends -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('../../../backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
    <!-- End plugin css for this page -->

    <style>
        /* Remove all shadows */
        .page-wrapper,
        .navbar,
        .sidebar,
        .sidebar *,
        .sidebar::before,
        .sidebar::after,
        .sidebar-header,
        .sidebar-body,
        .nav-link,
        .nav-item,
        .main-wrapper,
        .page-content {
            box-shadow: none !important;
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
        }
        
        /* Sidebar borders matching theme colors */
        html.dark-mode .sidebar,
        body.dark-mode .sidebar {
            border-right: 1px solid #37373a !important;
        }
        
        html.light-mode .sidebar,
        body.light-mode .sidebar {
            border-right: 1px solid #e5e7eb !important;
        }

        /* DARK MODE STYLES */
        html.dark-mode,
        html.dark-mode body,
        body.dark-mode {
            background-color: #27272a !important;
        }

        html.dark-mode .main-wrapper,
        html.dark-mode .page-wrapper,
        html.dark-mode .page-content,
        body.dark-mode .main-wrapper,
        body.dark-mode .page-wrapper,
        body.dark-mode .page-content {
            background-color: #27272a !important;
        }

        html.dark-mode .page-content > div,
        html.dark-mode .page-content > section,
        html.dark-mode .page-content > form,
        body.dark-mode .page-content > div,
        body.dark-mode .page-content > section,
        body.dark-mode .page-content > form {
            background-color: #1f2937 !important;
            color: #e5e7eb !important;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        html.dark-mode .card,
        body.dark-mode .card {
            background-color: #1f2937 !important;
            border-color: #374151 !important;
            color: #e5e7eb !important;
        }

        html.dark-mode .card-header,
        body.dark-mode .card-header {
            background-color: #111827 !important;
            border-bottom-color: #374151 !important;
            color: #e5e7eb !important;
        }

        html.dark-mode .table,
        body.dark-mode .table {
            color: #e5e7eb !important;
        }

        html.dark-mode .table-striped tbody tr:nth-of-type(odd),
        body.dark-mode .table-striped tbody tr:nth-of-type(odd) {
            background-color: #374151 !important;
        }

        html.dark-mode .form-control,
        html.dark-mode .form-select,
        body.dark-mode .form-control,
        body.dark-mode .form-select {
            background-color: #374151 !important;
            border-color: #4b5563 !important;
            color: #e5e7eb !important;
        }

        html.dark-mode .form-control:focus,
        html.dark-mode .form-select:focus,
        body.dark-mode .form-control:focus,
        body.dark-mode .form-select:focus {
            background-color: #374151 !important;
            border-color: #6366f1 !important;
            color: #e5e7eb !important;
        }

        html.dark-mode label,
        body.dark-mode label {
            color: #d1d5db !important;
        }

        html.dark-mode .btn-primary,
        body.dark-mode .btn-primary {
            background-color: #4f46e5 !important;
            border-color: #4f46e5 !important;
        }

        html.dark-mode .btn-secondary,
        body.dark-mode .btn-secondary {
            background-color: #6b7280 !important;
            border-color: #6b7280 !important;
        }

        html.dark-mode h1, html.dark-mode h2, html.dark-mode h3, 
        html.dark-mode h4, html.dark-mode h5, html.dark-mode h6,
        body.dark-mode h1, body.dark-mode h2, body.dark-mode h3, 
        body.dark-mode h4, body.dark-mode h5, body.dark-mode h6 {
            color: #f3f4f6 !important;
        }

        html.dark-mode p, html.dark-mode span, html.dark-mode div:not(.btn),
        body.dark-mode p, body.dark-mode span, body.dark-mode div:not(.btn) {
            color: #d1d5db !important;
        }

        html.dark-mode .alert,
        body.dark-mode .alert {
            background-color: #1f2937 !important;
            border-color: #374151 !important;
            color: #e5e7eb !important;
        }

        /* LIGHT MODE STYLES */
        html.light-mode,
        html.light-mode body,
        body.light-mode {
            background-color: #ffffff !important;
        }

        html.light-mode .main-wrapper,
        html.light-mode .page-wrapper,
        html.light-mode .page-content,
        body.light-mode .main-wrapper,
        body.light-mode .page-wrapper,
        body.light-mode .page-content {
            background-color: #f9fafb !important;
        }

        html.light-mode .page-content > div,
        html.light-mode .page-content > section,
        html.light-mode .page-content > form,
        body.light-mode .page-content > div,
        body.light-mode .page-content > section,
        body.light-mode .page-content > form {
            background-color: #ffffff !important;
            color: #111827 !important;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        html.light-mode .card,
        body.light-mode .card {
            background-color: #ffffff !important;
            border-color: #e5e7eb !important;
            color: #111827 !important;
        }

        html.light-mode .card-header,
        body.light-mode .card-header {
            background-color: #f9fafb !important;
            border-bottom-color: #e5e7eb !important;
            color: #111827 !important;
        }

        html.light-mode .table,
        body.light-mode .table {
            color: #111827 !important;
        }

        html.light-mode .table-striped tbody tr:nth-of-type(odd),
        body.light-mode .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9fafb !important;
        }

        html.light-mode .form-control,
        html.light-mode .form-select,
        body.light-mode .form-control,
        body.light-mode .form-select {
            background-color: #ffffff !important;
            border-color: #d1d5db !important;
            color: #111827 !important;
        }

        html.light-mode .form-control:focus,
        html.light-mode .form-select:focus,
        body.light-mode .form-control:focus,
        body.light-mode .form-select:focus {
            background-color: #ffffff !important;
            border-color: #4f46e5 !important;
            color: #111827 !important;
        }

        html.light-mode label,
        body.light-mode label {
            color: #374151 !important;
        }

        html.light-mode .btn-primary,
        body.light-mode .btn-primary {
            background-color: #4f46e5 !important;
            border-color: #4f46e5 !important;
        }

        html.light-mode .btn-secondary,
        body.light-mode .btn-secondary {
            background-color: #6b7280 !important;
            border-color: #6b7280 !important;
        }

        html.light-mode h1, html.light-mode h2, html.light-mode h3, 
        html.light-mode h4, html.light-mode h5, html.light-mode h6,
        body.light-mode h1, body.light-mode h2, body.light-mode h3, 
        body.light-mode h4, body.light-mode h5, body.light-mode h6 {
            color: #111827 !important;
        }

        html.light-mode p, html.light-mode span, html.light-mode div:not(.btn),
        body.light-mode p, body.light-mode span, body.light-mode div:not(.btn) {
            color: #374151 !important;
        }

        html.light-mode .alert,
        body.light-mode .alert {
            background-color: #f9fafb !important;
            border-color: #e5e7eb !important;
            color: #111827 !important;
        }
    </style>
</head>
<body>
<div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->
    @include('admin.partials.sidebar')
    <!-- partial -->

    <div class="page-wrapper">

        <!-- partial:partials/_navbar.html -->
        @include('admin.partials.navbar')
        <!-- partial -->

        <div class="page-content" style="min-height: calc(100vh - 130px); padding: 20px;">

            @yield('admin')

        </div>

        <!-- partial:partials/_footer.html -->
        @include('admin.partials.footer')
        <!-- partial -->

    </div>
</div>

<!-- core:js -->
<script src="{{ asset('../backend/assets/vendors/core/core.js') }}"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{ asset('../backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('../backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{ asset('../backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('../backend/assets/js/template.js') }}"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{ asset('../backend/assets/js/dashboard-dark.js') }}"></script>
<!-- End custom js for this page -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>

<!-- Theme Toggle Script -->
<script>
    // Apply theme on page load (backup in case inline script didn't work)
    document.addEventListener('DOMContentLoaded', function() {
        const theme = localStorage.getItem('theme') || 'dark';
        applyTheme(theme);
    });

    function applyTheme(theme) {
        const html = document.documentElement;
        const body = document.body;
        const themeIcon = document.getElementById('themeIcon');
        
        // Remove both classes from html and body
        html.classList.remove('dark-mode', 'light-mode');
        body.classList.remove('dark-mode', 'light-mode');
        
        // Apply the appropriate class
        const themeClass = theme === 'dark' ? 'dark-mode' : 'light-mode';
        html.classList.add(themeClass);
        body.classList.add(themeClass);
        
        if (theme === 'dark') {
            if (themeIcon) {
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
                themeIcon.style.color = '#fbbf24'; // Yellow color for sun
            }
        } else {
            if (themeIcon) {
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
                themeIcon.style.color = '#1f2937';
            }
        }
    }

    function toggleTheme() {
        const currentTheme = localStorage.getItem('theme') || 'dark';
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        
        // Set theme for legacy Bootstrap pages
        localStorage.setItem('theme', newTheme);
        
        // Sync with Flux appearance for Tailwind/Livewire pages
        localStorage.setItem('flux-appearance', newTheme);
        
        applyTheme(newTheme);
        
        // Dispatch storage event to notify other tabs/windows
        window.dispatchEvent(new StorageEvent('storage', {
            key: 'theme',
            newValue: newTheme
        }));
    }
</script>

<!-- Plugin js for this page -->
<script src="{{asset('../../../backend/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('../../../backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
<!-- End plugin js for this page -->

<!-- Custom js for this page -->
<script src="{{asset('../../../backend/assets/js/data-table.js')}}"></script>
<!-- End custom js for this page -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('backend/assets/js/code.js') }}" ></script>

{{--  <script src="{{asset('../../../backend/assets/vendors/tinymce/tinymce.min.js')}}"></script>--}}
{{--  <script src="{{asset('../../../backend/assets/js/tinymce.js')}}"></script>--}}
<script src="{{ asset('js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
</body>
</html>
