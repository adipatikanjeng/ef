@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
            <div class="panel-action">
            </div>
        </div>


        <div class="panel-body table-responsive">
            <table class="table table-hover manage-u-table">
                <thead>
                    <tr>

                        <th>@lang('global.tests.fields.course')</th>
                        <th>@lang('global.tests.fields.title')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @if (count($testHeaders) > 0)
                        @foreach ($testHeaders as $testHeader)
                            <tr data-entry-id="{{ $testHeader->id }}">
                                @can('test_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td>{{ $testHeader->course->title or '' }}</td>
                                <td>{{ Str::words($testHeader->title, '10', '...') }}</td>

                                <td>
                                    @can('test_view')
                                    <a href="{{ route('tests.show',[$testHeader->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                </td>

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
        @can('test_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.tests.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection