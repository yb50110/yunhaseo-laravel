@extends('app')
@section('content')

    <div class="group content-project-single">
        <h1>{{ $project->name }}</h1>
        <p class="display-inline">{{ $project->year }} |</p>
        <p class="display-inline">{{ $project->companies->name }}</p>
        @if(!is_null($project->url))
            | <a class="display-inline" href="{{ $project->url }}">URL</a>
        @endif

        <p>{{ $project->short_description }}</p>

        <img class="project-thumbnail" src="../storage/{{ $project->image }}">

        <div>
            {!!  $project->description !!}
        </div>

        <p>PUT SKILLS AND TOOLS AND ROLES HERE</p>

        <div class="other-projects">
            <div class="previous-project">
                @if(!is_null($prev_project))
                    <p>Previous Project</p>
                    <a href="{{ route('projects.show', $prev_project) }}">{{ $prev_project->name }}</a>
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

@append