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

        <a href="{{ route('home') }}" class="yunhaseo-logo">
            <img class="logo" src="../images/yunha-logo.svg" alt="Yunha's logo">
        </a>

        <nav>
            <a href="{{ route('home') }}" class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">About</a>
            <a href="{{ route('projects') }}" class="{{ Route::currentRouteName() == 'projects' ? 'active' : '' }}">Projects</a>
        </nav>

        @yield('content')

        <footer>
            <a href="https://www.linkedin.com/in/yunha-seo/">LinkedIn</a>
            <a href="https://github.com/yb50110">Github</a>
            <a href="https://www.webtoons.com/en/challenge/lost-crayons/list?title_no=79177">Webtoon</a>
        </footer>

    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ mix('js/scripts.js') }}"></script>
    @yield('scripts')
</html>
