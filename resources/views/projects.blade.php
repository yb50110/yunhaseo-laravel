@extends('app')
@section('content')

    <div class="group content-project">
        @foreach($projects as $project)
            <div class="group project-container">
                <a href="{{ route('projects.show', $project) }}" class="project-image" style="background-image: url('../storage/{{ $project->image }}');"></a>
                <h2 class="project-name"><a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a></h2>
                @foreach($project->categories as $cat)
                    <p class="project-category">{{ $cat->name }} <br></p>
                @endforeach
            </div>
        @endforeach
    </div>

@endsection

@section('scripts')

@append