@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        {{ $course->title }}
    </div>
    <div class="panel-body">
        <p>{{ $course->description }}</p>
        @foreach ($course->publishedLessons()->where('lesson_parent_id', null)->get() as $lesson)
        {{ $loop->iteration }}.
        @if($lesson->subLessons()->count() == 0)
        <a href="{{ route('lessons.show', [$lesson->course_id, $lesson->slug]) }}" target="popup" onclick="window.open('{{ route('lessons.show', [$lesson->course_id, $lesson->slug]) }}','name','width=100%')">{{ $lesson->title }}</a>
        @else
        <a href="{{ route('lessons.show', [$lesson->course_id, $lesson->slug]) }}" >{{ $lesson->title }}</a>
        @endif
        <p>{{ $lesson->short_text }}</p>
        <hr />
        @endforeach
    </div>
    <div class="panel-footer">
            <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
    </div>
</div>
@endsection