<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Yunha's Space</title>

        {{-- Favicon todo --}}
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon.ico">

        {{-- Stylesheets --}}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/mobile-app.css') }}">

    </head>
    <body>

        <nav>
            <a href="{{ route('home') }}" class="yunhaseo-logo">
                <img class="logo" src="../images/logo-color.svg" alt="Yunha's logo">
            </a>
            <br>
            <p>yunha seo</p>
            <p>designer and developer</p>
            <p>yunha.tonik.seo@gmail.com</p>
            <br>
            <a class="link" href="https://www.linkedin.com/in/yunha-seo/" target="_blank">linkedin</a>
            <a class="link" href="https://github.com/yb50110" target="_blank">github</a>
            <br>
            <br>
            <br>
            @foreach($categories as $cat)
                <a class="link" href="">{{ $cat->name }}</a>
            @endforeach
            <br>

{{--            foreach year... list project--}}
            @foreach($project_years as $year)
                <a class="link" href="">{{ $year }}</a>

                @foreach($projects as $project)
                    @if($project->year == $year)
{{--                        <a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a>--}}
                        <p class="link" id="link-to-project-{{ $project->id }}" onclick="getProject({{ $project->id }})">{{ $project->name }}</p>
                    @endif
                @endforeach

                <br>
            @endforeach


{{--            <a href="{{ route('home') }}" class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">About</a>--}}
{{--            <a href="{{ route('projects') }}" class="{{ Route::currentRouteName() == 'projects' ? 'active' : '' }}">Projects</a>--}}
        </nav>

        @yield('content')

    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ mix('js/scripts.js') }}"></script>
    @yield('scripts')
</html>
