@extends('layouts.app')
@section('content')
<h4>My Courses</h4>
<div class="row">
    @foreach($courses as $course)
    @if($course->students()->where('user_id', Auth::id())->count())
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">{{ $course->title }}
                <div class="panel-action"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a> <a href="#" data-perform="panel-dismiss"><i class="ti-close"></i></a></div>
            </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    @if(is_file(public_path('uploads/'.$course->course_image)))
                    <img src="/uploads/{{$course->course_image}}" class="img-responsive center-block">
                    <br> @endif
                    <p>{{ Str::words($course->description, 20, '....') }}</p> <a href="{{ route('courses.show', [$course->slug]) }}" class="btn btn-info m-t-10">Join</a>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
<h4>All Courses</h4>
<div class="row">
    @foreach($courses as $course)
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">{{ $course->title }}
                <div class="panel-action"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a> <a href="#" data-perform="panel-dismiss"><i class="ti-close"></i></a></div>
            </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    @if(is_file(public_path('uploads/'.$course->course_image)))
                    <img src="/uploads/{{$course->course_image}}" class="img-responsive center-block">
                    <br> @endif
                    <p>{{ Str::words($course->description, 20, '....') }}</p>
                    {{--  <a href="{{ route('courses.show', [$course->slug]) }}" class="btn btn-info m-t-10">Join</a>  --}}
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection