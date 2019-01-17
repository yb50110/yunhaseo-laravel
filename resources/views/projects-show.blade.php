@extends('app')
@section('content')

    <div class="group content-project-single">
        <h1 class="project-name">{{ $project->name }}</h1>

        <div class="group">
            <p class="display-inline">{{ $project->year }} |</p>
            <p class="display-inline">{{ $project->companies->name }}</p>
            @if(!is_null($project->url))
                | <a class="display-inline" href="{{ $project->url }}">URL</a>
            @endif
        </div>

        <div class="group">
            <div class="project-shortdescription">{!! $project->short_description  !!}</div>

            <div class="group">
                <ul class="project-roles">
                    <p>Role Taken</p>
                    @foreach($project->roles as $role)
                        <li>{{ $role->name }}</li>
                    @endforeach
                </ul>
                <ul class="project-skills">
                    <p>Takeaway Skills</p>
                    @foreach($project->skills as $skill)
                        <li>{{ $skill->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <img class="project-thumbnail" src="../storage/{{ $project->image }}">

        <div class="group-right">
            <p class="project-quote">
                "BLAH BLAH BLAH"
                {{--todo--}}
            </p>
            <ul class="project-tools">
                <p>Utilized Tools</p>
                @foreach($project->tools as $tool)
                    <li>{{ $tool->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="project-description">
            {!!  $project->description !!}
        </div>


        <div class="group">
            <div class="previous-project">
                @if(!is_null($prev_project))
                    <p>Previous Project</p>
                    <a href="{{ route('projects.show', $prev_project) }}">{{ $prev_project->name }}</a>
                    {{--todo--}}
                @endif
            </div>
            <div class="next-project">
                @if(!is_null($next_project))
                    <p>Next Project</p>
                    <a href="{{ route('projects.show', $next_project) }}">{{ $next_project->name }}</a>
                @endif
            </div>
        </div>

    </div>

@endsection

@section('scripts')

    <script>
        $(".project-description p img").unwrap();
    </script>

@append