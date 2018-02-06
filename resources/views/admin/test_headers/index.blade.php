@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
            <div class="panel-action">
                @can('test_create')
                    <a href="{{ route('admin.test_headers.create') }}"><i class="mdi mdi-plus-box mdi-24px"></i></a>
                @endcan
                <a href="{{ route('admin.test_headers.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}"><i class="mdi mdi-format-list-bulleted mdi-24px"></i></a>
                <a href="{{ route('admin.test_headers.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}"><i class="mdi mdi-delete mdi-24px"></i></a>
            </div>
        </div>


        <div class="panel-body table-responsive">
            <table class="table  {{ count($testHeaders) > 0 ? 'datatable' : '' }} @can('test_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('test_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.test-headers.fields.course')</th>
                        <th>@lang('global.test-headers.fields.title')</th>
                        <th>@lang('global.test-headers.fields.start-publish-date')</th>
                        <th>@lang('global.test-headers.fields.end-publish-date')</th>
                        <th>@lang('global.test-headers.fields.time')</th>
                        <th>@lang('global.test-headers.fields.published')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @if (count($testHeaders) > 0)
                        @foreach ($testHeaders as $test)
                            <tr data-entry-id="{{ $test->id }}">
                                @can('test_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td>{{ $test->course->title or '' }}</td>
                                <td>{{ $test->title }}</td>
                                <td>{!! $test->start_publish_date !!}</td>
                                <td>{!! $test->end_publish_date !!}</td>
                                <td>{!! $test->time !!}</td>
                                <td>{{ Form::checkbox("published", 1, $test->published == 1 ? true : false, ["disabled"]) }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.test_headers.restore', $test->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.test_headers.perma_del', $test->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('test_header_view')
                                    <a href="{{ route('admin.test_headers.show',[$test->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('test_header_edit')
                                    <a href="{{ route('admin.test_headers.edit',[$test->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('test_header_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.test_headers.destroy', $test->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('test_header_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.test_headers.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection