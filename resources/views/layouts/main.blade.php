<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="data:;base64,iVBORw0KGgo=">
        <link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}">
        <link rel="mask-icon" href="{{ asset('favicons/safari-pinned-tab.svg') }}" color="#8cb758">
        <meta name="msapplication-TileColor" content="#f6faf0">
        <meta name="theme-color" content="#ffffff">

        <title>{{ config('app.name', 'AppName') }}</title>

        {{-- Fonts --}}
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,600;1,700;1,800&display=swap">

        {{-- Styles --}}
        <link rel="stylesheet" href="{{ mix('css/main.css') }}">

        @livewireStyles


    </head>
    <body class="">
        <div class="app-wrapper">

            <x-sidebar/>
            <main class="main">
                <x-navbar/>

                <div {{$attributes->merge(['class' => 'content p-3 p-lg-4'])}}>
                    <!-- Page Heading -->
                    {{ $header ?? '' }}

                    <!-- Page Content -->
                    {{ $slot ?? '' }}

                </div>

            </main>

        </div>




        <x-search-modal />

        @livewireScripts
        <script src="{{ mix('js/app.js') }}"></script>
        @stack('scripts')

    </body>
</html>
