@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="panel-heading"><a class="btn btn-primary" href="{{ route('posts.create') }}">Create Post</a></div>
        <div class="steamline">
            @foreach($posts as $post)
            <div class="sl-item">
                <div class="sl-left">
                    @if(is_file(public_path('uploads/'.$post->user->avatar)))
                    <img src="/uploads/{{$post->user->avatar}}" alt="user-img" class="img-circle"> @else
                    <img src="/images/users/avatar-default.png" alt="user-img" class="img-circle"> @endif
                </div>
                <div class="sl-right">
                    <?php $created = \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at)); ?>
                    <div class="m-l-40"> <a href="#" class="text-info">{{$post->user->name}}</a> <span class="sl-date">{{ $created ->diffForHumans(\Carbon\Carbon::now()) }}</span>
                        <div class="m-t-20 row">
                            @if(is_file(public_path('uploads/'.$post->image)))
                            <div class="col-md-2 col-xs-12"><img src="/uploads/{{$post->image}}" alt="user" class="img-responsive"></div>
                            @endif
                            <div class="col-md-9 col-xs-12">
                                <a href="#" class="text-info">{{$post->title}}</a>
                                <p> {!! Str::words($post->content, 50, ' ....')!!}</p>
                                <a href="/posts/{{$post->id}}/{{$post->slug}}"> Read more..</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection