@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
            <div class="panel-action">
                @can('permission_create')
                    <a href="{{ route('admin.permissions.create') }}"><i class="mdi mdi-plus-box mdi-24px"></i></a>
                @endcan
                <a href="{{ route('admin.permissions.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}"><i class="mdi mdi-format-list-bulleted mdi-24px"></i></a>
                <a href="{{ route('admin.permissions.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}"><i class="mdi mdi-delete mdi-24px"></i></a>
            </div>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($permissions) > 0 ? 'datatable' : '' }} @can('permission_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('permission_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.permissions.fields.title')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>

                <tbody>
                    @if (count($permissions) > 0)
                        @foreach ($permissions as $permission)
                            <tr data-entry-id="{{ $permission->id }}">
                                @can('permission_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $permission->title }}</td>
                                                                <td>
                                    @can('permission_view')
                                    <a href="{{ route('admin.permissions.show',[$permission->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('permission_edit')
                                    <a href="{{ route('admin.permissions.edit',[$permission->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('permission_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.permissions.destroy', $permission->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('permission_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.permissions.mass_destroy') }}';
        @endcan

    </script>
@endsection