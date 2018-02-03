@extends('layouts.app')
@section('content')
<div class="panel panel-info">
    <div class="panel-heading">
        {!! $post->title !!}
        <div class="panel-action">
            @if($post->user_id == auth()->user()->id)
            <a href="{{ route('posts.edit', [$post->id]) }}"><i class="mdi mdi-pencil-box mdi-24px"></i></a> @if(Auth::user()->id
            == $post->user_id) {!! Form::open(array( 'style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit'
            => "return confirm('".trans("global.app_are_you_sure")."');", 'route' => ['posts.delete', $post->id])) !!}
            <button class="" type="submit"><i class="mdi mdi-delete mdi-24px"></i></button> {!! Form::close() !!} @endif
            @endif
        </div>
    </div>
    <div class="panel-body">
        @if(is_file(public_path('uploads/'.$post->image)))
        <div class="col-md-3">
            <img style="width:100%" src="/uploads/{!! $post->image !!}">
        </div>
        @endif
        <div class="col">
            {!! $post->content !!}
        </div>
    </div>
    <div class="panel-footer">
        <div class="comment-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active">
                    <a href="#comments" role="tab" data-toggle="tab">
                        <h4 class="reviews text-capitalize">Comments</h4>
                    </a>
                </li>
                <li>
                    <a href="#add-comment" role="tab" data-toggle="tab">
                        <h4 class="reviews text-capitalize">Add comment</h4>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="comments">
                    <ul class="media-list">
                        @foreach ($post->comments()->orderBy('created_at', 'desc')->get() as $comment)
                        <li class="media">
                            <a class="pull-left" href="#">
                                @if(is_file(public_path('uploads/'.$comment->user->avatar)))
                                <img src="/uploads/{{$comment->user->avatar}}" alt="user-img" class="media-object img-circle" style="width:40px">
                                @else
                                <img src="/images/users/avatar-default.png" alt="user-img" class="media-object img-circle" style="width:40px">
                                @endif
                            </a>
                            <div class="media-body">
                                <div class="well well-lg">
                                    <h4 class="media-heading text-uppercase reviews">{{ $comment->user->nickname }} </h4>
                                    <p class="media-comment">
                                        {{$comment->comment}}
                                    </p>
                                    @if(Auth::user()->id == $comment->user_id) {!! Form::open(array( 'style' => 'display: inline-block;', 'method' => 'DELETE',
                                    'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');", 'route' => ['post-comments.delete',
                                    $comment->id])) !!} {!! Form::submit(trans('global.app_delete'), array('class' => 'btn
                                    btn-xs btn-danger')) !!} {!! Form::close() !!} @endif
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-pane" id="add-comment">
                    {!! Form::open(['method' => 'POST', 'route' => ['post-comments.store'], 'files' => true,]) !!}
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Comment</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="comment" rows="5">{!! old('comment')!!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button class="btn btn-success btn-circle text-uppercase" type="submit"><span class="glyphicon glyphicon-send"></span></button>
                        </div>
                    </div>
                    <input type="hidden" value="{{$post->id}}" name="post_id" /> {!! Form::close() !!}
                </div>
            </div>
        </div>
        <a href="/home" class="btn btn-default">@lang('global.posts.back')</a>
    </div>
</div>
@stop