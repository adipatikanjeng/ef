@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="white-box">
                    <div class="user-bg">
                        <img width="100%" alt="user" src="/images/large/img1.jpg">
                        <div class="overlay-box">
                            <div class="user-content">
                                <a href="javascript:void(0)">
                                    @if(is_file(public_path('uploads/'.Auth::user()->avatar)))
                                    <img src="/uploads/{{Auth::user()->avatar}}" alt="user-img" class="thumb-lg img-circle"> @else
                                    <img src="/images/users/avatar-default.png" alt="user-img" class="thumb-lg img-circle"> @endif
                                </a>
                                <h4 class="text-white">{{ $profile->name }}</h4>
                                <h5 class="text-white">{{ $profile->email }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12">
                <div class="white-box">
                    <ul class="nav nav-tabs tabs customtab">
                        <li class="tab active">
                            <a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Activity</span> </a>
                        </li>
                        <li class="tab">
                            <a href="#messages" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Messages</span> </a>
                        </li>
                        <li class="tab">
                            <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
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
                        <div class="tab-pane" id="messages">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    @lang('global.app_list')
                                    <div class="panel-action">
                                        <a href="{{ route('messages.create') }}" alt="Create new"><i class="mdi mdi-message-plus mdi-24px"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="message-center">
                                        @foreach($threads as $thread)
                                        <?php $class = $thread->isUnread(Auth::id()) ? 'active' : ''; ?>
                                        <?php $created = \Carbon\Carbon::createFromTimeStamp(strtotime($thread->created_at)); ?>
                                        <a href="{{ route('messages.show', $thread->id)}}" class="{{$class}}">
                                            <div class="user-img">
                                                @if(is_file(public_path('uploads/'.$thread->creator()->avatar)))
                                                <img src="/uploads/{{$thread->creator()->avatar}}" alt="user-img" class="img-circle">
                                                @else
                                                <img src="/images/users/avatar-default.png" alt="user-img" class="img-circle">
                                                @endif
                                            </div>
                                            <div class="mail-contnet">
                                                <h5>{{$thread->creator()->name}}</h5>
                                                <span class="mail-desc">{{$thread->subject}}</span>
                                                <span class="time">{{ $created }}</span>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings">
                            {!! Form::model($profile, ['method' => 'PUT', 'route' => ['profile.update', $profile->id], 'files' => true,'class' => 'form-horizontal
                            form-material']) !!}
                            <div class="form-group">
                                <label class="col-md-12">Name</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $profile->name }}" name="name" placeholder="Name" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" value="{{ $profile->email }}" disabled placeholder="Nickname" class="form-control form-control-line"
                                        name="example-email" id="example-email"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Surname</label>
                                <div class="col-md-12">
                                    <input type="text" name="surname" value="{{ $profile->surname }}" placeholder="Surname" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Nickname</label>
                                <div class="col-md-12">
                                    <input type="text" name="nickname" value="{{ $profile->nickname }}" placeholder="Nickname" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Phone Number</label>
                                <div class="col-md-12">
                                    <input type="text" name="phone_number" value="{{ $profile->phone_number }}" placeholder="Phone Number" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Address</label>
                                <div class="col-md-12">
                                    <input type="text" name="address" value="{{ $profile->address }}" placeholder="Address" class="form-control form-control-line">
                                </div>
                            </div>
                            @if(auth()->user()->isStudent())
                            <div class="form-group">
                                <label class="col-md-12">Grade</label>
                                <div class="col-md-12">
                                    <input type="text" name="grade" value="{{ $profile->grade }}" placeholder="Grade" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">School</label>
                                <div class="col-md-12">
                                    <input type="text" name="school" value="{{ $profile->school }}" placeholder="School" class="form-control form-control-line">
                                </div>
                            </div>
                            @endif
                            <div class="form-group">
                                <label class="col-md-12">Avatar</label>
                                <div class="col-md-12">
                                    <input type="file" name="avatar" value="{{ $profile->avatar }}" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" type="submit">Update Profile</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <a href="/change_password" class="btn btn-primary">Change Password</a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('javascript')
@endsection