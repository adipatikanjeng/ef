@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        {{ $lesson->course->title }}
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-2 col-lg-2 col-md-2">
                <ul class="nav nav-pills nav-stacked">
                    @foreach ($lesson->course->publishedLessons()->where('lesson_parent_id', null)->get() as $listLesson)
                    <li>
                        <a href="{{ route('lessons.show', [$listLesson->course_id, $listLesson->slug]) }}" class="list-group-item" @if ($listLesson->id == $lesson->id) style="font-weight: bold" @endif>{{ $loop->iteration }}. {{ $listLesson->title }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-10 col-lg-10 col-md-10">
                <h2>{{ $lesson->title }}</h2>
                @if(is_file(public_path('uploads/'.$lesson->lesson_image)))
                    <img src="/uploads/{{$lesson->lesson_image}}" alt="user-img" style="margin-right:15px;float:left;width:600px" class="">
                @endif
                {!! $lesson->full_text !!}
                @if($lesson->getMedia('listening_files')->count())
                @foreach($lesson->getMedia('listening_files') as $media)
                <audio controls>
                <source src="{{ $media->getUrl() }}" type="audio/mpeg" />
                    <a href="{{ $media->getUrl() }}">{{ $media->name }}</a>
                    An html5-capable browser is required to play this
                audio.
                </audio>
                @endforeach

                @endif

                @if($lesson->getMedia('downloadable_files')->count())
                Downloadable Lesson:<br>
                @foreach($lesson->getMedia('downloadable_files') as $media)
                    <a href="{{ $media->getUrl() }}" target="_blank"><i class="mdi mdi-file"></i> &nbsp;{{ $media->name }} ({{ $media->size }} KB)</a><br>
                @endforeach
                @endif
                @if($lesson->subLessons->count())
                <ul class="list-group">
                    Sub-lesson:<br>
                    @foreach($lesson->subLessons as $subLesson)
                    <li class="list-group-item"><a href="{{ route('lessons.show', [$subLesson->course_id, $subLesson->slug]) }}">{{ $subLesson->title }}</a></li>
                    @endforeach
                </ul>
                @endif
                {{--  @if ($test_exists)
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
                <hr /> @endif  --}}
                <ul class="pager">
                @if ($previous_lesson)
                <li>
                    <a href="{{ route('lessons.show', [$previous_lesson->course_id, $previous_lesson->slug]) }}">
                        &laquo; {{ $previous_lesson->title }}</a>
                    </li>
                @endif @if ($next_lesson)
                <li>
                    <a href="{{ route('lessons.show', [$next_lesson->course_id, $next_lesson->slug]) }}">{{ $next_lesson->title }} &raquo;</a>
                </li>
                @endif
            </ul>
            </div>
        </div>
        <div class="panel-footer">
            <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
        </div>
    </div>
</div>
@section('javascript')
<script src="{{ url('adminlte/plugins/bootstrap3_player.js') }}"></script>
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