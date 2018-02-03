@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        {{ $lesson->course->title }}
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-2 col-lg-2 col-md-2">
                <div class="list-group">
                    @foreach ($lesson->course->publishedLessons as $list_lesson)
                    <a href="{{ route('lessons.show', [$list_lesson->course_id, $list_lesson->slug]) }}" class="list-group-item" @if ($list_lesson->id == $lesson->id) style="font-weight: bold" @endif>{{ $loop->iteration }}. {{ $list_lesson->title }}</a>                    @endforeach
                </div>
            </div>
            <div class="col-sm-10 col-lg-10 col-md-10">
                <h2>{{ $lesson->title }}</h2>
                @if ($purchased_course || $lesson->free_lesson == 1) {!! $lesson->full_text !!} @if ($test_exists)
                <hr />
                <h3>Test: {{ $lesson->test->title }}</h3>
                @if (!is_null($test_result))
                <div class="alert alert-info">Your test score: {{ $test_result->test_result }}</div>
                @else
                <form action="{{ route('lessons.test', [$lesson->slug]) }}" method="post">
                    {{ csrf_field() }} @foreach ($lesson->test->questions as $question)
                    <b>{{ $loop->iteration }}. {{ $question->question }}</b>
                    <br /> @foreach ($question->options as $option)
                    <input type="radio" name="questions[{{ $question->id }}]" value="{{ $option->id }}" /> {{ $option->option_text
                    }}
                    <br /> @endforeach
                    <br /> @endforeach
                    <input type="submit" value=" Submit results " />
                </form>
                @endif
                <hr /> @endif @else Please <a href="{{ route('courses.show', [$lesson->course->slug]) }}">go back</a> and buy the
                course. @endif @if ($previous_lesson)
                <p>
                    <a href="{{ route('lessons.show', [$previous_lesson->course_id, $previous_lesson->slug]) }}">
                        << {{ $previous_lesson->title }}</a>
                </p>
                @endif @if ($next_lesson)
                <p><a href="{{ route('lessons.show', [$next_lesson->course_id, $next_lesson->slug]) }}">{{ $next_lesson->title }} >></a></p>
                @endif
            </div>
        </div>
        <div class="panel-footer">
                <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
        </div>
    </div>
</div>
@section('javascript')
<script>
    $(document).ready(function() {
        if($('body').hasClass( "hide-sidebar" )){
            $('body').removeClass('hide-sidebar')
            $('.little-logo').hide();
            }else{
            $('body').addClass('hide-sidebar')
            $('.little-logo').show();
            }
        })
</script>
@endsection
@endsection