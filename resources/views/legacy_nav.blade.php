<div id="page-content">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
        <a class="navbar-brand" href="/">PMWay </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/about" title="Why PMWay?"><i class="fad fa-info"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/waterfallvsagile" title="The TPM and APM processes"><i
                            class="fad fa-cogs"></i></a>
                </li>
             <!--   <li class="nav-item">
                    <a class="nav-link" href="/blog" title="Blog"> <i class="fa-duotone fa-blog"></i></a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="/cv/index.html" title="Who am I, my Portfolio Web and CV" >
                        <!-- <i class="fad fa-envelope" aria-hidden="true"></i>-->
                        <i class="fad fa-id-card-alt"></i>
                        <!--<i class="fad fa-address-book" aria-hidden="true"></i>-->
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cv/index.html#section-5" title="Contact PMWay">
                        <i class="fad fa-envelope" aria-hidden="true"></i>
                    </a>
                </li>
                </li>
                @if (! Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="/login" title="Login">
                            <i class="fa-duotone fa-user-unlock"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register" title="Register">
                            <i class="fa-duotone fa-id-card"></i>
                        </a>
                    </li>
                @endif
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="/user/logout" title="Logout">
                            <i class="fad fa-lock" aria-hidden="true"></i>
                        </a>
                    </li>
            @endif
        </div>
        </ul>
    </nav>
