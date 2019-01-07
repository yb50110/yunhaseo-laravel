<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Yunha's Space</title>

        {{-- Favicon --}}

        {{-- Stylesheets --}}
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    </head>
    <body>

        <nav>
            <a href="{{ route('home') }}" class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">About</a>
            <a href="{{ route('projects') }}" class="nav-link {{ Route::currentRouteName() == 'projects' ? 'active' : '' }}">Projects</a>
        </nav>

        @yield('content')

    </body>

    @yield('scripts')
</html>
