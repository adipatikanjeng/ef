@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        {{ $course->title }}
    </div>
    <div class="panel-body">
        @if ($purchased_course) Rating: {{ $course->rating }} / 5
        <br />
        <b>Rate the course:</b>
        <br />
        <form action="{{ route('courses.rating', [$course->id]) }}" method="post">
            {{ csrf_field() }}
            <select name="rating">
                <option value="1">1 - Awful</option>
                <option value="2">2 - Not too good</option>
                <option value="3">3 - Average</option>
                <option value="4" selected>4 - Quite good</option>
                <option value="5">5 - Awesome!</option>
            </select>
            <input type="submit" value="Rate" />
        </form>
        <hr /> @endif
        <p>{{ $course->description }}</p>

        @foreach ($course->publishedLessons as $lesson)
        {{ $loop->iteration }}.
        <a href="{{ route('lessons.show', [$lesson->course_id, $lesson->slug]) }}">{{ $lesson->title }}</a>
        <p>{{ $lesson->short_text }}</p>
        <hr />
        @endforeach
    </div>
    <div class="panel-footer">
            <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
    </div>
</div>
@endsection