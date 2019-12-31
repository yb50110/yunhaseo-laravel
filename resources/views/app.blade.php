<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Yunha's Space</title>

        <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#c31b31">
        <meta name="msapplication-TileColor" content="#c31b31">
        <meta name="theme-color" content="#c31b31">

        {{-- Stylesheets --}}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/mobile-app.css') }}">
    </head>
    <body>

        <div class="mobile-menu-button--open">--- menu ---</div>
        <div class="mobile-menu-background"></div>

        <nav>
            <div class="mobile-menu-button--close">--- close ---</div>
            <a id="link-to-all" onclick="listProjects('all'); pushToHistory('list', '')" class="yunhaseo-logo">
                <img class="logo" src="../images/logo-color.svg" alt="Yunha's logo">
            </a>
            <br>
            <br>
            <p class="bold">yunha seo</p>
            <p class="bold">yunha.tonik.seo@gmail.com</p>
            <br>
            <a class="link" href="https://www.linkedin.com/in/yunha-seo/" target="_blank">linkedin</a>
            <a class="link" href="https://github.com/yb50110" target="_blank">github</a>
            <br>
            <p>-----</p>
            <br>
            @foreach($categories as $cat)
                <p class="link" id="link-to-{{ $cat->name }}" onclick="listProjects('{{ $cat->name }}'); pushToHistory('list', '{{ $cat->name }}')">{{ $cat->name }}</p>
            @endforeach
            <br>

{{--            foreach year... list project--}}
            @foreach($project_years as $year)
                <p class="link bold" id="link-to-cat-{{ $year }}" onclick="listProjects('{{ $year }}'); pushToHistory('list', '{{ $year }}')">{{ $year }}</p>

                @foreach($projects as $project)
                    @if($project->year == $year)
                        <p class="link" id="link-to-{{ $project->id }}" onclick="getProject({{ $project->id }}); pushToHistory('get', '{{ $project->id }}')">{{ $project->name }}</p>
                    @endif
                @endforeach

                <br>
            @endforeach

        </nav>

        @yield('content')

    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ mix('js/scripts.js') }}"></script>
    @yield('scripts')
</html>
