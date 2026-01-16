<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, minimum-scale=1, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <meta name="description" content="PMWay (The Way to achieve Project and Process Management Excellence)" >
    <meta name="keywords" content="consulting, project management, Project Management Way, Scrum, PMBOK, SBOK, ITIL, ScrumBok, Jira, Confluence, SAFe, Scaled Agile Framework, DevOps" >
    <!--NB testing below to try to solve the modal stuck problem-->
    <style>
        .modal-backdrop {display: none;}
    </style>
    <title>PMWay - @yield('title')</title>

    <!-- Bootstrap CSS -->


{{--    <link rel="stylesheet" href="{{ asset('bootstrapfourthreeone/css/bootstrap.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('fontawesome6/fontawesome6/pro/css/all.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('bootstrapfourthreeone/css/jquery-ui.css') }}">--}}
{{--    <!-- Custom Styles -->--}}
{{--    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">--}}

    <style>
        .accordion .card-header:after {
            content: "\2013";
            font-weight: bold;
            float: right;
        }

        .accordion .card-header.collapsed:after {
            /* symbol for "collapsed" panels */
            content: "\002B";
        }

        .round-border {
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 5px;
        }
    </style>
</head>

<body class="d-flex flex-column">
@include('frontend.legacy_header')
@include('frontend.legacy_nav')
<map id="imgmap2" name="imgmap2">
    <area coords="223, 128, 350, 232" href="/pmboksix/fourone" shape="rect" title="4.1">
    <area coords="347, 128, 469, 231" href="/pmboksix/fourtwo" shape="rect" title="4.2">
    <area coords="470, 130, 590, 180" href="/pmboksix/fourthree" shape="rect" title="4.3">
    <area coords="471, 180, 591, 232" href="/pmboksix/fourfour" shape="rect" title="4.4">
    <area coords="593, 130, 719, 181" href="/pmboksix/fourfive" shape="rect" title="4.5">
    <area coords="594, 181, 717, 231" href="/pmboksix/foursix" shape="rect" title="4.6">
    <area coords="719, 130, 834, 233" href="/pmboksix/fourseven" shape="rect">
    <area coords="350, 232, 469, 270" href="/pmboksix/fiveone" shape="rect" title="5.1">
    <area coords="348, 267, 466, 297" href="/pmboksix/fivetwo" shape="rect" title="5.2">
    <area coords="348, 296, 467, 314" href="/pmboksix/fivethree" shape="rect" title="5.3">
    <area coords="349, 310, 467, 331" href="/pmboksix/fivefour" shape="rect" title="5.4">
    <area coords="593, 232, 715, 253" href="/pmboksix/fivefive" shape="rect" title="5.5">
    <area coords="593, 252, 714, 271" href="/pmboksix/fivesix" shape="rect" title="5.6">
    <area coords="346, 331, 471, 367" href="/pmboksix/sixone" shape="rect" title="6.1">
    <area coords="345, 368, 471, 397" href="/pmboksix/sixtwo" shape="rect" title="6.2">
    <area coords="345, 395, 471, 428" href="/pmboksix/sixthree" shape="rect" title="6.3">
    <area coords="346, 426, 465, 456" href="/pmboksix/sixfour" shape="rect" title="6.4">
    <area coords="344, 454, 467, 493" href="/pmboksix/sixfive" shape="rect" title="6.5">
    <area coords="594, 331, 713, 494" href="/pmboksix/sixsix" shape="rect" title="6.6">
    <area coords="347, 494, 468, 530" href="/pmboksix/sevenone" shape="rect" title="7.1">
    <area coords="344, 526, 466, 546" href="/pmboksix/seventwo" shape="rect" title="7.2">
    <area coords="348, 542, 467, 580" href="/pmboksix/seventhree" shape="rect" title="7.3">
    <area coords="593, 493, 713, 583" href="/pmboksix/sevenfour" shape="rect" title="7.4">
    <area coords="343, 580, 469, 643" href="/pmboksix/eightone" shape="rect" title="8.1">
    <area coords="466, 581, 597, 641" href="/pmboksix/eighttwo" shape="rect" title="8.2">
    <area coords="593, 581, 716, 643" href="/pmboksix/eightthree" shape="rect" title="8.3">
    <area coords="347, 642, 467, 678" href="/pmboksix/nineone" shape="rect" title="9.1">
    <area coords="347, 676, 467, 713" href="/pmboksix/ninetwo" shape="rect" title="9.2">
    <area coords="468, 639, 593, 674" href="/pmboksix/ninethree" shape="rect" title="9.3">
    <area coords="473,670,591,691" href="/pmboksix/ninefour" shape="rect" title="9.4">
    <area coords="473,689,592,710" href="/pmboksix/ninefive" shape="rect" title="9.5">
    <area coords="591, 643, 718, 716" href="/pmboksix/ninesix" shape="rect" title="9.6">
    <area coords="343, 711, 471, 774" href="/pmboksix/tenone" shape="rect" title="10.1">
    <area coords="467, 709, 590, 772" href="/pmboksix/tentwo" shape="rect" title="10.2">
    <area coords="588, 712, 716, 772" href="/pmboksix/tenthree" shape="rect" title="10.3">
    <area coords="345, 773, 470, 808" href="/pmboksix/elevenone" shape="rect" title="11.1">
    <area coords="345, 806, 466, 826" href="/pmboksix/eleventwo" shape="rect" title="11.2">
    <area coords="344, 824, 470, 868" href="/pmboksix/eleventhree" shape="rect" title="11.3">
    <area coords="347, 868, 467, 916" href="/pmboksix/elevenfour" shape="rect" title="11.4">
    <area coords="346, 912, 468, 948" href="/pmboksix/elevenfive" shape="rect" title="11.5">
    <area coords="469, 770, 592, 811" href="/pmboksix/elevensix" shape="rect" title="11.6">
    <area coords="592, 773, 716, 814" href="/pmboksix/elevenseven" shape="rect" title="11.7">
    <area coords="347, 949, 465, 1014" href="/pmboksix/twelveone" shape="rect" title="12.1">
    <area coords="465, 950, 595, 1013" href="/pmboksix/twelvetwo" shape="rect" title="12.2">

    <area coords="591, 949, 717, 1012" href="/pmboksix/twelvethree" shape="rect" title="12.3">

    <area coords="220, 1009, 344, 1068" href="/pmboksix/thirteenone" shape="rect" title="13.1">
    <area coords="347, 1012, 468, 1070" href="/pmboksix/thirteentwo" shape="rect" title="13.2">
    <area coords="469, 1009, 595, 1070" href="/pmboksix/thirteenthree" shape="rect" title="13.3">
    <area coords="592, 1011, 717, 1070" href="thirteenfour" shape="rect" title="13.4">
    <area coords="85, 1010, 224, 1067" href="/pmboksix/stakeholder" shape="rect" title="Stakeholder">
    <area coords="82, 131, 226, 236" href="/pmboksix/integration" shape="rect" title="Integration">
    <area coords="85, 231, 224, 334" href="/pmboksix/scope" shape="rect" title="Scope">
    <area coords="86, 330, 220, 491" href="/pmboksix/schedule" shape="rect" title="Schedule">
    <area coords="84, 492, 225, 580" href="/pmboksix/cost" shape="rect" title="Cost">
    <area coords="86, 578, 219, 640" href="/pmboksix/quality" shape="rect" title="Quality">
    <area coords="86, 641, 223, 715" href="/pmboksix/resource" shape="rect" title="Resource">
    <area coords="83, 714, 223, 774" href="/pmboksix/communication" shape="rect" title="Communication">
    <area coords="84, 773, 221, 952" href="/pmboksix/risk" shape="rect" title="Risk">
    <area coords="84, 950, 224, 1010" href="/pmboksix/procurement" shape="rect" title="Procurement">
    <area coords="224, 49, 349, 133" href="/pmboksix/initiate" shape="rect" title="Initiate">
    <area coords="352, 46, 468, 132" href="/pmboksix/plan" shape="rect" title="Plan">
    <area coords="467, 46, 591, 132" href="/pmboksix/execute" shape="rect" title="Execute">
    <area coords="593, 43, 717, 132" href="/pmboksix/monitorandcontrol" shape="rect" title="MonitorAndControl">
    <area coords="717, 44, 837, 133" href="/pmboksix/close" shape="rect" title="Close">
</map>
@yield('content')
@include('frontend.legacy_footer')


{{--<script src="{{ asset('bootstrapfourthreeone/js/jquery.js') }}"></script>--}}
{{--<script src="{{ asset('bootstrapfourthreeone/js/bootstrap.js') }}"></script>--}}
{{--<script src="{{ asset('bootstrapfourthreeone/js/popper.min.js') }}"></script>--}}
{{--<script src="{{ asset('bootstrapfourthreeone/js/jquery-ui.js') }}"></script>--}}



</body>
