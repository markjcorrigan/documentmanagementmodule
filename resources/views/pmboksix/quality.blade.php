@extends('frontend.pmboksix_master')

@section('title', 'Project Scope Management')

@section('content')
    <style>
        .center-wrapper {
            width: 100vw;              /* full viewport width */
            display: flex;
            justify-content: center;   /* center horizontally */
            align-items: center;       /* center vertically */
            min-height: 80vh;          /* vertically centered block */
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        .center-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2rem;                 /* space between diagram and arrow */
            text-align: center;
        }
        .center-content img {
            max-width: 100%;
            height: auto;
        }
    </style>

    <div class="center-wrapper">
        <div class="center-content">
            <!-- Diagram (centered) -->
            <img
                src="{{ asset('storage/images/qualitysix.jpg') }}"
                alt="Integration Diagram"
                class="rounded-lg dark:opacity-90"
            >

            <!-- Arrow (on the right of the diagram) -->
            <a href="{{ url('/pmboksix/fourone') }}">
                <img
                    src="{{ asset('storage/images/arrow_right.png') }}"
                    alt="Arrow Right"
                    style="width: 100px; height: auto;"
                    class="dark:opacity-90"
                >
            </a>
        </div>
    </div>
@endsection

