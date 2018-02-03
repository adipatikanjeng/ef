@extends('layouts.app')
@section('content') @if (!is_null($purchased_courses))
<div class="panel panel-info block4">
    <div class="panel-heading">
        My Course
        <div class="pull-right">
            <a href="#" data-perform="panel-collapse">
                <i class="ti-minus"></i>
            </a>
            <a href="#" data-perform="panel-dismiss"><i class="ti-close"></i>
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            @foreach($purchased_courses as $course)
            <div class="col-sm-3 col-lg-3 col-md-3">
                <div class="thumbnail">
                    <img src="http://placehold.it/320x150" alt="">
                    <div class="caption">
                        <h4><a href="{{ route('courses.show', [$course->slug]) }}">{{ $course->title }}</a>
                        </h4>
                        <p>{{ $course->description }}</p>
                    </div>
                    <div class="ratings">
                        <p>Progress: {{ Auth::user()->lessons()->where('course_id', $course->id)->count() }} of {{ $course->lessons->count()
                            }} lessons</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="panel panel-info block4">
    <div class="panel-heading">
        All Courses
        <div class="pull-right">
            <a href="#" data-perform="panel-collapse">
                <i class="ti-minus"></i>
            </a>
            <a href="#" data-perform="panel-dismiss"><i class="ti-close"></i>
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            @foreach($courses as $course)
            <div class="col-sm-3 col-lg-3 col-md-4">
                <div class="thumbnail">
                        @if(is_file(public_path('uploads/'.$course->course_image)))
                        <img src="/uploads/{{$course->course_image}}" alt="user-img" class="img-circle">
                        @endif
                    <div class="caption">
                        <h4 class="pull-right">${{ $course->price }}</h4>
                        <h4><a href="{{ route('courses.show', [$course->slug]) }}">{{ $course->title }}</a>
                        </h4>
                        <p>{{ $course->description }}</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">Students: {{ $course->students()->count() }}</p>
                        <p>
                            @for ($star = 1; $star
                            <=5 ; $star++) @if ($course->rating >= $star)
                                <span class="glyphicon glyphicon-star"></span> @else
                                <span class="glyphicon glyphicon-star-empty"></span> @endif @endfor
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection