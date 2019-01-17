@extends('app')
@section('content')

    <div class="content-home">
        <div class="extra-padding">
            <div class="korean-hello">안녕!</div>
            <h1>I'm Yunha</h1>
            <p class="description">developer, designer, illustrator, comic author, gamer, passionate learner, and a lover of all good food without cilantro.</p>
        </div>

        <div class="group images">
            <div class="width-60"></div>
            <div class="width-40"></div>
        </div>

        <p class="description">I had been a Graphic Designer and Front-end Developer at
            <a href="https://www.b507.us/">B507</a> and
            <a href="https://b302.nl/">B302</a>.
        </p>

        <div class="group images">
            <div class="width-50-left"></div>
            <div class="width-50-right"></div>
            <p class="more">Check out all of my past <a href="{{ route('projects') }}">projects</a>.</p>
        </div>

        <p class="description">Feel free to <a href="">say hello</a>!</p>
        {{--todo: add copy email functionality--}}

    </div>

@endsection

@section('scripts')

@append