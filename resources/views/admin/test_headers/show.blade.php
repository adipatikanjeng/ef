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
                            <th>@lang('global.test-headers.fields.course')</th>
                            <td>{{ $test->course->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.test-headers.fields.title')</th>
                            <td>{{ $test->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.test-headers.fields.start-publish-date')</th>
                            <td>{{ $test->start_publish_date or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.test-headers.fields.end-publish-date')</th>
                            <td>{{ $test->end_publish_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.test-headers.fields.description')</th>
                            <td>{!! $test->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.test-headers.fields.time')</th>
                            <td>{!! $test->time !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tests.fields.published')</th>
                            <td>{{ Form::checkbox("published", 1, $test->published == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.test_headers.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop