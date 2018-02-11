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
                @if(is_file(public_path('uploads/'.$lesson->lesson_image)))
                    <img src="/uploads/{{$lesson->lesson_image}}" alt="" style="margin-right:15px;float:left;width:400px" class="">
                @endif
                {!! $lesson->full_text !!}
                @if($lesson->getMedia('listening_files')->count())
                @foreach($lesson->getMedia('listening_files') as $media)
                <h4>{{ $loop->iteration }}. {{ $media->name }}</h4>
                <audio controls>
                <source src="{{ $media->getUrl() }}" type="audio/mpeg" />
                    <a href="{{ $media->getUrl() }}"></a>
                    An html5-capable browser is required to play this
                audio.
                </audio>
                @endforeach

                @endif

                @if($lesson->getMedia('downloadable_files')->count())
                Downloadable Lesson:<br>
                @foreach($lesson->getMedia('downloadable_files') as $media)
                {{ $loop->iteration }}. <a href="{{ $media->getUrl() }}" target="_blank"><i class="mdi mdi-file"></i> &nbsp;{{ $media->name }} ({{ $media->size }} KB)</a><br>
                @endforeach
                @endif
                @if($lesson->subLessons->count())
                <ul class="list-group">
                    Sub-lesson:<br>
                    @foreach($lesson->subLessons as $subLesson)
                    <li class="list-group-item">
                        <a href="{{ route('lessons.show', [$subLesson->course_id, $subLesson->slug]) }}" target="popup" onclick="window.open('{{ route('lessons.show', [$subLesson->course_id, $subLesson->slug]) }}','name','width=100%')">{{ $subLesson->title }}</a>
                    </li>
                    @endforeach
                </ul>
                @endif
                @if ($test_exists)
                <hr />
                <h3>Test: {{ $lesson->test->title }}</h3>
                @if (!is_null($test_result))
                <div class="alert alert-info">Your test score: {{ $test_result->test_result }}</div>
                @else
                @include('tests.partials.select-dropdown')
                @endif
                <hr /> @endif
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