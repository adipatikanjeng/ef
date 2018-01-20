@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
            <p>
                <ul class="list-inline">
                    <li>
                        <a href="{{ route('messages.create') }}" class="btn btn-success">@lang('global.app_create')</a>

                    </li>

                </ul>
            </p>

    </div>

    <div class="panel-body">
    @include('messenger.partials.flash')

    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
    </div>
@stop
