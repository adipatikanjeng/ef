@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        @lang('global.app_list')
        <div class="panel-action">
            @can('course_create')
            <a href="{{ route('admin.courses.create') }}"><i class="mdi mdi-plus-box mdi-24px"></i></a> @endcan
            <a href="{{ route('admin.courses.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}"><i class="mdi mdi-format-list-bulleted mdi-24px"></i></a>
            <a href="{{ route('admin.courses.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}"><i class="mdi mdi-delete mdi-24px"></i></a>
        </div>
    </div>
    <div class="panel-body table-responsive">
        <table class="table  {{ count($courses) > 0 ? 'datatable' : '' }} @can('course_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
            <thead>
                <tr>
                    @can('course_delete') @if ( request('show_deleted') != 1 )
                    <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif @endcan @if (Auth::user()->isAdmin())
                    <th>@lang('global.courses.fields.teachers')</th>
                    @endif
                    <th>@lang('global.courses.fields.title')</th>
                    <th>@lang('global.courses.fields.description')</th>
                    <th>@lang('global.courses.fields.course-image')</th>
                    <th>@lang('global.courses.fields.published')</th>
                    @if( request('show_deleted') == 1 )
                    <th>&nbsp;</th>
                    @else
                    <th>&nbsp;</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @if (count($courses) > 0) @foreach ($courses as $course)
                <tr data-entry-id="{{ $course->id }}">
                    @can('course_delete') @if ( request('show_deleted') != 1 )
                    <td></td>@endif @endcan @if (Auth::user()->isAdmin())
                    <td>
                        @foreach ($course->teachers as $singleTeachers)
                        <span class="label label-info label-many">{{ $singleTeachers->name }}</span> @endforeach
                    </td>
                    @endif
                    <td>{{ $course->title }}</td>
                    <td>{!! $course->description !!}</td>
                    <td>@if($course->course_image)<a href="{{ asset('uploads/' . $course->course_image) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $course->course_image) }}"/></a>@endif</td>
                    <td>{{ Form::checkbox("published", 1, $course->published == 1 ? true : false, ["disabled"]) }}</td>
                    @if( request('show_deleted') == 1 )
                    <td>
                        {!! Form::open(array( 'style' => 'display: inline-block;', 'method' => 'POST', 'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                        'route' => ['admin.courses.restore', $course->id])) !!} {!! Form::submit(trans('global.app_restore'),
                        array('class' => 'btn btn-xs btn-success')) !!} {!! Form::close() !!} {!! Form::open(array( 'style'
                        => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                        'route' => ['admin.courses.perma_del', $course->id])) !!} {!! Form::submit(trans('global.app_permadel'),
                        array('class' => 'btn btn-xs btn-danger')) !!} {!! Form::close() !!}
                    </td>
                    @else
                    <td>
                        @can('course_view')
                        <a href="{{ route('admin.lessons.index',['course_id' => $course->id]) }}" class="btn btn-xs btn-primary">@lang('global.lessons.title')</a>                        @endcan @can('course_edit')
                        <a href="{{ route('admin.courses.edit',[$course->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>                        @endcan @can('course_delete') {!! Form::open(array( 'style' => 'display: inline-block;', 'method'
                        => 'DELETE', 'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');", 'route' =>
                        ['admin.courses.destroy', $course->id])) !!} {!! Form::submit(trans('global.app_delete'), array('class'
                        => 'btn btn-xs btn-danger')) !!} {!! Form::close() !!} @endcan
                    </td>
                    @endif
                </tr>
                @endforeach @else
                <tr>
                    <td colspan="12">@lang('global.app_no_entries_in_table')</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop
@section('javascript')
<script>
    @can('course_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.courses.mass_destroy') }}'; @endif
        @endcan
</script>
@endsection