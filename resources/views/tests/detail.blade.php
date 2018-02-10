@extends('layouts.app')
@section('content')
<?php $isHaveSubLesson = $lesson->subLessons()->count() != 0 ? true : false ?>
<div class="panel panel-default">
    <div class="panel-heading">
        {{ $lesson->title }}
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-2 col-lg-2 col-md-2" style="{{$isHaveSubLesson ? '' : 'display:none'}}">
                <ul class="nav nav-pills nav-stacked">
                    @foreach ($lesson->course->publishedLessons()->where('lesson_parent_id', null)->get() as $listLesson)
                    <li>
                        <a href="{{ route('lessons.show', [$listLesson->course_id, $listLesson->slug]) }}" class="list-group-item" @if ($listLesson->id == $lesson->id) style="font-weight: bold" @endif>{{ $loop->iteration }}. {{ $listLesson->title }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <?php $colSize = $isHaveSubLesson ? 10 : 12 ?>
            <div class="col-sm-{{$colSize}} col-lg-{{$colSize}} col-md-{{$colSize}}">
                @if($lesson->subLessons->count())
                <ul class="list-group">
                    @foreach($lesson->subLessons as $subLesson)
                    <li class="list-group-item">
                        <a href="{{ route('tests.show', [$subLesson->course_id, $subLesson->slug]) }}" target="popup" onclick="window.open('{{ route('lessons.show', [$subLesson->course_id, $subLesson->slug]) }}','name','width=100%')">{{ $subLesson->title }}({{$subLesson->test->questions()->count()}})</a>
                    </li>
                    @endforeach
                </ul>
                @endif
                @if ($test_exists)
                <h4>Test: {{ $lesson->test->title }}</h4>
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

                <hr /> @endif
                <ul class="pager">
                @if ($previous_lesson)
                <li>
                    <a href="{{ route('tests.detail', [$previous_lesson->course_id, $previous_lesson->id]) }}">
                        &laquo; {{ $previous_lesson->title }}</a>
                    </li>
                @endif @if ($next_lesson)
                <li>
                    <a href="{{ route('tests.detail', [$next_lesson->course_id, $next_lesson->id]) }}">{{ $next_lesson->title }} &raquo;</a>
                </li>
                @endif
            </ul>
            </div>
        </div>
        <div class="panel-footer">
            @if($isHaveSubLesson)
            <a href="{{ route('courses.show', $lesson->course->slug) }}" class="btn btn-default">Back</a>
            @else
            <button type="button" onclick="window.open('', '_self', ''); window.close();" class="btn btn-danger">Close</button>
        @endif
        </div>
    </div>
</div>
@section('javascript')
<script src="{{ url('adminlte/plugins/bootstrap3_player.js') }}"></script>
@if(!$isHaveSubLesson)
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
@endif
@endsection
@endsection