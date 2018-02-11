@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table ">
                        <tr>
                            <th>@lang('global.tests.fields.course')</th>
                            <td>{{ $test->course->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tests.fields.title')</th>
                            <td>{{ $test->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tests.fields.duration')</th>
                            <td>{!! $test->test_duration !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tests.fields.description')</th>
                            <td>{!! $test->description !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('tests.index') }}" class="btn btn-default">@lang('global.app_back')</a>
            {{-- @if(!$test->results()->where('user_id', auth::user()->id)->count()) --}}
                <a href="{{ url('tests/'.$test->course_id.'/null/lesson')}}" class="btn btn-success">Start Test</a>
            {{-- @endif --}}

        </div>
    </div>
@stop