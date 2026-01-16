@extends('layouts.frontend-fullbg')

@section('title')
    @auth
        Ethics
    @else
        PMWay
    @endauth
@endsection

@push('styles')
    <style>
        /* Page background - same for both modes */
        .page-outer-bg {
            background-color: #27272a !important;
        }

        /* Content container - changes with theme */
        [data-bs-theme="light"] .content-container {
            background-color: #ffffff !important;
            color: #212529 !important;
        }

        [data-bs-theme="dark"] .content-container {
            background-color: #111827 !important;
            color: #e5e7eb !important;
        }

        /* Ensure Bootstrap components work in dark mode */
        [data-bs-theme="dark"] .content-container h1,
        [data-bs-theme="dark"] .content-container h2,
        [data-bs-theme="dark"] .content-container h3,
        [data-bs-theme="dark"] .content-container h4,
        [data-bs-theme="dark"] .content-container h5,
        [data-bs-theme="dark"] .content-container h6 {
            color: #ffffff !important;
        }

        [data-bs-theme="dark"] .content-container p,
        [data-bs-theme="dark"] .content-container div,
        [data-bs-theme="dark"] .content-container a:not(.btn) {
            color: #e5e7eb !important;
        }

        [data-bs-theme="dark"] .content-container a:not(.btn):hover {
            color: #60a5fa !important;
        }
    </style>
@endpush

@section('content')
    @auth
        <!-- BODY -->
        <div class="min-h-screen page-outer-bg">
            <div class="max-w-6xl mx-auto px-24 py-8" style="background-color: transparent !important;">
                <br><br>
                <div class="container content-container rounded-lg p-6">

                    <!-- Your existing header content -->
                    <br>
                    <h3 class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle text-warning me-3"></i>
                        Ethics, Productivity and Best Practice
                    </h3>

                    <div class="alert alert-warning" role="alert">
                        <div class="d-flex">
                            <div class="me-3">
                                <i class="fas fa-info-circle fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="alert-heading">Important Notice</h5>
                                <p class="mb-1">What you find in this section is <strong>esoteric, philosophical, and
                                        for some, controversial</strong>.</p>
                                <p class="mb-1">This content is included in PMWay because I am interested in this
                                    subject, and much of the knowledge here has assisted me personally.</p>
                                <hr>
                                <p class="mb-0">
                                    <strong>Please note:</strong> If you do not have an enquiring mind and are not open
                                    to the material you find here,
                                    <a href="/" class="alert-link"><u>you are asked to please leave now.</u></a>
                                    <br>
                                    <em>Remember: What follows is simply a philosophical model. A model (map) can never
                                        fully claim to be the territory.</em>
                                </p>
                                {{--                                <p><a href="/booklets/seagull"><i class="fas fa-arrow-left me-2"></i></a></p>--}}
                            </div>
                        </div>
                    </div>


                    <p align="center"><img alt="all models are wrong" class="img-fluid"
                                           src="/storage/images/modelsarewrong.png"></p>
                    <p class="text-center mb-5">Access protected resources and study materials</p>

                    <p><a href="/booklets/dicts" target="_blank">Click here for the dictionaries that support
                            below</a><br>
                        i.e. I have yet to find a "cult" (which the ignorant accuse Scientology of being) that has its
                        own set of dictionaries.</p>

                    <br>
                    <hr>

                    <!-- Centered section -->
                    <div style="text-align: center;">
                        <a href="/pdf/download/ourtrack.pdf" target="_blank"><img src="/storage/images/timetracker.png"></a>
                        <div>The History of Wisdom</div>

                        <br><br>

                        <p>Official booklets that comprise the essence of The Scientology Handbook<br>
                            <img alt="" class="img-fluid" src="/storage/images/shb-ad.png"><br>
                            These simple to read booklets below are derived from chapters in the handbook,<br>
                            and each on their own, and all working together,<br>
                            have the capacity to be life changing!</p>

                        <br>
                        <p>Download any of the 19 Scientology Handbook booklets belwo<br>and use these to improve
                            conditions in your life<br> and the lives of others.<br><br>
                            {{--                            <br>If required you can also download and install this latest version of Adobe Acrobat by clicking the image below:<br>--}}
                            {{--                            <a href="https://get.adobe.com/reader/" target="_blank"><img src="https://www.adobe.com/images/shared/download_buttons/get_adobe_reader.gif" border="0"></a></p>--}}

                            <!-- Booklet links -->
                            <a href="/pdf/download/study-en.pdf" target="_blank">
                                <img src="/storage/images/book_studytechnology.jpg">
                                <div>The Technology of Study</div>
                            </a>

                            <a href="/booklets/lrhstudy" target="_blank">Study Lectures</a><br><br>

                            <a href="/pdf/download/dynamics-en.pdf" target="_blank">
                                <img src="/storage/images/book_dynamics.jpg">
                                <div>The Dynamics of Existence</div>
                            </a>

                            <a href="/pdf/download/componentsunderstanding-en.pdf" target="_blank">
                                <img src="/storage/images/book_understanding.jpg">
                                <div>The Components of Understanding</div>
                            </a>

                            <a href="/pdf/download/tonescale-en.pdf" target="_blank">
                                <img src="/storage/images/book_tonescale.jpg">
                                <div>The Emotional Tone Scale</div>
                            </a>

                            <a href="/pdf/download/communication-en.pdf" target="_blank">
                                <img src="/storage/images/book_communication.jpg">
                                <div>Communication</div>
                            </a>

                            <a href="/pdf/download/assists-en.pdf" target="_blank">
                                <img src="/storage/images/book_assists.jpg">
                                <div>Assists for Illnesses and Injuries</div>
                            </a>

                            <a href="/pdf/download/drugs-en.pdf" target="_blank">
                                <img src="/storage/images/book_answerstodrugs.jpg">
                                <div>Answers to Drugs</div>
                            </a>

                            <a href="/pdf/download/conflicts-en.pdf" target="_blank">
                                <img src="/storage/images/book_conflict.jpg">
                                <div>How to Resolve Conflicts</div>
                            </a>

                            <a href="/pdf/download/integrityhonesty-en.pdf" target="_blank">
                                <img src="/storage/images/book_integrityhonesty.jpg">
                                <div>Integrity and Honesty</div>
                            </a>

                            <a href="/pdf/download/ethicsconditions-en.pdf" target="_blank">
                                <img src="/storage/images/book_ethics.jpg">
                                <div>Ethics and the Conditions</div>
                            </a>

                            <a href="/pdf/download/causesuppression-en.pdf" target="_blank">
                                <img src="/storage/images/book_suppression.jpg">
                                <div>The Cause of Suppression</div>
                            </a>

                            <a href="/pdf/download/dangerousenvironment-en.pdf" target="_blank">
                                <img src="/storage/images/book_danger.jpg">
                                <div>Solutions for a Dangerous Environment</div>
                            </a>

                            <a href="/pdf/download/marriage-en.pdf" target="_blank">
                                <img src="/storage/images/book_marriage.jpg">
                                <div>Marriage</div>
                            </a>

                            <a href="/pdf/download/children-en.pdf" target="_blank">
                                <img src="/storage/images/book_children.jpg">
                                <div>Children</div>
                            </a>

                            <a href="/pdf/download/toolsworkplace-en.pdf" target="_blank">
                                <img src="/storage/images/book_toolsforworkplace.jpg">
                                <div>Tools for the Workplace</div>
                            </a>

                            <a href="/pdf/download/basicsorganizing-en.pdf" target="_blank">
                                <img src="/storage/images/book_organize.jpg">
                                <div>Basics of Organizing</div>
                            </a>

                            <a href="/pdf/download/targetsgoals-en.pdf" target="_blank">
                                <img src="/storage/images/book_targets.jpg">
                                <div>Targets and Goals</div>
                            </a>

                            <a href="/pdf/download/investigations-en.pdf" target="_blank">
                                <img src="/storage/images/book_investigations.jpg">
                                <div>Investigations</div>
                            </a>

                            <a href="/pdf/download/fundamentalspr-en.pdf" target="_blank">
                                <img src="/storage/images/book_publicrelations.jpg">
                                <div>The Fundamentals of Public Relations</div>
                            </a>

                        <hr>
                        <p align="center">I suggest you only read this book when you have completely digested all the
                            above.</p>
                        <p align="center">
                            <a href="/pdf/download/ethicsperscientology.pdf" target="_blank">
                                <img alt="" class="img-fluid" src="/storage/images/ethicsperscientology-1.jpg">
                            </a>
                        </p>
                        <p align="center">
                            <a href="/conditions/conditions.htm" target="_blank">Click here</a> for a short, easily
                            accessible web<br>
                            that summarizes much found in the books above.<br>
                            I.e. in what "ethics / survival condition" are you finding yourself as you walk on the
                            PMWay? How can you move up tone?
                        </p>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="card-header text-center">
                            <button class="btn btn-primary" type="button" onclick="toggleModels()">
                                Some key models
                            </button>
                        </div>
                        <div class="card-body text-center" id="modelsContent" style="display: none;">
                            <p align="center">
                                <img alt="" class="img-fluid" src="/storage/images/arckra.jpg">
                            </p>
                            <p align="center">
                                <img alt="" class="img-fluid" src="/storage/images/mest.jpg">
                            </p>
                            <p align="center">
                                <img alt="The 8 Dynamics of Life" class="img-fluid" src="/storage/images/09_146.png">
                            </p>
                            <p align="center">
                                <img alt="" class="img-fluid" src="/storage/images/evolution%20of%20logic.jpg">
                            </p>
                            <p align="center">
                                I suggest that fixed mindsets (fanatics, intolerants, controllers) low on the tone scale
                                (see below. I.e. not surviving well)<br>
                                find themselves on the top left of the image directly above.
                            </p>
                            <p align="center">
                                <img alt="" class="img-fluid" src="/storage/images/logicandsurvival.jpg">
                            </p>
                            <p align="center">
                                <img alt="" class="img-fluid" src="/storage/images/tonea.jpg">
                            </p>
                            <p align="center">
                                <img alt="" class="img-fluid" src="/storage/images/toneb.jpg">
                            </p>
                            <p align="center">
                                <img alt="" class="img-fluid" src="/storage/images/arcownother.jpg">
                            </p>
                            <p align="center">
                                <a href="/arc.html" title="Check out more about ARC here.">
                                    <img alt="" class="img-fluid" src="/storage/images/arcandawareness.jpg">
                                </a>
                            </p>


                        </div>
                    </div>

                    <hr>

                    <div class="card">
                        <div class="card-header text-center">
                            <button class="btn btn-primary" type="button" onclick="toggleTexts()">
                                Texts
                            </button>
                        </div>
                        <div class="card-body text-center" id="textsContent" style="display: none;">
                            <h5 class="card-header" align="center">
                                Remember that all models are wrong but some are useful.<br>
                                <img alt="all models are wrong" class="img-fluid"
                                     src="/storage/images/modelsarewrong.png">
                            </h5>
                            <div class="card-body text-center">
                                <ul class="list-unstyled">
                                    <li class="mb-3">
                                        <a href="/booklets/markshrefflertonescalevids/mark%20shreffler%20tone%20scale%20seminar%20-%20part%201.mp4"
                                           target="_blank" class="btn btn-primary btn-lg w-100">
                                            <i class="fas fa-play-circle me-2"></i>Tone Scale Seminar - Part 1
                                        </a>
                                    </li>
                                    <li class="mb-3">
                                        <a href="/booklets/markshrefflertonescalevids/mark%20shreffler%20tone%20scale%20seminar%20-%20part%202.mp4"
                                           target="_blank" class="btn btn-success btn-lg w-100">
                                            <i class="fas fa-play-circle me-2"></i>Tone Scale Seminar - Part 2
                                        </a>
                                    </li>
                                    <li class="mb-3">
                                        <a href="/booklets/markshrefflertonescalevids/mark%20shreffler%20tone%20scale%20seminar%20-%20part%203.mp4"
                                           target="_blank" class="btn btn-warning btn-lg w-100">
                                            <i class="fas fa-play-circle me-2"></i>Tone Scale Seminar - Part 3
                                        </a>
                                    </li>
                                    <li class="mb-3">
                                        <a href="/booklets/markshrefflertonescalevids/mark%20shreffler%20tone%20scale%20seminar%20-%20part%204b.mp4"
                                           target="_blank" class="btn btn-danger btn-lg w-100">
                                            <i class="fas fa-play-circle me-2"></i>Tone Scale Seminar - Part 4
                                        </a>
                                    </li>
                                </ul>
                                <p><a href="/pdf/download/1.pdf">History of Man</a></p><br>
                                <p><a href="/pdf/download/2.pdf">Advanced Procedure and Axioms</a></p><br>
                                <p><a href="/pdf/download/3.pdf">Dianetics 55</a></p><br>
                                <p><a href="/pdf/download/4.pdf">Dianetics the Evolution of a Science</a></p><br>
                                <p><a href="/pdf/download/5.pdf">Dianetics the Modern Science of Mental Health</a></p>
                                <br>
                                <p><a href="/pdf/download/6.pdf">Dianetics the Original Thesis</a></p><br>
                                <p><a href="/pdf/download/7.pdf">Handbook for Preclears</a></p><br>
                                <p><a href="/pdf/download/8.pdf">Introduction to Scientology Ethics</a></p><br>
                                <p><a href="/pdf/download/9.pdf">Science of Survival Predition of Human Behaviour</a>
                                </p><br>
                                <p><a href="/pdf/download/10.pdf">Scientology 08 the Book of the Basics</a></p><br>
                                <p><a href="/pdf/download/11.pdf">Scientology 8.80 the Discovery and Increase in Live
                                        Energy in the Genus Homo Sapiens</a></p><br>
                                <p><a href="/pdf/download/12.pdf">Scientology 8.8008</a></p><br>
                                <p><a href="/pdf/download/13.pdf">Scientology a New Slant on Life</a></p><br>
                                <p><a href="/pdf/download/14.pdf">Scientology The Fundamentals of Thought</a></p><br>
                                <p><a href="/pdf/download/15.pdf">The Technical Bulletins of Dianetics and
                                        Scientology</a></p><br>
                                <p><a href="/pdf/download/16.pdf">The Creation of Human Ability</a></p><br>
                                <p><a href="/pdf/download/17.pdf">Self Analysis</a></p><br>
                                <p><a href="/pdf/download/18.pdf">Self Clearing - The Pilot</a></p><br>
                                <p><a href="/pdf/download/19.pdf">The Problems of Work</a></p><br>
                                <p><a href="/pdf/download/20.pdf">The Way to Happiness</a></p><br>
                                <p><a href="/pdf/download/21.pdf">Assists</a></p><br>
                                <p><a href="/pdf/download/22.pdf">CHILD SCIENTOLOGY AN AID TO FAMILY AND MARRIAGE
                                        GUIDANCE By DENVER FRATER</a></p><br>
                                <p><a href="/pdf/download/23.pdf">FUNDAMENTALS OF SUCCESS by Peter F. Gillham</a></p>
                                <br>
                                <p><a href="/pdf/download/24.pdf">How to Choose Your People by Ruth Minshull</a></p><br>
                                <p><a href="/pdf/download/25.pdf">MIRACLES FOR BREAKFAST by RUTH MINSHULL</a></p><br>
                                <p><a href="/pdf/download/26.pdf">Super Scio Authored by The Pilot</a></p><br>
                                <p><a href="/pdf/download/27.pdf">TELL IT LIKE IT IS! A Course in Scientology
                                        Dissemination by Peter F. Gillham</a></p><br>
                                <p><a href="/pdf/download/28.pdf">The Resolution of Mind A Games Manual by Dennis H.
                                        Stephens</a></p><br>
                                <p><a href="/pdf/download/29.pdf">Ups and Downs by Ruth Minshull</a></p><br>
                                <p><a href="/pdf/download/hylbtl.pdf">Have You Lived Before This Life</a></p><br>
                                <p><a href="/pdf/download/clearingorg.pdf">Interesting stuff from Clearing.org</a></p>
                                <br>
                                <p><a href="/pdf/download/othandbook.pdf">OT Handbook</a></p><br>
                                <p><a href="/booklets/trom-html/index.html" target="_blank">
                                        <i class="fas fa-book-open me-2"></i>TROM Resources
                                    </a></p>
                                <br>
                                <p><a href="/booklets/trscourse/index.htm" target="_blank">
                                        <i class="fas fa-book-open me-2"></i>TR's Course
                                    </a></p>

                            </div>
                        </div>
                    </div>

                    <br><br>
                    <h3>By invitation only</h3><br>
                    <p><a href="/booklets/books" target="_blank">Click here for other stuff from clearbird and etc.</a>
                    </p>

                    <br><br>
                </div>
                <br><br>
            </div>
        </div>

        <script>
            function toggleModels() {
                var content = document.getElementById('modelsContent');
                if (content.style.display === 'none') {
                    content.style.display = 'block';
                } else {
                    content.style.display = 'none';
                }
            }

            function toggleTexts() {
                var content = document.getElementById('textsContent');
                if (content.style.display === 'none') {
                    content.style.display = 'block';
                } else {
                    content.style.display = 'none';
                }
            }
        </script>
    @endauth
@endsection
