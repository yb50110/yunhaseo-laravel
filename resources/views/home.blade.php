@extends('app')
@section('content')

    <div class="content-home">

        <div class="project-list">
            @foreach($projects as $project)
                <div class="project-thumbnail">
                    <img src="../storage/{{ $project->image }}" onclick="getProject({{ $project->id }})">
                    <p>{{ $project->name }}</p>
                </div>
            @endforeach
        </div>

        <div class="project">
            <div class="project-name"></div>
            <div class="project-year"></div>
            <div class="project-category"></div>
            <div class="project-description"></div>
        </div>

    </div>

@endsection

@section('scripts')
    <script>
        function getProject(id)
        {
            // hiding project-list
            $('.project-list').hide();
            $('.project').show();

            // fixing nav links
            $('nav').children().removeClass('active');
            $('#link-to-project-' + id).addClass('active');

            $.ajax({
                type: "GET",
                url: 'getproject/' + id,
                dataType: 'json',
                data: 'id=' + id,
                success: function(data) {
                    console.log(data);
                    $('.project-name').html(data.name);
                    $('.project-year').html(data.year);
                    $('.project-description').html(data.description);
                    $('.content-home').css({
                        'background-color': data.backgroundColor,
                        'color': data.textColor
                    });

                    var temp = [];
                    for (var i = 0; i < data.categories.length; i++) {
                        if (i === 0) {
                            temp.push(data.categories[i].name)
                        } else {
                            temp.push(' ' + data.categories[i].name)
                        }
                    }
                    $('.project-category').html(temp.toString());
                },
                error: function(data) {
                    console.log('error: ' + data);
                }
            });
        }
    </script>
@append