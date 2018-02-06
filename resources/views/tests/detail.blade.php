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
                            <td>{{ $testHeaders->course->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.test-headers.fields.title')</th>
                            <td>{{ $testHeaders->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.test-headers.fields.start-publish-date')</th>
                            <td>{{ $testHeaders->start_publish_date or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.test-headers.fields.end-publish-date')</th>
                            <td>{{ $testHeaders->end_publish_date or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.test-headers.fields.time')</th>
                            <td>{!! $testHeaders->time !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.test-headers.fields.description')</th>
                            <td>{!! $testHeaders->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.test-headers.fields.published')</th>
                            <td>{{ Form::checkbox("published", 1, $testHeaders->published == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('tests.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop