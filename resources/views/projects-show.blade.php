@extends('app')
@section('content')

    <div class="group content-project-single">
        <div class="project-category">
            @foreach($project->categories as $index=>$cat)
                @if($index != count($project->categories)-1)
                    <p>{{ $cat->name }},</p>
                @else
                    <p>{{ $cat->name }}</p>
                @endif
            @endforeach
        </div>

        <div class="group">
            <h1 class="project-name">{{ $project->name }}</h1>
            <div class="project-info">
                <p>{{ $project->year }}</p>
                <p>{{ $project->companies->name }}</p>
                @if(!is_null($project->url))
                    | <a href="{{ $project->url }}" target="_blank">Project Link</a>
                @endif
            </div>
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

        <div class="project-thumbnail" style="background-image: url('../storage/{{ $project->image }}');"></div>
        <div class="project-thumbnail-enlarged">
            <div class="background"></div>
            <img src="../storage/{{ $project->image }}">
        </div>

        <div class="group-right">
            <p class="project-quote">
                "{{ $project->quote }}"
            </p>
            <ul class="project-tools">
                <p>Utilized Tools</p>
                @foreach($project->tools as $tool)
                    <li>{{ $tool->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="project-description">
            {!! $project->description !!}
        </div>


        <div class="group">
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