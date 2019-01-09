@extends('app')
@section('content')

    <div class="group content-project-single">
        <h1>{{ $project->name }}</h1>
        <p>{{ $project->companies->name }}</p>
        <p>{{ $project->year }}</p>
        @if(!is_null($project->url))
            <a href="{{ $project->url }}">Website</a>
        @endif

        <div class="project-thumbnail" style="background-image: url('../storage/{{ $project->image }}');"></div>

        <div>
            {!!  $project->description !!}
        </div>

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