@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="panel-heading"><a class="btn btn-primary" href="{{ route('posts.create') }}">Create Post</a></div>
            <div class="steamline">
                @foreach($posts as $post)
                    <div class="sl-item">
                        <div class="sl-left"> <img src="/images/users/sonu.jpg" alt="user" class="img-circle"> </div>
                        <div class="sl-right">
                            <?php $created = \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at)); ?>
                            <div class="m-l-40"> <a href="#" class="text-info">{{$post->user->name}}</a> <span class="sl-date">{{ $created ->diffForHumans(\Carbon\Carbon::now()) }}</span>
                                <div class="m-t-20 row">
                                    @if(is_file(public_path('images/'.$post->image)))
                                        <div class="col-md-2 col-xs-12"><img src="/images/{{$post->image}}" alt="user" class="img-responsive"></div>
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
                {{--  <div class="sl-item">
                    <div class="sl-left"> <img src="/images/users/ritesh.jpg" alt="user" class="img-circle"> </div>
                    <div class="sl-right">
                        <div class="m-l-40"><a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                            <p class="m-t-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                        </div>
                    </div>
                </div>
                <div class="sl-item">
                    <div class="sl-left"> <img src="/images/users/govinda.jpg" alt="user" class="img-circle"> </div>
                    <div class="sl-right">
                        <div class="m-l-40"><a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                            <p>assign a new task <a href="#"> Design weblayout</a></p>
                        </div>
                    </div>
                </div>  --}}
            </div>
        </div>
    </div>
@endsection
