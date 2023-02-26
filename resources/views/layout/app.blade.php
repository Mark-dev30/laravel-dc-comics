<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('page-title', 'Comics')</title>
        <!-- Styles -->
        @vite('resources/js/app.js')

    </head>
    <body>
        {{-- INCLUDIAMO HEADER.BLADE.PHP (NELLA CARTELLA PARTIALS) --}}
        @include('partials.header')
        <main>
            {{-- INCLUDIAMO LE DIVERSE PAGINE --}}
            @yield('content')
        </main>
        {{-- INCLUDIAMO FOOTER.BLADE.PHP (NELLA CARTELLA PARTIALS) --}}
        @include('partials.footer')
    </body>