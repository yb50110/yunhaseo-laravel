@extends('app')
@section('content')

    <div class="group content-project">
        @foreach($projects as $project)
            <div class="group project-container">
                <a href="{{ route('projects.show', $project) }}" class="project-image" style="background-image: url('../storage/{{ $project->image }}');"></a>
                <h2 class="project-name"><a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a></h2>
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

@endsection

@section('scripts')

@append