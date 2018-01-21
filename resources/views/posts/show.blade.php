@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
                {!! $post->title !!}
        </div>

        <div class="panel-body">

            <div class="row">
                @if(is_file(public_path('images/'.$post->image)))
                <div class="col-md-3">
                    <img style="width:100%" src="/images/{!! $post->image !!}">
                </div>
                @endif
                <div class="col">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    <div class="panel-footer">
        <a href="/home" class="btn btn-default">@lang('global.posts.back')</a>
    </div>
    </div>
@stop