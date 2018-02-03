<div class="media">
    <a class="pull-left" href="#">
        @if(is_file(public_path('uploads/'.$message->user->avatar)))
        <img src="/uploads/{{$message->user->avatar}}" alt="{{ $message->user->name }}" class="img-circle" style="width:50px"> @else
        <img src="/images/users/avatar-default.png" alt="{{ $message->user->name }}" class="img-circle" style="width:50px"> @endif
    </a>
    <div class="media-body">
        <h5 class="media-heading">{{ $message->user->name }}</h5>
        <p>{{ $message->body }}</p>
        <div class="text-muted">
            <small>Posted {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>