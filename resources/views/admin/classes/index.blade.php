@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
            <div class="panel-action">
                @can('class_create')
                    <a href="{{ route('admin.classes.create') }}"><i class="mdi mdi-plus-box mdi-24px"></i></a>
                @endcan
                <a href="{{ route('admin.classes.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}"><i class="mdi mdi-format-list-bulleted mdi-24px"></i></a>
                <a href="{{ route('admin.classes.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}"><i class="mdi mdi-delete mdi-24px"></i></a>
            </div>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($teachers) > 0 ? 'datatable' : '' }} @can('class_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('class_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.classes.fields.teacher')</th>
                        <th>@lang('global.classes.fields.students')</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>

                <tbody>
                    @if (count($teachers) > 0)
                        @foreach ($teachers as $teacher)
                            @if($teacher->students()->count())
                            <tr data-entry-id="{{ $teacher->id }}">
                                @can('class_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $teacher->name }}</td>
                                <td>
                                    @foreach ($teacher->students as $student)
                                        <span class="label label-info label-many">{{ $student->name }}</span>
                                    @endforeach
                                </td>
                                                                <td>
                                    @can('class_view')
                                    <a href="{{ route('admin.classes.show',[$teacher->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('class_edit')
                                    <a href="{{ route('admin.classes.edit',[$teacher->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('class_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.classes.destroy', $teacher->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                            </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('class_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.classes.mass_destroy') }}';
        @endcan

    </script>
@endsection