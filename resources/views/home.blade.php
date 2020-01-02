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
                    <img src="../{{ $project->image }}" onclick="getProject({{ $project->id }}); pushToHistory('get', '{{ $project->id }}')">
                    <p onclick="getProject({{ $project->id }}); pushToHistory('get', '{{ $project->id }}')">{{ $project->name }}</p>
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
        $(document).ready(function () {
            const path = window.location.pathname;

            if (path !== '/') {
                if (path.includes('get')) {
                    const re = /get-(\d+)$/gm;
                    const match = re.exec(path);
                    getProject(parseInt(match[1]));

                } else if (path.includes('list')) {
                    const re = /list-(\w+)$/gm;
                    const match = re.exec(path);
                    listProjects(match[1]);

                } else if (path.includes('all')) {
                    listProjects('all');
                }
                // content-home is fadeIn within the respective show functions
            } else {
                $('.content-home').fadeIn();
            }
        });

        function updateActiveLink(id) {
            // fixing nav links
            $('nav').children().removeClass('active');
            $('nav .link').removeClass('active');
            $('#link-to-' + id).addClass('active');
        }

        function closeMenu() {
            if ($(window).innerWidth() <  768) {
                $('nav').css('left', '-300px');
                $('.mobile-menu-background').fadeOut();
            }
        }

        /**
         * lists projects in selected cat
         * cat can be category or year
         * @param cat
         */
        function listProjects(cat)
        {
            closeMenu();
            $('.project').hide();
            $('.project-list').hide();

            updateActiveLink(cat);

            // reset project list
            $('.content-home').show();
            $('.project-list').fadeIn();

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
            closeMenu();

            // hiding project-list
            $('.project-list').hide();
            $('.project').hide();
            updateActiveLink(id);

            $.ajax({
                type: "GET",
                url: 'getproject/' + id,
                dataType: 'json',
                data: 'id=' + id,
                success: function(data) {
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

                    // show project page after loading is done
                    $('.content-home').show();
                    $('.project').fadeIn();
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
