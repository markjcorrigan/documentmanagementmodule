<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>
{{--<body class="min-h-screen antialiased" style="background: linear-gradient(to bottom, #0a0a0a, #171717);">--}}
<div class="rounded-xl border bg-white dark:bg-zinc-900 dark:border-stone-800 text-stone-800 shadow-xs">
    <div class="flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
        <div class="flex w-full max-w-md flex-col gap-6">
            <a href="{{ route('home') }}"
               class="flex flex-col items-center gap-2 font-medium hover:opacity-80 transition-opacity">
                {{--            <span class="flex h-12 w-12 items-center justify-center rounded-md">--}}
                {{--                <x-app-logo-icon />--}}
                {{--            </span>--}}

                <div class="w-full text-center">
                    {{--    <span class="flex h-12 w-12 items-center justify-center rounded-md inline-block mx-auto">--}}
                    {{--        <x-app-logo-icon-black class="hidden dark:block" />--}}
                    {{--        <x-app-logo-icon-white class="block dark:hidden" />--}}
                    {{--    </span>--}}


                    <span class="flex h-12 w-12 items-center justify-center rounded-md inline-block mx-auto">
                    <span class="block dark:hidden">
                    <x-app-logo-icon-black/>
                    </span>
                    <span class="hidden dark:block">
                    <x-app-logo-icon-white/>
                    </span>
                    </span>


                    <br>
                    <br>
                </div>

                <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
            </a>

            <div class="flex flex-col gap-6">
                <div
                    class="rounded-xl border bg-white dark:bg-stone-950 dark:border-stone-800 text-stone-800 shadow-xs">
                    <div class="px-10 py-8">{{ $slot }}</div>
                </div>
            </div>
        </div>
    </div>
    @fluxScripts
    </body>
</html>
