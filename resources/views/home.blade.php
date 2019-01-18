@extends('app')
@section('content')

    <div class="content-home">
        <div class="korean-hello">안녕!</div>
        <h1>I'm Yunha</h1>
        <p class="description">developer, designer, illustrator, comic author, gamer, passionate learner, and a lover of all good food without cilantro.</p>

        {{--<div class="width-40" style="background-image: url('../images/50.png');"></div>--}}

        <div class="group images">
            <a class="width-60" href="https://vimeo.com/200680809" style="background-image: url('../images/me_buro1.png');" target="_blank"></a>
            <div class="width-40" style="background-image: url('../images/me_buro.png');"></div>
        </div>

        <p class="description">I had been a Graphic Designer and Front-end Developer at
            <a href="https://www.b507.us/" target="_blank">B507</a> and
            <a href="https://b302.nl/" target="_blank">B302</a>.
        </p>

        <div class="group">
            <p class="more">Here are a couple of my featured <a href="{{ route('projects') }}">projects</a>:</p>
            @foreach ($projects as $project)
                <div class="group project-container">
                    <a href="{{ route('projects.show', $project) }}" class="project-image" style="background-image: url('../storage/{{ $project->image }}');"></a>
                    <h2 class="project-name"><a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a>
                    </h2>
                    <div class="group project-category">
                        @foreach($project->categories as $index=>$cat)
                            @if($index != count($project->categories)-1)
                                <p>{{ $cat->name }},</p>
                            @else
                                <p>{{ $cat->name }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="email-container">
            <p class="description">Feel free to <a onclick="toggleEmailOptions()">say hello</a>!</p>
            <div class="email-options">
                <a href="mailto:yunha.tonik.seo@gmail.com">open mail app</a>
                <a onclick="copyEmail()">copy email</a>
                <input id="email-input" type="text" value="yunha.tonik.seo@gmail.com">
            </div>
            <p class="email-copy-success">email copied</p>
        </div>

    </div>

@endsection

@section('scripts')
    <script>
        function toggleEmailOptions() {
            $('.email-options').fadeIn();
        }

        function copyEmail() {
            var copyText = document.getElementById("email-input");
            copyText.select();
            document.execCommand("copy");
            $('.email-options').fadeOut();
            $('.email-copy-success')
                .delay(500).fadeIn()
                .delay(1000).fadeOut();
        }
    </script>
@append