@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            {!! $post->title !!}
            <div class="panel-action">
                @if($post->user_id == auth()->user()->id)
                    <a href="{{ route('posts.edit', [$post->id]) }}"><i class="mdi mdi-pencil-box mdi-24px"></i></a>
                    <a href="{{ route('posts.delete', [$post->id]) }}"><i class="mdi mdi-delete mdi-24px"></i></a>
                @endif
            </div>
        </div>

        <div class="panel-body">

            <div class="row">
                @if(is_file(public_path('uploads/'.$post->image)))
                <div class="col-md-3">
                    <img style="width:100%" src="/uploads/{!! $post->image !!}">
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