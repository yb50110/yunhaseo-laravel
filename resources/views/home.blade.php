@extends('app')
@section('content')

    <div class="content-home">

        <div class="project-list">
            @foreach($projects as $project)
                <div id="project-thumbnail-{{ $project->id }}"
                     class="project-thumbnail
                            {{ $project->year }}
                            @foreach($project->categories as $index=>$cat)
                                 {{ $cat->name }}
                            @endforeach
                        ">
                    <img src="../{{ $project->image }}" onclick="getProject({{ $project->id }}, pushToHistory('get', '{{ $project->id }}')">
                    <p>{{ $project->name }}</p>
                </div>
            @endforeach
        </div>

        <div class="project">
            <div class="project-name"></div>
            <div class="project-year"></div>
            <div class="project-category"></div>
            <div class="project-client"></div>
            <div class="project-description"></div>
        </div>

    </div>

@endsection

@section('scripts')
    <script>
        function updateActiveLink(id) {
            // fixing nav links
            $('nav').children().removeClass('active');
            $('nav .link').removeClass('active');
            $('#link-to-' + id).addClass('active');
        }

        /**
         * lists projects in selected cat
         * cat can be category or year
         * @param cat
         */
        function listProjects(cat)
        {
            $('.project').hide();

            updateActiveLink(cat);

            // reset project list
            $('.project-list').show();
            $('.content-home').css({
                'background-color': '#ffffff',
                'color': '#000000'
            });

            // show only those with cat
            const all_projects = $('.project-thumbnail');

            if (cat === 'all') {
                $.each( all_projects, function( key, value ) {
                    $(value).show();
                });
            } else {
                $.each( all_projects, function( key, value ) {
                    if($(value).hasClass(cat)) {
                        $(value).show();
                    } else {
                        $(value).hide();
                    }
                });
            }
        }

        function getProject(id)
        {
            // hiding project-list
            $('.project-list').hide();
            $('.project').show();

            updateActiveLink(id);

            $.ajax({
                type: "GET",
                url: 'getproject/' + id,
                dataType: 'json',
                data: 'id=' + id,
                success: function(data) {
                    $('.content-home').css({
                        'background-color': data.backgroundColor,
                        'color': data.textColor
                    });
                    $('.project-name').html(data.name);
                    $('.project-year').html(data.year);
                    $('.project-description').html(data.description);

                    var temp = [];
                    for (var i = 0; i < data.categories.length; i++) {
                        if (i === 0) {
                            temp.push(data.categories[i].name)
                        } else {
                            temp.push(' ' + data.categories[i].name)
                        }
                    }
                    $('.project-category').html(temp.toString());

                    if(data.client) {
                        $('.project-client').html('for ' + data.client);
                    } else {
                        $('.project-client').html('');
                    }
                },
                error: function(data) {
                    console.log('error: ' + data);
                }
            });
        }

        function pushToHistory(type, id) {
            if (id === '') {
                history.pushState('list[all]', null, 'all');
            } else {
                history.pushState(type + '[' + id + ']', null, type + '-' + id);
            }
        }
    </script>
@append
